<?php
/*
  Option page for OSM wordpress plugin
  Michael Kang * created: april 2009
  plugin: http://www.Fotomobil.at/wp-osm-plugin
  blog:   http://www.HanBlog.net
*/
?>

<div class="wrap">
<table border="0">
 <tr>
  <td><p><img src="<?php echo OSM_PLUGIN_URL ?>/WP_OSM_Plugin_Logo.png" alt="Osm Logo"></p></td>
  <td><h2>OpenStreetMap Plugin <?php echo PLUGIN_VER ?> </h2></td>
 </tr>
</table>
<table border="0">
<h3>How to add a map to your post/page</h3>
<ol>
  <li>choose a marker if you want to</li>
  <li>add a gpx file and/or marker file if you want to</li>
  <li>add a border around the map and or some controls if you want to</li>
  <li>click on the map to generate the shortcode (if you chose a marker it's placed where you clicked)</li>
  <li>copy the shortcode from below the map and paste it in your post/page</li>
  <li>delete the argument <i>type</i> if you want all osm maps to be available</li>
  <li>add other arguments to insert tracks, points ... or modify mapsize ... if needed</li>
  <li style="color:red"> do not save any of your personal data in the plugins/osm folder but in the upload folder!</li>
</ol>
<br>

<table border="0">
<form name="Markerform" action="">
<h3>If you want to add a marker choose one of the supported:</h3>
  <li>the marker is placed where you click into the map</li>
  <li>alternativly you can also add privat marker from the upload folder (see <a target="_new" href="http://wiki.openstreetmap.org/wiki/Wp-osm-plugin#adding_a_single_marker">osm-wiki page</a>)</li>
  <colgroup>
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">
  </colgroup>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/marker_blue.png" alt="Blue Marker"><br><input type="radio" name="Art" value="marker_blue.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-green.png" alt="Green Waypoint"><br><input type="radio" name="Art" value="wpttemp-green.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-red.png" alt="Red Waypoint"><br><input type="radio" name="Art" value="wpttemp-red.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-yellow.png" alt="Yellow Marker"><br><input type="radio" name="Art" value="wpttemp-yellow.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/geocache.png" alt="Geocache"><br><input type="radio" name="Art" value="geocache.png"></p></td>
 </tr>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/car.png" alt="Car Marker"><br><input type="radio" name="Art" value="car.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/bus.png" alt="Bus Waypoint"><br><input type="radio" name="Art" value="bus.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/bicycling.png" alt="Bicycling Waypoint"><br><input type="radio" name="Art" value="bicycling.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/airport.png" alt="Airport Marker"><br><input type="radio" name="Art" value="airport.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/motorbike.png" alt="Motorbike"><br><input type="radio" name="Art" value="motorbike.png"></p></td>
 </tr>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/hotel.png" alt="Hotel Marker"><br><input type="radio" name="Art" value="hotel.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/hostel.png" alt="Hostel Waypoint"><br><input type="radio" name="Art" value="hostel.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/guest_house.png" alt="Guesthouse Waypoint"><br><input type="radio" name="Art" value="guest_house.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/camping.png" alt="Camping Marker"><br><input type="radio" name="Art" value="camping.png"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/styria_linux.png" alt="Styria Tux"><br><input type="radio" name="Art" value="styria_linux.png"></p></td>
 </tr>
</form>
</table>

<h3>If you want to add a gpx-track add it:</h3>
<form name="GPXfileform" action="">
  <li>copy the gpx file via FTP to your upload-folder</li>
  <li>paste the local URL of gpx file here: <input name="GpxFile" type="text" size="30" maxlength="200" value="http://"></li>
</form>
<form name="GPXcolourform" action="">
<li> colour of your gpx-track: 
  <input type="radio" name="Gpx_colour" value="red"> <span style="color:red">red </span>
  <input type="radio" name="Gpx_colour" value="green"> <span style="color:green">green </span>
  <input type="radio" name="Gpx_colour" value="blue"> <span style="color:blue">blue </span>
  <input type="radio" name="Gpx_colour" value="black"> <span style="color:black">black </span>
</li>
</form>

<h3>If you want to add a marker file add it:</h3>
<form name="Markerfileform" action="">
  <li>copy the marker file via FTP to your upload-folder</li>
  <li>paste the local URL of marker file here: <input name="MarkerFile" type="text" size="30" maxlength="200" value="http://"></li>
</form>

<h3>If you want to add a border around the map choose the colour:</h3>
<form name="Bordercolourform" action="">
<li> colour of a thin solid border: 
  <input type="radio" name="Border_colour" value="red"> <span style="color:red">red </span>
  <input type="radio" name="Border_colour" value="green"> <span style="color:green">green </span>
  <input type="radio" name="Border_colour" value="blue"> <span style="color:blue">blue </span>
  <input type="radio" name="Border_colour" value="black"> <span style="color:black">black </span>
</li>
</form>

<h3>If you want to add some controls to your map add it here:</h3>
<form name="MapControlform" action="">
<p><img src="<?php echo OSM_PLUGIN_URL ?>/WP_OSM_Plugin_Scaleline.png" alt="Scaleline"><br><input type="radio" name="MapControl" value="scaleline"> scaleline</p>
</form>

<br>
<h3> Adjust the map and click into the map to get your shortcode below the map</h3>
  <li>select the area and zoomlevel on the map (get a zoomwindow with shift and mousebutton)</li>
  <li>choose your maptype with this icon <img src="http://www.openlayers.org/api/img/layer-switcher-maximize.png" alt="map type icon"> in the map (google maps will have a license pop up in yor post/page)</li>
  <li> your inputs (gpx-file, marker,...) are not displayed in this map but in your post/page </li>
  <li> you can modify your inputs and click again into the map to generate another shortcode </li> 
<br> 
<?php echo Osm::sc_showMap(array('msg_box'=>'sc_gen','lat'=>'50','long'=>'18.5','zoom'=>'3', 'type'=>'All', 'width'=>'600','height'=>'450', 'map_border'=>'thin solid blue')); ?>
<br>
<h3><span style="color:green"> >> Copy the shortcode and paste it into the content of your post/article: </span></h3>
<div id="ShortCode_Div">If you click into the map the shortcode is displayed instead of this text</div><br>

<h3>Some usefull sites for this plugin:</h3>
<ol>
  <li>for advanced samples visit the <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin">osm-plugin page</a>.</li>
  <li>for detailed information about usage visit the <a target="_new" href="http://wiki.openstreetmap.org/wiki/Wp-osm-plugin">osm-wiki page</a>.</li>
  <li>for questions, bugs and other feedback visit the <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin-forum">osm-plugin forum</a>.</li>
  <li>find news and articles about the plugin at the <a target="_new" href="http://www.HanBlog.net">osm-author page</a>.</li>
  <li>download the last version at WordPress.org <a target="_new" href="http://wordpress.org/extend/plugins/osm/">osm-plugin download</a>.</li>
</ol>
<h3>If you want to express thanks for this plugin ...</h3>
<ol>
  <li>do not donate money but submit a photo at the <a target="_new" href="http://www.Fotomobil.at">Fotomobil.at</a> project.</li>
  <li>put a link to the osm-plugin page on your site <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin">www.Fotomobil.at/wp-osm-plugin</a>.</li>
  <li>or simply leave a message with a link to your page at <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin-forum">www.Fotomobil.at/wp-osm-plugin-forum</a>.</li>
  <li>post an article about <a target="_new" href="http://www.OpenStreetMap.org">OpenStreetMap</a> on your blog.</li>
  <li>give this plugin a good ranking at <a target="_new" href="http://wordpress.org/extend/plugins/osm/">WordPress.org</a>.</li>
</ol>
<form method="post">
 <tr> <h3>How to geotag your post/page </h3> </tr>
  <ol>
    <li>Choose a Custom Field name here.</li>
    <li>Add the geoaddress to this Custom Field in your post/page.</li>
  </ol>
 <tr>
  <td><label for="osm_custom_field"><?php echo __('Custom Field Name', 'Osm') ?>:</label></td>
  <td><input type="text" name="osm_custom_field" value="<?php echo $osm_custom_field ?>" /></td>
 </tr>
 <tr> <h3>PHP Interface</h3> </tr>
 <tr>
  <td><label for="osm_zoom_level"><?php echo __('Map Zoomlevel for the PHP Link (1-17)', 'Osm') ?>:</label></td>
  <td><input type="text" name="osm_zoom_level" value="<?php echo $osm_zoom_level ?>" /></td>
 </tr>
</table>
<div class="submit"><input type="submit" name="Options" value="<?php echo __('Update Options', 'Osm') ?> &raquo;" /></div>
</div>
</form>
