# xml2csw

Application javascript de lecture d'une fiche de métadonnées conforme ISO-19139/INSPIRE.
Cette application constitue l'un des modules du projet mdViewer

*La branche "master" est la branche de développement.*

## Projet mdViewer

Le projet "mdViewer" vise à proposer une solution simple de consultation de fiches de métadonnées issues de services web (CSW) ou de fichiers XML stockés en ligne (Iso 19139) en utilisant une logique client/serveur.
Il n'a pas pour objectif de remplacer des solutions complètes tel que [GéoSources][1] ou [GéoNetwork][2].

L'application se compose de 3 modules indépendants:

* [cswReaderJS][3] : permet de lire un flux afficher la liste des fiches de métadonnées de façon synthétique.
* [mdReaderJS][4] : permet de lire une fiche de métadonnées et l'afficher de façon complète selon le profil CIGAL.
* [xml2csw][5] : permet de simuler un serveur csw minimaliste à partir d'une liste de fichiers XML pour pouvoir les consulter via cswReaderJS et mdReaderJS.

Cette application s'inspire des travaux réalisé pour le sviewer développé par [Géobretagne][6].

## Technologie:

Le module cswReaderJS est développé en PHP.

## Principes:

xml2csw simule les requêtes de base "GetRecords" et "GetRecordById" à partir de fichiers XML stockés dans un répertoire sur le serveur.

## Limites:

* xml2csw ne remplace pas un vrai serveur CSW et ne permet pas le moissonnage des fiches par un serveur distant comme le Géocatalogue national.
* xml2csw fonctionne avec cswReader et mdReader uniquement si le nom du fichier XML correspond à l'identifiant de la fiche de métadonnées.
* xml2csw ne récupère que les fichiers XML directement à la racine du répertoire transmis en paramètre.

## Installation:

* Télécharger le fichier zip contenant les sources.
* Dézipper le fichier téléchargé sur le serveur.
* L'application est fonctionnelle.

## Paramétrage:

La configuration de la réponse au GetCapabilities (contact, nom du server, etc.) se fait dans le fichier config.php.

Les paramétrages des appels à l'application s'affectuent via l'URL.

Pour simuler un requête "GetRecords" : http://domaine.dom/xml2csw.php?xml_dir=xml&maxrecords=10&startposition=1&request=GetRecord...'*ortho*'

Où:
* "xml_dir" est le chemin relatif vers le dossier contenant les fichiers XML
* "request" est le type de requête (GetRecords, GetRecordById ou GetCapabilities) - "GetRecords" ici.
* "maxrecords" est le nombre de fiches attendues en retour
* "startposition" est le numéro de la première fiche attendue
* "constraint" est une requête CQL permettant de filtrer les résultats (seule la requête de type "anyText+LIKE+'*word*'" est fonctionnelle pour le moment)

Les autres paramètres sont ignorés.

Pour simuler un requête "GetRecordById" : http://domaine.dom/xml2csw.php?request=GetRecordById&id=FR-236700019-ORTHO-RVB-20112012-CI...

Où:
* "xml_dir" est le chemin relatif vers le dossier contenant les fichiers XML
* "request" est le type de requête (GetRecords, GetRecordById ou GetCapabilities) - "GetRecordById " ici.
* "id" est l'identifiant de la fiche de métadonnées qui doit correspondre au nom du fichier XML attendue

Les autres paramètres sont ignorés.

Pour simuler une requête "GetCapabilities": http://domaine.dom/xml2csw.php?request=GetCapabilities

Où:
* "request" est le type de requête (GetRecords, GetRecordById ou GetCapabilities) - "GetCapabilities" ici.

Les autres paramètres sont ignorés.

## Démonstration:

* http://www.cigalsace.net/xml2csw/?xml_dir=xml&maxrecords=10&startposition=1&request=GetRecords&constraint=anyText+LIKE+'*ortho*'
* http://www.cigalsace.net/xml2csw/?request=GetRecordById&id=FR-236700019-ORTHO-RVB-20112012-CIGAL&xml_dir=xml
* http://www.cigalsace.net/xml2csw/?request=GetCapabilities

---
[1]: http://www.geosource.fr/ "GéoSources"
[2]: http://geonetwork-opensource.org/ "GéoNetwork"
[3]: https://github.com/cigalsace/cswReaderJS
[4]: https://github.com/cigalsace/mdReaderJS
[5]: https://github.com/cigalsace/xml2csw
[6]: http://geobretagne.fr/
