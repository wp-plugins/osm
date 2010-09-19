<?php
// SERVER_EMBEDDED   ... loaded by the plugin for each map (default)
// SERVER_WP_ENQUEUE ... registered and loaded by WordPress
define ("Osm_LoadLibraryMode", SERVER_EMBEDDED); 
define ("Osm_OSM_LibraryLocation", 'http://www.openstreetmap.org/openlayers/OpenStreetMap.js');
define ("Osm_OL_LibraryLocation", 'http://www.openlayers.org/api/OpenLayers.js');
define ("Osm_GOOGLE_LibraryLocation", 'http://maps.google.com/maps/api/js?sensor=false');
?>
