<?php
/*
  import function for OSM wordpress plugin
  Michael Kang * april 2009
  http://www.Fotomobil.at/wp-osm-plugin
  file is used within: 
  function createMarkerList($a_import, $a_import_UserName, $a_Customfield)
*/
?>

<?php  

define (GC_STATS_INTERFACE_VER,1);

// wpgmg plugin of Karl Kevilus
// generate lat,lon from address
// http://karlkevilus.com/wordpress-google-maps-geocoder/
if ($a_import == 'wpgmg'){
   $temp_lat = get_post_meta($post->ID, WPGMG_LAT, true);  
   $temp_lon = get_post_meta($post->ID, WPGMG_LON, true);  
}
// gcStats plugin of Michael Jostmeyer
// statistics about geocaching
// http://michael.josi.de/projects/gcstats/
else if($a_import == 'gcstats'){

  // check whether the plugin is loaded
  if (!function_exists('gcStats__getInterfaceVersion')) {
     echo '[OSM plugin - ERROR]: gcStats plugin not activated! <br>';
     return;
  }
  // the plugin-version is not important, but the interface of gcStats
  // has to fullfill all the requests of OSM-plugin
  else if (gcStats__getInterfaceVersion() < GC_STATS_INTERFACE_VER){
     echo '[OSM plugin - ERROR]: gcStats plugin has to be updated (If-Version)!';
     return;
  }

  // get the data from gcstats plugin, check it and add it to the marker-array
  $temp_caches = gcStats__getCachesData($a_import_UserName, $a_Customfield);
  foreach($temp_caches as $k => $CachesArray){
    list($temp_lat, $temp_long) = Osm::checkLatLongRange('gcStats',$CachesArray[lat], $CachesArray[lon]);
    $MarkerArray[] = array('lat'=> $temp_lat,'lon'=>$temp_long,'marker'=>GCSTATS_MARKER_PNG);
  }
}
?>

