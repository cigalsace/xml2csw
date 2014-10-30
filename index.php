
<?php

include_once('helper.php');

// $_GET['xml_dir']
$dir = get('xml_dir');

// $_GET['request']
$request = get('request');

if ($request and $request == 'GetRecords') {

	// Get files
	$files = array_diff(scandir($dir), array('..', '.'));

	// Get only xml files
	$xml_files = array();
	foreach ($files as $file) {
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if (strtolower($ext) == 'xml') {
			$xml_files[] = $file;
		}
	}
	$nb_xml_files = count($xml_files);

	// $_GET['constraint']
	//constraint=anyText+LIKE+'*ortho*'&"
	$search = '';
	$constraint = get('constraint');
	if ($constraint) {
		preg_match("#\*(.*?)\*#i", $constraint, $matches);
		$search = $matches[1];
	}

	$matched_files = array();
	foreach ($xml_files as $file) {
		$xml_file = strip_tags(file_get_contents($dir.'/'.$file));
		if ($constraint) {
			if (strpos($xml_file, $search)) {
				$matched_files[] = $file;
			}
		} else {
			$matched_files[] = $file;
		}
	}
	$numberOfRecordsMatched = count($matched_files);

	// $_GET['maxrecords']
	$maxrecords = $numberOfRecordsMatched;
	$maxrecords = get('maxrecords');

	// $_GET['startposition']
	$startposition = 0;
	$startposition = get('startposition') - 1;
	$nextRecord = $startposition+$maxrecords+1;

	// Nb results
	$nb_results = count($matched_files) - $startposition;
	if ($nb_results > $maxrecords) {
		$nb_results = $maxrecords;
	}

	// Get xml files
	$xml_content = '';
	for ($i = $startposition; $i < $startposition+$maxrecords; $i++) {
		$xml_file = file($dir.'/'.$matched_files[$i]);
		unset($xml_file[0]);
		$xml = implode('', $xml_file);
		$xml_content .= $xml;
	}

	// timestamp
	$timestamp = date(DATE_ISO8601);

	$xml = '';
	$xml .= '<csw:GetRecordsResponse xmlns:csw="http://www.opengis.net/cat/csw/2.0.2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.opengis.net/cat/csw/2.0.2 http://schemas.opengis.net/csw/2.0.2/CSW-discovery.xsd">';
	$xml .= '<csw:SearchStatus timestamp="'.$timestamp.'"/>';
	$xml .= '<csw:SearchResults numberOfRecordsMatched="'.$numberOfRecordsMatched.'" numberOfRecordsReturned="'.$nb_results.'" elementSet="full" nextRecord="'.$nextRecord.'">';
	$xml .= $xml_content;
	$xml .= '</csw:SearchResults>';
	$xml .= '</csw:GetRecordsResponse>';

	header('Content-Type: application/xml; charset=utf-8');
	echo $xml;

} elseif ($request and $request == 'GetRecordById') {

	//echo "GetRecordById";
	// $_GET['id']
	$id = get('id');
    
	if ($id and file_exists($dir.'/'.$id.'.xml')) {

		$xml_file = file($dir.'/'.$id.'.xml');
		unset($xml_file[0]);
		$xml_content = implode('', $xml_file);

		$xml = '';
		$xml .= '<csw:GetRecordByIdResponse xmlns:csw="http://www.opengis.net/cat/csw/2.0.2">';
		$xml .= $xml_content;
		$xml .= '</csw:GetRecordByIdResponse>';

		header('Content-Type: application/xml; charset=utf-8');
		echo $xml;

	} else {
		echo $dir.'/'.$id.'.xml';
	}

} elseif ($request and $request == 'GetCapabilities') {

    include_once('config.php');

    header('Content-Type: application/xml; charset=utf-8');
    // echo "<pre>";
    echo $capabilities_xml;
    // echo "</pre>";


} else {

	echo '"Request" parameter missing.';

}

//echo 1;

?>



