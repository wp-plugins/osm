<?php
/*
Plugin Name: OSM
Plugin URI: http://www.Fotomobil.at/wp-osm-plugin
Description: Embeds <a href="http://www.OpenStreetMap.org">OpenStreetMap</a> maps in your blog and adds geo data to your posts. Get the latest version on the <a href="http://www.Fotomobil.at/wp-osm-plugin">OSM plugin page</a>.
Version: 0.6
Author: Michael Kang
Author URI: http://www.Fotomobil.at
Minimum WordPress Version Required: 2.5.1
*/

/*  (c) Copyright 2009  Michael Kang

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* 
    Keep in mind, all changes you do by your own are lost 
    whenever you update your plugin. If you need any general
    feature contact me to make a standard of OSM plugin!

    Version 0.2 - features added bugs fixed
     + loading GPX files with shortcode from one file
     + java scripts are not loaded in wp-admin anymore

    Version 0.3 - features added bugs fixed
     + added shortcode marker_all_posts to get markes of meta geo data
    
    Version 0.4 - features added bugs fixed
     + added KML support and colour interface for tracks

    Version 0.5 - features added bugs fixed
     + added type (Mapnik, Osmarender, CycleMap, All)
     + add overview map shortcode

    Version 0.6 - features added bugs fixed
     + options got prefix "osm_", therefore the settings have to be made again at upgrade
     + import data from google-maps-geocoder plugin
     + lat,long ist optional if geo data is set for the post

    next features:
     + add a single marker in the shortcode

*/
load_plugin_textdomain('Osm');

// modify anything about the marker for tagged posts here
// instead of the coding.
define ("POST_MARKER_PNG", "tagged_posts_marker.png");
define (POST_MARKER_PNG_HEIGHT, 2);
define (POST_MARKER_PNG_WIDTH, 2);

// these defines are given by OpenStreetMap.org
define ("URL_INDEX", "http://www.openstreetmap.org/index.html?");
define ("URL_LAT","&mlat=");
define ("URL_LON","&mlon=");
define ("URL_ZOOM_01","&zoom=[");
define ("URL_ZOOM_02","]");
define (ZOOM_LEVEL_MAX,17);
define (ZOOM_LEVEL_MIN,1);

// other geo plugin defines
// google-maps-geocoder
define ("WPGMG_LAT", "lat");
define ("WPGMG_LON", "lng");

// some general defines
define (LAT_MIN,-90);
define (LAT_MAX,90);
define (LON_MIN,-180);
define (LON_MAX,180);

if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
define ("OSM_PLUGIN_URL", WP_PLUGIN_URL."/Osm/");
define ("URL_POST_MARKER", OSM_PLUGIN_URL.POST_MARKER_PNG);

global $wp_version;
if (version_compare($wp_version,"2.5.1","<")){
  exit('[OSM plugin - ERROR]: At least Wordpress Version 2.5.1 is needed for this plugin!');
}

// let's be unique ... 
// with this namespace
class Osm
{  
	// add it to the Settings page
	function options_page_osm()
	{
		if(isset($_POST['Options'])){

      // 0 = no error; 
      // 1 = error occured
      $Option_Error = 0; 
			
      // get the zoomlevel for the external link
      // and inform the user if the level was out of range
      update_option('osm_custom_field',$_POST['osm_custom_field']);
      if ($_POST['osm_zoom_level'] >= ZOOM_LEVEL_MIN && $_POST['osm_zoom_level'] <= ZOOM_LEVEL_MAX){
        update_option('osm_zoom_level',$_POST['osm_zoom_level']);
      }
      else { 
        $Option_Error = 1;
        echo '<div class="updated"><p><strong>' . __('Map Zoomlevel out of range!'.'</p>', 'Osm');
      }
      
      // Let the user know whether all was fine or not
      if ($Option_Error  == 0){ 
        echo '<div class="updated"><p><strong>' . __('Options updated.', 'Osm') . '</strong></p></div>';
      }
      else{
         echo __('[WARNING]: Not all options updated!', 'Osm') . '</strong></p></div>';
      }
	
		}
		else{
			add_option('osm_custom_field', 0);
			add_option('osm_zoom_level', 0);
		}
	
    // name of the custom field to store Long and Lat
    // for the geodata of the post
		$osm_custom_field  = get_option('osm_custom_field');                                                  

    // zoomlevel for the link the OSM page
    $osm_zoom_level    = get_option('osm_zoom_level');
			
		//show it in the settings page
		echo '
			<div class="wrap">
			<h2>' . __('OpenStreetMap Plugin v0.6', 'Osm') . '</h2>
			<form method="post">
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr valign="top">
						<th width="33%" scope="row">' . __('Add Geo info to your posts', 'Osm') . ':</th>
						<td>
							<dl>
							<dt><label for="osm_custom_field">' . __('Custom Field Name', 'Osm') . ':</label></dt>
							<dd><input type="text" name="osm_custom_field" value="' . $osm_custom_field . '" /></dd>
							<dt><label for="osm_zoom_level">' . __('Map Zoomlevel (1-17)', 'Osm') . ':</label></dt>
							<dd><input type="text" name="osm_zoom_level" value="' . $osm_zoom_level . '" /></dd>
							</dl>
						</td>
					</tr>
				</table>
				<div class="submit"><input type="submit" name="Options" value="' . __('Update Options', 'Osm') . ' &raquo;" /></div>
			</form>
			</div>
		';
	?>
	</form>
	
	</div>
	<?php
	}
	
  // put meta tags into the head section
	function wp_head($not_used)
	{
		global $wp_query;

		$CustomField = get_option('osm_custom_field');
		list($lat, $lon) = split(',', get_post_meta($wp_query->post->ID, $CustomField, true));
		if(is_single() && ($lat != '') && ($lon != '')){
			$title = convert_chars(strip_tags(get_bloginfo("name")))." - ".$wp_query->post->post_title;
      echo "<!-- OSM plugin v0.6: adding geo meta tags: -->\n";
		}
		else{
      echo "<!-- OSM plugin v0.6: no geo data for this page / post set -->";
			return;
		}

    // let's store geo data with W3 standard
		echo "<meta name=\"ICBM\" content=\"{$lat}, {$lon}\" />\n";
		echo "<meta name=\"DC.title\" content=\"{$wp_query->post->post_title}\" />\n";
    echo "<meta name=\"geo.placename\" content=\"{$wp_query->post->post_title}\"/>\n"; 
		echo "<meta name=\"geo.position\"  content=\"{$lat};{$lon}\" />\n";
	}

  // support different types of GML Layers
  function addGmlLayer($a_LayerName, $a_FileName, $a_Colour, $a_Type){
    $Layer .= '  var lgml = new OpenLayers.Layer.GML("'.$a_LayerName.'", "'.$a_FileName.'", {';
    $Layer .= '    format: OpenLayers.Format.'.$a_Type.',';
    $Layer .= '    style: {strokeColor: "'.$a_Colour.'", strokeWidth: 5, strokeOpacity: 0.5},';
    $Layer .= '    projection: new OpenLayers.Projection("EPSG:4326")';
    $Layer .= '  });';
    $Layer .= '  map.addLayer(lgml);';
    return $Layer;
  }

  // support different types of GML Layers
  function addTaggedPostsMarkerLayer($a_import, $marker_name, $marker_width, $marker_height){
	   global $post;
     $CustomFieldName = get_settings('osm_custom_field');
      
     $recentPosts = new WP_Query();
     $recentPosts->query('showposts=1590');

     $Layer .= 'var Post_Markers = new OpenLayers.Layer.Markers( "Post_Markers", {projection: map.displayProjection});';
     $Layer .= 'var size = new OpenLayers.Size('.$marker_width.','.$marker_height.');';
     $Layer .= 'var offset = new OpenLayers.Pixel(0, 0);';
     $Layer .= 'var icon = new OpenLayers.Icon("'.OSM_PLUGIN_URL.$marker_name.'",size,offset);';

     // make a dummymarker to you use icon.clone later
     $Layer .= 'var Marker_LonLat = new OpenLayers.LonLat(47.0679158,15.4417229).transform(map.displayProjection,  map.projection);';
     $Layer .= 'Post_Markers.addMarker(new OpenLayers.Marker(Marker_LonLat,icon.clone()));';

     // let's see which posts are using our geo data ...
     while ($recentPosts->have_posts()) : $recentPosts->the_post();
        if ($a_import == 'OSM'){
  	      list($temp_lat, $temp_lon) = split(',', get_post_meta($post->ID, $CustomFieldName, true)); 
        }
        else if ($a_import == 'WPGMG'){
          $temp_lat = get_post_meta($post->ID, WPGMG_LAT, true);  
          $temp_lon = get_post_meta($post->ID, WPGMG_LON, true);  
        }
	      if ($temp_lat != '' && $temp_lon != '') {
          // is long and lat within the range and is it a number?
          if ($temp_lat >= LAT_MIN && $temp_lat <= LAT_MAX && $temp_lon >= LON_MIN && $temp_lon <= LON_MAX &&
                      preg_match('!^[^0-9]+$!', $temp_lat) != 1 && preg_match('!^[^0-9]+$!', $temp_lon) != 1){
            $Layer .= 'var Marker_LonLat = new OpenLayers.LonLat('.$temp_lon.','.$temp_lat.').transform(map.displayProjection,  map.projection);';
            $Layer .= 'Post_Markers.addMarker(new OpenLayers.Marker(Marker_LonLat,icon.clone()));';
          }
          else{// inform the user which post has got a wrong long or lat value
            echo the_permalink()." has got wrong Osm geo data [Custom Field: ".$CustomFieldName."]!";
          }
	      } 
     endwhile;
     $Layer .= 'map.addLayer(Post_Markers);';
    return $Layer;
  }
 
  // support different types of GML Layers
  function addOsmLayer($a_LayerName, $a_Type, $a_OverviewMapZoom){
    $Layer .= ' map = new OpenLayers.Map ("'.$a_LayerName.'", {';
    $Layer .= '            controls:[';
    $Layer .= '              new OpenLayers.Control.Navigation(),';
    $Layer .= '              new OpenLayers.Control.PanZoomBar(),';
    $Layer .= '              new OpenLayers.Control.Attribution()],';
    $Layer .= '          maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),';
    $Layer .= '          maxResolution: 156543.0399,';
    $Layer .= '          numZoomLevels: 19,';
    $Layer .= '          units: "m",';
    $Layer .= '          projection: new OpenLayers.Projection("EPSG:900913"),';
    $Layer .= '           displayProjection: new OpenLayers.Projection("EPSG:4326")';
    $Layer .= '      } );';
    if ($a_Type == 'All'){
      $Layer .= 'var layerMapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");';
      $Layer .= 'var layerTah    = new OpenLayers.Layer.OSM.Osmarender("Osmarender");';
      $Layer .= 'var layerCycle  = new OpenLayers.Layer.OSM.CycleMap("CycleMap");';
      $Layer .= 'map.addLayers([layerMapnik, layerTah, layerCycle]);';
      $Layer .= 'map.addControl(new OpenLayers.Control.LayerSwitcher());';
    }
    else{
      if ($a_Type == 'Mapnik'){
        $Layer .= 'var lmap = new OpenLayers.Layer.OSM.Mapnik("Mapnik");';
      }
      else if ($a_Type == 'Osmarender'){
        $Layer .= 'var lmap = new OpenLayers.Layer.OSM.Osmarender("Osmarender");';
      } 
      else if ($a_Type == 'CycleMap'){
        $Layer .= 'var lmap = new OpenLayers.Layer.OSM.CycleMap("CycleMap");';
      }
      $Layer .= 'map.addLayer(lmap);';
    }

    // add the overview map
    if ($a_OverviewMapZoom >= 0){  
      $Layer .= 'layer_ov = new OpenLayers.Layer.OSM.Mapnik("Mapnik");';
      if ($a_OverviewMapZoom > 0 && $a_OverviewMapZoom < 18 ){
        $Layer .= 'var options = {
                      layers: [layer_ov],
                      mapOptions: {numZoomLevels: '.$a_OverviewMapZoom.'}
                      };';
      }
      else{
        $Layer .= 'var options = {layers: [layer_ov]};';
      }
      $Layer .= 'map.addControl(new OpenLayers.Control.OverviewMap(options));';
    }
    return $Layer;
  }


  // if you miss a colour, just add it
  function checkStyleColour($a_colour){
    if ($a_colour != 'red' && $a_colour != 'blue' && $a_colour != 'black' && $a_colour != 'green'){
      return "blue";
    }
    return $a_colour;
  }

  // if you miss a MapType, just add it
  function checkMapType($a_type){
    if ($a_type != 'Mapnik' && $a_type != 'Osmarender' && $a_type != 'CycleMap' && $a_type != 'All'){
      return "All";
    }
    return $a_type;
  }

  // check the num of zoomlevels
  function checkOverviewMapZoomlevels($a_Zoomlevels){
    if ( $a_Zoomlevels > 17){
      return 0;
    }
    return $a_Zoomlevels;
  }

  // check Lat and Long
  function checkLatLong($a_Lat, $a_Long, $a_import){
    if ($a_import == 'WPGMG'){
      $a_Lat  = OSM_getCoordinateLat($a_import);
      $a_Long = OSM_getCoordinateLong($a_import);
    }
    else if ($a_Lat == '' || $a_Long == ''){
      $a_Lat  = OSM_getCoordinateLat('OSM');
      $a_Long = OSM_getCoordinateLong('OSM');
    }
    else if ($a_Lat < LAT_MIN || $a_Lat > LAT_MAX || $a_Long < LON_MIN || $a_Long > LON_MAX){
     echo $a_Lat; echo $a_Long;
     return "[OSM plugin - ERROR]: Lat(-90 to 90) or Long(-180 to 180) is out of range!";
     $a_Lat  = 0;
     $a_Long = 0;
    }
    return array($a_Lat,$a_Long);
  }

  // execute the java script to display 
  // the OpenStreetMap
  function sc_showMap($atts) {
    // let's get the shortcode arguments
  	extract(shortcode_atts(array(
    // size of the map
    'width'     => '450', 'height' => '300', 
    // address of the center in the map
		'lat'       => '', 'long'  => '',    
    // the zoomlevel of the map 
    'zoom'      => '10',     
    // Osmarender, Mapnik, CycleMap, ...           
    'type'      => 'All',
    // track info
    'gpx_file'  => 'NoFile',        // 'absolut address'          
    'gpx_colour'=> 'NoColour',
    'kml_file'  => 'NoFile',        // 'absolut address'          
    'kml_colour'=> 'NoColour',
    // are there markers in the map wished loaded from a file
    'marker_file'         => 'NoFile', // 'absolut address'
    // are there markers in the map wished loaded from post tags
    'marker_all_posts'    => 'n',      // 'y' or 'Y'
    'marker_name'     => 'NoName',
    'marker_height'   => '0',
    'marker_width'    => '0',
    // overviewmap
    'ov_map'          => '-1',       // zoomlevel of overviewmap
    'import'          => 'No',
	  ), $atts));

    // if there is no info about the marker
    // then set it to default values
    if ($marker_name == 'NoName'){
      $marker_name = POST_MARKER_PNG;
    }
    if ($marker_height == 0){
      $marker_height = POST_MARKER_PNG_HEIGHT;
    }
    if ($marker_width == 0){
      $marker_width = POST_MARKER_PNG_WIDTH;
    }

    if ($zoom < ZOOM_LEVEL_MIN || $zoom > ZOOM_LEVEL_MAX){
     echo $zoom; echo $zoom;
     return "[OSM plugin - ERROR]: zoom level is out of range!";
    }
    if ($width < 1 || $height < 1){
     echo $width; echo $height;
     return "[OSM plugin - ERROR]: width or height is too small!";
    }

    // if there is an invalid colour, just use the default one
    list($lat, $long) = Osm::checkLatLong($lat, $long, $import);
    $gpx_colour       = Osm::checkStyleColour($gpx_colour); 
    $kml_colour       = Osm::checkStyleColour($kml_colour);
    $type             = Osm::checkMapType($type);
    $ov_map           = Osm::checkOverviewMapZoomlevels($ov_map);

    // to manage several maps on the same page
    // create names with index
    static  $MapCounter = 0;
    $MapCounter += 1;
    $MapName = 'map_'.$MapCounter;
    $GpxName = 'GPX_'.$MapCounter;
    $KmlName = 'KML_'.$MapCounter;

    // if we came up to here, let's load the map
    $output = '';
    $output .= '<div id="'.$MapName.'" class="Oms" style="width:'.$width.'px; height:'.$height.'px; overflow:hidden"></div>';
    $output .= '<script type="text/javascript">';
    $output .= '/* <![CDATA[ */';
    $output .= 'jQuery(document).ready(';
    $output .= 'function($) {';

    $output .= Osm::addOsmLayer($MapName, $type, $ov_map);

    $output .= 'var lonLat = new OpenLayers.LonLat('.$long.','.$lat.').transform(map.displayProjection,  map.projection);';
    $output .= 'map.setCenter (lonLat,'.$zoom.');'; // Zoomstufe einstellen

    // Add the Layer with GPX Track
    if ($gpx_file != 'NoFile'){ 
        $output .= Osm::addGmlLayer($GpxName, $gpx_file,$gpx_colour,'GPX');
    }

    // Add the Layer with KML Track
    if ($kml_file != 'NoFile'){ 
        $output .= Osm::addGmlLayer($KmlName, $kml_file,$kml_colour,'KML');
    }

    // Add the marker here which we get from the file
    if ($marker_file != 'NoFile'){
    $output .= 'var pois = new OpenLayers.Layer.Text( "Markers",';
    $output .= '        { location:"'.$marker_file.'",';
    $output .= '          projection: map.displayProjection';
    $output .= '        });';
    $output .= 'map.addLayer(pois);';
    }  

    // Add the marker from the posts with geo data
    if ($marker_all_posts == 'WPGMG'){
      $output .= Osm::addTaggedPostsMarkerLayer($marker_all_posts, $marker_name, $marker_width, $marker_height);
    }
    else if ($marker_all_posts == 'y' || $marker_all_posts =='Y'){
      $output .= Osm::addTaggedPostsMarkerLayer('OSM', $marker_name, $marker_width, $marker_height);
    }

    $output .= '}';
    $output .= ');';
    $output .= '/* ]]> */';
    $output .= ' </script>';
    return $output;
	}

	// add OSM-config page to Settings
	function admin_menu($not_used){
		add_options_page(__('OpenStreetMap Manager', 'Osm'), __('OSM', 'Osm'), 5, basename(__FILE__), array('Osm', 'options_page_osm'));
	}
  
  // ask WP to handle the loading of scripts
  // if it is not admin area
  function show_enqueue_script() {
    if (!is_admin()){
        wp_enqueue_script(array ('jquery'));
        wp_enqueue_script('OlScript', 'http://www.openlayers.org/api/OpenLayers.js');
        wp_enqueue_script('OsnScript', 'http://www.openstreetmap.org/openlayers/OpenStreetMap.js');
	  }
  }
}	// End class Osm

// add the WP action
add_action('wp_head', array('Osm', 'wp_head'));
add_action('admin_menu', array('Osm', 'admin_menu'));
add_action('wp_print_scripts',array('Osm','show_enqueue_script'));

// add the WP shortcode
add_shortcode('osm_map',array('Osm','sc_showMap'));

// This is meant to be the interface used
// in your WP-template
// returns Lat data of coordination
function OSM_getCoordinateLat($a_import)
{
	global $post;
  
  if ($a_import == 'OSM'){
	  list($lat, $lon) = split(',', get_post_meta($post->ID, get_settings('osm_custom_field'), true));
  }
  else if ($a_import == 'WPGMG'){
	  $lat = get_post_meta($post->ID, WPGMG_LAT, true);
    echo"haha".$lat;
  }
  else {
    echo "[OSM plugin - ERROR]: OSM_getCoordinateLat did not get argument!";
    $lat = 0;
  }
  if ($lat != '') {
	  return trim($lat);
  } 
  return '';
}

// returns Lon data
function OSM_getCoordinateLong($a_import)
{
	global $post;
  
  if ($a_import == 'OSM'){
	  list($lat, $lon) = split(',', get_post_meta($post->ID, get_settings('osm_custom_field'), true));
  }
  else if ($a_import == 'WPGMG'){
	  list($lon) = split(',', get_post_meta($post->ID,WPGMG_LON, true));
    echo"haha".$lon;
  }
  else {
    echo "[OSM plugin - ERROR]: OSM_getCoordinateLong did not get argument!";
    $lon = 0;
  }
  if ($lon != '') {
	  return trim($lon);
  } 
  return '';
}

function OSM_getOpenStreetMapUrl() {
  $zoom_level = get_settings('osm_zoom_level');  
	$lat = $lat == ''? OSM_getCoordinateLat('OSM') : $lat;
	$lon = $lon == ''? OSM_getCoordinateLong('OSM'): $lon;
  return URL_INDEX.URL_LAT.$lat.URL_LON.$lon.URL_ZOOM_01.$zoom_level.URL_ZOOM_02;
}

function OSM_echoOpenStreetMapUrl(){
  echo OSM_getOpenStreetMapUrl() ;
}

?>
