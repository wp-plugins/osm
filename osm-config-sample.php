<?php
/*!! ------------- I M P O R T A N T ----------------------- 
  !! AFTER MODIFYING THIS FILE YOU HAVE TO RENAME IT TO:
  !!                 osm-config.php
  !! NOT TO BE OVERWRITTEN AFTER NEXT UPDATE !!
  !! ------------- I M P O R T A N T ---------------------*/

// SERVER_EMBEDDED   ... loaded by the plugin for each map (default)
// SERVER_WP_ENQUEUE ... registered and loaded by WordPress
define ("Osm_LoadLibraryMode", SERVER_EMBEDDED); 
define ("Osm_OSM_LibraryLocation", 'http://www.openstreetmap.org/openlayers/OpenStreetMap.js');
define ("Osm_OL_LibraryLocation", 'http://www.openlayers.org/api/OpenLayers.js');
?>