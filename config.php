<?php
// Configuration GetCapabilities
$ows_Title = 'Catalogue CIGAL';
$ows_Abstract = 'La plate forme CIGAL réalise un recensement des données mutualisées en Alsace.';
$ows_Keywords[] = 'Géoportail';
$ows_Keywords[] = 'Données ouvertes';
$ows_Keywords[] = 'Département du Bas-Rhin (67)';
$ows_Keywords[] = 'Environnement';
$ows_Keywords[] = 'Alsace';
$ows_Type = 'theme';

$ows_ServiceType = 'CSW';
$ows_ServiceTypeVersion = '2.0.2';
$ows_Fees = 'None';
$ows_AccessConstraints = 'None';

$ows_ProviderName = 'Coopération pour l\'information géographique en Alsace';
$ows_ProviderSite ='http://www.cigalsace.net/xml2csw/index.php';
$ows_IndividualName = 'RYCKELYNCK Guillaume';
$ows_PositionName = 'Administrator';
$ows_Voice = '03 88 15 65 48';
$ows_Facsimile = '--';
$ows_DeliveryPoint = '1, place du Wacken';
$ows_City = 'Strasbourg';
$ows_AdministrativeArea = 'Alsace';
$ows_PostalCode = '67000';
$ows_Country = 'France';
$ows_ElectronicMailAddress = 'guillaume.ryckelynck@region-alsace.eu';
$ows_HoursOfService = '--';
$ows_ContactInstructions = '--';
$ows_Role = 'pointOfContact';

$ows_Get = 'http://www.cigalsace.net/xml2csw/?xml_dir=xml';

$capabilities_xml = '
    <csw:Capabilities xmlns:csw="http://www.opengis.net/cat/csw/2.0.2" xmlns:gml="http://www.opengis.net/gml" xmlns:gmd="http://www.isotc211.org/2005/gmd" xmlns:ows="http://www.opengis.net/ows" xmlns:ogc="http://www.opengis.net/ogc" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:inspire_ds="http://inspire.ec.europa.eu/schemas/inspire_ds/1.0" xmlns:inspire_com="http://inspire.ec.europa.eu/schemas/common/1.0" version="2.0.2" xsi:schemaLocation="http://www.opengis.net/cat/csw/2.0.2 http://schemas.opengis.net/csw/2.0.2/CSW-discovery.xsd http://inspire.ec.europa.eu/schemas/inspire_ds/1.0 http://inspire.ec.europa.eu/schemas/inspire_ds/1.0/inspire_ds.xsd">
      <ows:ServiceIdentification>
        <ows:Title>'.$ows_Title.'</ows:Title>
        <ows:Abstract>'.$ows_Abstract.'</ows:Abstract>
        <ows:Keywords>';
        foreach ($ows_Keywords as $k):
            $capabilities_xml .= '<ows:Keyword>'.$k.'</ows:Keyword>';
        endforeach;
        $capabilities_xml .= '  
          <ows:Type>'.$ows_Type.'</ows:Type>
        </ows:Keywords>
        <ows:ServiceType>'.$ows_ServiceType.'</ows:ServiceType>
        <ows:ServiceTypeVersion>'.$ows_ServiceTypeVersion.'</ows:ServiceTypeVersion>
        <ows:Fees>'.$ows_Fees.'</ows:Fees>
        <ows:AccessConstraints>'.$ows_AccessConstraints.'</ows:AccessConstraints>
      </ows:ServiceIdentification>
      <ows:ServiceProvider>
        <ows:ProviderName>'.$ows_ProviderName.'</ows:ProviderName>
        <ows:ProviderSite xlink:href="'.$ows_ProviderSite.'" />
        <ows:ServiceContact>
          <ows:IndividualName>'.$ows_IndividualName.'</ows:IndividualName>
          <ows:PositionName>'.$ows_PositionName.'</ows:PositionName>
          <ows:ContactInfo>
            <ows:Phone>
              <ows:Voice>'.$ows_Voice.'</ows:Voice>
              <ows:Facsimile>'.$ows_Facsimile.'</ows:Facsimile>
            </ows:Phone>
            <ows:Address>
              <ows:DeliveryPoint>'.$ows_DeliveryPoint.'</ows:DeliveryPoint>
              <ows:City>'.$ows_City.'</ows:City>
              <ows:AdministrativeArea>'.$ows_AdministrativeArea.'</ows:AdministrativeArea>
              <ows:PostalCode>'.$ows_PostalCode.'</ows:PostalCode>
              <ows:Country>'.$ows_Country.'</ows:Country>
              <ows:ElectronicMailAddress>'.$ows_ElectronicMailAddress.'</ows:ElectronicMailAddress>
            </ows:Address>
            <ows:HoursOfService>'.$ows_HoursOfService.'</ows:HoursOfService>
            <ows:ContactInstructions>'.$ows_ContactInstructions.'</ows:ContactInstructions>
          </ows:ContactInfo>
          <ows:Role>'.$ows_Role.'</ows:Role>
        </ows:ServiceContact>
      </ows:ServiceProvider>
      
      <ows:OperationsMetadata>
        <ows:Operation name="GetCapabilities">
          <ows:DCP>
            <ows:HTTP>
              <ows:Get xlink:href="'.$ows_Get.'" />
              <!--<ows:Post xlink:href="http://www.cigalsace.net/xml2csw/?xml_dir=xml" />-->
            </ows:HTTP>
          </ows:DCP>
          <!--
          <ows:Parameter name="sections">
            <ows:Value>ServiceIdentification</ows:Value>
            <ows:Value>ServiceProvider</ows:Value>
            <ows:Value>OperationsMetadata</ows:Value>
            <ows:Value>Filter_Capabilities</ows:Value>
          </ows:Parameter>
          -->
          <ows:Constraint name="PostEncoding">
            <ows:Value>XML</ows:Value>
            <!--<ows:Value>SOAP</ows:Value>-->
          </ows:Constraint>
        </ows:Operation>
        <!--
        <ows:Operation name="DescribeRecord">
          <ows:DCP>
            <ows:HTTP>
              <ows:Get xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue" />
              <ows:Post xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue" />
            </ows:HTTP>
          </ows:DCP>
          <ows:Parameter name="typeName">
            <ows:Value>csw:Record</ows:Value>
            <ows:Value>gmd:MD_Metadata</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="outputFormat">
            <ows:Value>application/xml</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="schemaLanguage">
            <ows:Value>http://www.w3.org/TR/xmlschema-1/</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="typeName">
            <ows:Value>csw:Record</ows:Value>
            <ows:Value>gmd:MD_Metadata</ows:Value>
          </ows:Parameter>
          <ows:Constraint name="PostEncoding">
            <ows:Value>XML</ows:Value>
            <ows:Value>SOAP</ows:Value>
          </ows:Constraint>
        </ows:Operation>
        <ows:Operation name="GetDomain">
          <ows:DCP>
            <ows:HTTP>
              <ows:Get xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue" />
              <ows:Post xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue" />
            </ows:HTTP>
          </ows:DCP>
        </ows:Operation>
        -->
        <ows:Operation name="GetRecords">
          <ows:DCP>
            <ows:HTTP>
              <ows:Get xlink:href="'.$ows_Get.'" />
              <!--<ows:Post xlink:href="http://www.cigalsace.net/xml2csw/?xml_dir=xml" />-->
            </ows:HTTP>
          </ows:DCP>
          <ows:Parameter name="resultType">
            <ows:Value>hits</ows:Value>
            <ows:Value>results</ows:Value>
            <ows:Value>validate</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="outputFormat">
            <ows:Value>application/xml</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="outputSchema">
            <ows:Value>http://www.opengis.net/cat/csw/2.0.2</ows:Value>
            <ows:Value>http://www.isotc211.org/2005/gmd</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="typeNames">
            <ows:Value>csw:Record</ows:Value>
            <ows:Value>gmd:MD_Metadata</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="CONSTRAINTLANGUAGE">
            <ows:Value>FILTER</ows:Value>
            <ows:Value>CQL_TEXT</ows:Value>
          </ows:Parameter>
          <ows:Constraint name="PostEncoding">
            <ows:Value>XML</ows:Value>
            <ows:Value>SOAP</ows:Value>
          </ows:Constraint>
          <ows:Constraint name="SupportedISOQueryables">
            <ows:Value>Operation</ows:Value>
            <ows:Value>Format</ows:Value>
            <ows:Value>OrganisationName</ows:Value>
            <ows:Value>Type</ows:Value>
            <ows:Value>ServiceType</ows:Value>
            <ows:Value>DistanceValue</ows:Value>
            <ows:Value>ResourceLanguage</ows:Value>
            <ows:Value>RevisionDate</ows:Value>
            <ows:Value>OperatesOn</ows:Value>
            <ows:Value>GeographicDescriptionCode</ows:Value>
            <ows:Value>AnyText</ows:Value>
            <ows:Value>Modified</ows:Value>
            <ows:Value>PublicationDate</ows:Value>
            <ows:Value>ResourceIdentifier</ows:Value>
            <ows:Value>ParentIdentifier</ows:Value>
            <ows:Value>Identifier</ows:Value>
            <ows:Value>CouplingType</ows:Value>
            <ows:Value>TopicCategory</ows:Value>
            <ows:Value>OperatesOnIdentifier</ows:Value>
            <ows:Value>ServiceTypeVersion</ows:Value>
            <ows:Value>TempExtent_end</ows:Value>
            <ows:Value>Subject</ows:Value>
            <ows:Value>CreationDate</ows:Value>
            <ows:Value>OperatesOnName</ows:Value>
            <ows:Value>Title</ows:Value>
            <ows:Value>DistanceUOM</ows:Value>
            <ows:Value>Denominator</ows:Value>
            <ows:Value>AlternateTitle</ows:Value>
            <ows:Value>Language</ows:Value>
            <ows:Value>TempExtent_begin</ows:Value>
            <ows:Value>HasSecurityConstraints</ows:Value>
            <ows:Value>KeywordType</ows:Value>
            <ows:Value>Abstract</ows:Value>
          </ows:Constraint>
          <ows:Constraint name="AdditionalQueryables">
            <ows:Value>Relation</ows:Value>
            <ows:Value>AccessConstraints</ows:Value>
            <ows:Value>ResponsiblePartyRole</ows:Value>
            <ows:Value>OnlineResourceMimeType</ows:Value>
            <ows:Value>OnlineResourceType</ows:Value>
            <ows:Value>Lineage</ows:Value>
            <ows:Value>SpecificationDate</ows:Value>
            <ows:Value>ConditionApplyingToAccessAndUse</ows:Value>
            <ows:Value>SpecificationDateType</ows:Value>
            <ows:Value>MetadataPointOfContact</ows:Value>
            <ows:Value>Classification</ows:Value>
            <ows:Value>Date</ows:Value>
            <ows:Value>OtherConstraints</ows:Value>
            <ows:Value>Degree</ows:Value>
            <ows:Value>SpecificationTitle</ows:Value>
          </ows:Constraint>
        </ows:Operation>
        <ows:Operation name="GetRecordById">
          <ows:DCP>
            <ows:HTTP>
              <ows:Get xlink:href="'.$ows_Get.'" />
              <!-- <ows:Post xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue" /> -->
            </ows:HTTP>
          </ows:DCP>
          <ows:Parameter name="outputSchema">
            <!--<ows:Value>http://www.opengis.net/cat/csw/2.0.2</ows:Value>-->
            <ows:Value>http://www.isotc211.org/2005/gmd</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="outputFormat">
            <ows:Value>application/xml</ows:Value>
          </ows:Parameter>
          <ows:Parameter name="resultType">
            <!--<ows:Value>hits</ows:Value>-->
            <ows:Value>results</ows:Value>
            <!--<ows:Value>validate</ows:Value>-->
          </ows:Parameter>
          <ows:Parameter name="ElementSetName">
            <!--<ows:Value>brief</ows:Value>
            <ows:Value>summary</ows:Value>-->
            <ows:Value>full</ows:Value>
          </ows:Parameter>
          <ows:Constraint name="PostEncoding">
            <ows:Value>XML</ows:Value>
            <!--<ows:Value>SOAP</ows:Value>-->
          </ows:Constraint>
        </ows:Operation>
        <!--
        <ows:Operation name="Transaction">
          <ows:DCP>
            <ows:HTTP>
              <ows:Get xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue-publication" />
              <ows:Post xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue-publication" />
            </ows:HTTP>
          </ows:DCP>
        </ows:Operation>
        <ows:Operation name="Harvest">
          <ows:DCP>
            <ows:HTTP>
              <ows:Get xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue-publication" />
              <ows:Post xlink:href="http://www.cigalsace.org/geonetwork-private/srv/eng/csw-geocatalogue-publication" />
            </ows:HTTP>
          </ows:DCP>
          <ows:Parameter name="ResourceType">
            <ows:Value>http://www.isotc211.org/schemas/2005/gmd/</ows:Value>
          </ows:Parameter>
        </ows:Operation>
        <ows:Parameter name="service">
          <ows:Value>http://www.opengis.net/cat/csw/2.0.2</ows:Value>
        </ows:Parameter>
        <ows:Parameter name="version">
          <ows:Value>2.0.2</ows:Value>
        </ows:Parameter>
        <ows:Constraint name="IsoProfiles">
          <ows:Value>http://www.isotc211.org/2005/gmd</ows:Value>
        </ows:Constraint>
        <ows:Constraint name="PostEncoding">
          <ows:Value>SOAP</ows:Value>
        </ows:Constraint>
        <inspire_ds:ExtendedCapabilities>
          <inspire_common:ResourceLocator xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">
            <inspire_common:URL>http://www.cigalsace.org:/geonetwork-private/srv/eng/csw-geocatalogue?SERVICE=CSW&amp;VERSION=2.0.2&amp;REQUEST=GetCapabilities</inspire_common:URL>
            <inspire_common:MediaType>application/xml</inspire_common:MediaType>
          </inspire_common:ResourceLocator>
          <inspire_common:ResourceLocator xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">
            <inspire_common:URL>http://www.cigalsace.org:/geonetwork-private</inspire_common:URL>
            <inspire_common:MediaType>text/html</inspire_common:MediaType>
          </inspire_common:ResourceLocator>
          <inspire_common:ResourceType xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">service</inspire_common:ResourceType>
          <inspire_common:TemporalReference xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">
            <inspire_common:DateOfPublication>2011-12-01T00:00:00</inspire_common:DateOfPublication>
          </inspire_common:TemporalReference>
          <inspire_common:Conformity xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">
            <inspire_common:Specification xsi:type="inspire_common:citationInspireInteroperabilityRegulation_eng">
              <inspire_common:Title>COMMISSION REGULATION (EU) No 1089/2010 of 23 November 2010
                implementing Directive 2007/2/EC of the European Parliament and of the Council as
                regards interoperability of spatial data sets and services</inspire_common:Title>
              <inspire_common:DateOfPublication>2010-12-08</inspire_common:DateOfPublication>
              <inspire_common:URI>OJ:L:2010:323:0011:0102:EN:PDF</inspire_common:URI>
              <inspire_common:ResourceLocator>
                <inspire_common:URL>http://eur-lex.europa.eu/LexUriServ/LexUriServ.do?uri=OJ:L:2010:323:0011:0102:EN:PDF</inspire_common:URL>
                <inspire_common:MediaType>application/pdf</inspire_common:MediaType>
              </inspire_common:ResourceLocator>
            </inspire_common:Specification>
            <inspire_common:Degree>notEvaluated</inspire_common:Degree>
          </inspire_common:Conformity>
          <inspire_common:MetadataPointOfContact xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">
            <inspire_common:OrganisationName>Région Alsace</inspire_common:OrganisationName>
            <inspire_common:EmailAddress>guillaume.ryckelynck@region-alsace.eu</inspire_common:EmailAddress>
          </inspire_common:MetadataPointOfContact>
          <inspire_common:MetadataDate xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">2011-11-23</inspire_common:MetadataDate>
          <inspire_common:SpatialDataServiceType xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">discovery</inspire_common:SpatialDataServiceType>
          <inspire_common:MandatoryKeyword xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0" xsi:type="inspire_common:classificationOfSpatialDataService">
            <inspire_common:KeywordValue>humanCatalogueViewer</inspire_common:KeywordValue>
          </inspire_common:MandatoryKeyword>
          <inspire_common:Keyword xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0" xsi:type="inspire_common:inspireTheme_eng">
            <inspire_common:OriginatingControlledVocabulary>
              <inspire_common:Title>GEMET - INSPIRE themes</inspire_common:Title>
              <inspire_common:DateOfPublication>2008-06-01</inspire_common:DateOfPublication>
            </inspire_common:OriginatingControlledVocabulary>
            <inspire_common:KeywordValue>Area management/restriction/regulation zones and reporting
              units</inspire_common:KeywordValue>
          </inspire_common:Keyword>
          <inspire_common:Keyword xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0" xsi:type="inspire_common:inspireTheme_eng">
            <inspire_common:OriginatingControlledVocabulary>
              <inspire_common:Title>GEMET - INSPIRE themes</inspire_common:Title>
              <inspire_common:DateOfPublication>2008-06-01</inspire_common:DateOfPublication>
            </inspire_common:OriginatingControlledVocabulary>
            <inspire_common:KeywordValue>Oceanographic geographical
              features</inspire_common:KeywordValue>
          </inspire_common:Keyword>
          <inspire_common:Keyword xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0" xsi:type="inspire_common:inspireTheme_eng">
            <inspire_common:OriginatingControlledVocabulary>
              <inspire_common:Title>GEMET - INSPIRE themes</inspire_common:Title>
              <inspire_common:DateOfPublication>2008-06-01</inspire_common:DateOfPublication>
            </inspire_common:OriginatingControlledVocabulary>
            <inspire_common:KeywordValue>Bio-geographical regions</inspire_common:KeywordValue>
          </inspire_common:Keyword>
          <inspire_common:Keyword xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0" xsi:type="inspire_common:inspireTheme_eng">
            <inspire_common:OriginatingControlledVocabulary>
              <inspire_common:Title>GEMET - INSPIRE themes</inspire_common:Title>
              <inspire_common:DateOfPublication>2008-06-01</inspire_common:DateOfPublication>
            </inspire_common:OriginatingControlledVocabulary>
            <inspire_common:KeywordValue>Elevation</inspire_common:KeywordValue>
          </inspire_common:Keyword>
          <inspire_common:Keyword xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0" xsi:type="inspire_common:inspireTheme_eng">
            <inspire_common:OriginatingControlledVocabulary>
              <inspire_common:Title>GEMET - INSPIRE themes</inspire_common:Title>
              <inspire_common:DateOfPublication>2008-06-01</inspire_common:DateOfPublication>
            </inspire_common:OriginatingControlledVocabulary>
            <inspire_common:KeywordValue>Environmental monitoring
              facilities</inspire_common:KeywordValue>
          </inspire_common:Keyword>
          <inspire_common:Keyword xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0" xsi:type="inspire_common:inspireTheme_eng">
            <inspire_common:OriginatingControlledVocabulary>
              <inspire_common:Title>GEMET - INSPIRE themes</inspire_common:Title>
              <inspire_common:DateOfPublication>2008-06-01</inspire_common:DateOfPublication>
            </inspire_common:OriginatingControlledVocabulary>
            <inspire_common:KeywordValue>Habitats and biotopes</inspire_common:KeywordValue>
          </inspire_common:Keyword>
          <inspire_common:SupportedLanguages xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">
            <inspire_common:DefaultLanguage>
              <inspire_common:Language>eng</inspire_common:Language>
            </inspire_common:DefaultLanguage>
            <inspire_common:SupportedLanguage>
              <inspire_common:Language>fre</inspire_common:Language>
            </inspire_common:SupportedLanguage>
            <inspire_common:SupportedLanguage>
              <inspire_common:Language>ger</inspire_common:Language>
            </inspire_common:SupportedLanguage>
            <inspire_common:SupportedLanguage>
              <inspire_common:Language>spa</inspire_common:Language>
            </inspire_common:SupportedLanguage>
            <inspire_common:SupportedLanguage>
              <inspire_common:Language>por</inspire_common:Language>
            </inspire_common:SupportedLanguage>
            <inspire_common:SupportedLanguage>
              <inspire_common:Language>dut</inspire_common:Language>
            </inspire_common:SupportedLanguage>
            <inspire_common:SupportedLanguage>
              <inspire_common:Language>fin</inspire_common:Language>
            </inspire_common:SupportedLanguage>
            <inspire_common:SupportedLanguage>
              <inspire_common:Language>ita</inspire_common:Language>
            </inspire_common:SupportedLanguage>
          </inspire_common:SupportedLanguages>
          <inspire_common:ResponseLanguage xmlns:inspire_common="http://inspire.ec.europa.eu/schemas/common/1.0">
            <inspire_common:Language>eng</inspire_common:Language>
          </inspire_common:ResponseLanguage>
        </inspire_ds:ExtendedCapabilities>
        -->
      </ows:OperationsMetadata>
      <!--
      <ogc:Filter_Capabilities>
        <ogc:Spatial_Capabilities>
          <ogc:GeometryOperands>
            <ogc:GeometryOperand>gml:Envelope</ogc:GeometryOperand>
            <ogc:GeometryOperand>gml:Point</ogc:GeometryOperand>
            <ogc:GeometryOperand>gml:LineString</ogc:GeometryOperand>
            <ogc:GeometryOperand>gml:Polygon</ogc:GeometryOperand>
          </ogc:GeometryOperands>
          <ogc:SpatialOperators>
            <ogc:SpatialOperator name="BBOX" />
            <ogc:SpatialOperator name="Equals" />
            <ogc:SpatialOperator name="Overlaps" />
            <ogc:SpatialOperator name="Disjoint" />
            <ogc:SpatialOperator name="Intersects" />
            <ogc:SpatialOperator name="Touches" />
            <ogc:SpatialOperator name="Crosses" />
            <ogc:SpatialOperator name="Within" />
            <ogc:SpatialOperator name="Contains" />
          </ogc:SpatialOperators>
        </ogc:Spatial_Capabilities>
        <ogc:Scalar_Capabilities>
          <ogc:LogicalOperators />
          <ogc:ComparisonOperators>
            <ogc:ComparisonOperator>EqualTo</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>Like</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>LessThan</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>GreaterThan</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>LessThanEqualTo</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>GreaterThanEqualTo</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>NotEqualTo</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>Between</ogc:ComparisonOperator>
            <ogc:ComparisonOperator>NullCheck</ogc:ComparisonOperator>
          </ogc:ComparisonOperators>
        </ogc:Scalar_Capabilities>
        <ogc:Id_Capabilities>
          <ogc:EID />
          <ogc:FID />
        </ogc:Id_Capabilities>
      </ogc:Filter_Capabilities>
      -->
    </csw:Capabilities>';
?>
