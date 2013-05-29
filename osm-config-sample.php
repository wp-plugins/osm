<?php
// SERVER_EMBEDDED   ... loaded by the plugin for each map (default)
// SERVER_WP_ENQUEUE ... registered and loaded by WordPress
define ("Osm_LoadLibraryMode", SERVER_EMBEDDED); 
define ("Osm_OSM_LibraryLocation", 'http://www.openstreetmap.org/openlayers/OpenStreetMap.js');
//define ("Osm_OL_LibraryLocation", 'http://www.openlayers.org/api/OpenLayers.js');
define ("Osm_OL_LibraryLocation", 'http://openlayers.org/api/2.12/OpenLayers.js');
define ("Osm_GOOGLE_LibraryLocation", 'http://maps.google.com/maps/api/js?sensor=false');
// OpenSeaMap scripts
define ("Osm_harbours_LibraryLocation", 'http://map.openseamap.org/map/javascript/harbours.js');
define ("Osm_map_utils_LibraryLocation", 'http://map.openseamap.org/map/javascript/map_utils.js');
define ("Osm_utilities_LibraryLocation", 'http://map.openseamap.org/map/javascript/utilities.js');
?>
