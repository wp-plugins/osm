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
<h3><?php _e('How to add a map to your post/page','OSM-plugin') ?></h3>
<ol>
  <li><?php _e('choose a marker if you want to','OSM-plugin') ?></li>
  <li><?php _e('add a gpx file and/or marker file if you want to','OSM-plugin') ?></li>
  <li><?php _e('add a border around the map and or some controls if you want to','OSM-plugin') ?></li>
  <li><?php _e('click on the map to generate the shortcode (if you chose a marker it is placed where you clicked)','OSM-plugin') ?></li>
  <li><?php _e('copy the shortcode from below the map and paste it in your post/page','OSM-plugin') ?></li>
  <li><?php _e('delete the argument - type - if you want all osm maps to be available','OSM-plugin') ?></li>
  <li><?php _e('add other arguments to insert tracks, points ... or modify mapsize ... if needed','OSM-plugin') ?></li>
  <li style="color:red"> <?php _e('do not save any of your personal data in the plugins/osm folder but in the upload folder!','OSM-plugin') ?></li>
</ol>
<br>

<table border="0">
<form name="Markerform" action="">
<h3><?php _e('If you want to add a marker choose one of the supported:','OSM-plugin') ?></h3>
  <li><?php _e('the marker is placed where you click into the map','OSM-plugin') ?></li>
  <li><?php _e('alternativly you can also add privat marker from the upload folder (see ','OSM-plugin') ?> <a target="_new" href="http://wiki.openstreetmap.org/wiki/Wp-osm-plugin#adding_a_single_marker">osm-wiki page</a>)</li>
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

<h3><?php _e('If you want to add a gpx-track add it:','OSM-plugin') ?></h3>
<form name="GPXfileform" action="">
  <li><?php _e('copy the gpx file via FTP to your upload-folder','OSM-plugin') ?></li>
  <li><?php _e('paste the local URL of gpx file here: ','OSM-plugin') ?> <input name="GpxFile" type="text" size="30" maxlength="200" value="http://"></li>
</form>
<form name="GPXcolourform" action="">
<li> <?php _e('colour of your gpx-track: ','OSM-plugin') ?> 
  <input type="radio" name="Gpx_colour" value="red"> <span style="color:red"><?php _e('red ','OSM-plugin') ?>  </span>
  <input type="radio" name="Gpx_colour" value="green"> <span style="color:green"><?php _e('green ','OSM-plugin') ?> </span>
  <input type="radio" name="Gpx_colour" value="blue"> <span style="color:blue"><?php _e('blue ','OSM-plugin') ?> </span>
  <input type="radio" name="Gpx_colour" value="black"> <span style="color:black"><?php _e('black ','OSM-plugin') ?> </span>
</li>
</form>

<h3><?php _e('If you want to add a marker file add it:','OSM-plugin') ?></h3>
<form name="Markerfileform" action="">
  <li><?php _e('copy the marker file via FTP to your upload-folder','OSM-plugin') ?></li>
  <li><?php _e('paste the local URL of marker file here: ','OSM-plugin') ?><input name="MarkerFile" type="text" size="30" maxlength="200" value="http://"></li>
</form>

<h3><?php _e('If you want to add a border around the map choose the colour:','OSM-plugin') ?></h3>
<form name="Bordercolourform" action="">
<li> <?php _e('colour of a thin solid border:','OSM-plugin') ?> 
  <input type="radio" name="Border_colour" value="red"> <span style="color:red"><?php _e('red ','OSM-plugin') ?> </span>
  <input type="radio" name="Border_colour" value="green"> <span style="color:green"><?php _e('green ','OSM-plugin') ?> </span>
  <input type="radio" name="Border_colour" value="blue"> <span style="color:blue"><?php _e('blue ','OSM-plugin') ?> </span>
  <input type="radio" name="Border_colour" value="black"> <span style="color:black"><?php _e('black ','OSM-plugin') ?> </span>
</li>
</form>

<h3><?php _e('If you want to add some controls to your map add it here:','OSM-plugin') ?></h3>
<form name="MapControlform" action="">
<p><img src="<?php echo OSM_PLUGIN_URL ?>/WP_OSM_Plugin_Scaleline.png" alt="Scaleline"><br><input type="radio" name="MapControl" value="scaleline"> <?php _e('scaleline','OSM-plugin') ?></p>
</form>

<br>
<h3> <?php _e('Adjust the map and click into the map to get your shortcode below the map','OSM-plugin') ?></h3>
  <li><?php _e('select the area and zoomlevel on the map (get a zoomwindow with shift and mousebutton)','OSM-plugin') ?></li>
  <li><?php _e('choose your maptype with this icon ','OSM-plugin') ?><img src="http://www.openlayers.org/api/img/layer-switcher-maximize.png" alt="map type icon"> <?php _e('in the map (google maps will have a license pop up in yor post/page)','OSM-plugin') ?></li>
  <li> <?php _e('your inputs (gpx-file, marker,...) are not displayed in this map but in your post/page ','OSM-plugin') ?></li>
  <li> <?php _e('you can modify your inputs and click again into the map to generate another shortcode ','OSM-plugin') ?></li> 
<br> 
<?php echo Osm::sc_showMap(array('msg_box'=>'sc_gen','lat'=>'50','long'=>'18.5','zoom'=>'3', 'type'=>'All', 'width'=>'600','height'=>'450', 'map_border'=>'thin solid blue', 'control'=>'mouseposition,scaleline')); ?>
<br>
<h3><span style="color:green"> >> <?php _e('Copy the shortcode and paste it into the content of your post/article: ','OSM-plugin') ?></span></h3>
<div id="ShortCode_Div"><?php _e('If you click into the map the shortcode is displayed instead of this text','OSM-plugin') ?></div><br>

<h3><?php _e('Some usefull sites for this plugin:','OSM-plugin') ?></h3>
<ol>
  <li><?php _e('for advanced samples visit the ','OSM-plugin') ?><a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin">osm-plugin page</a>.</li>
  <li><?php _e('for detailed information about usage visit the ','OSM-plugin') ?><a target="_new" href="http://wiki.openstreetmap.org/wiki/Wp-osm-plugin">osm-wiki page</a>.</li>
  <li><?php _e('for questions, bugs and other feedback visit the','OSM-plugin') ?> <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin-forum">osm-plugin forum</a>.</li>
  <li><?php _e('find news and articles about the plugin at the ','OSM-plugin') ?><a target="_new" href="http://www.HanBlog.net">osm-author page</a>.</li>
  <li><?php _e('download the last version at WordPress.org ','OSM-plugin') ?><a target="_new" href="http://wordpress.org/extend/plugins/osm/">osm-plugin download</a>.</li>
</ol>
<h3><?php _e('If you want to express thanks for this plugin ...','OSM-plugin') ?></h3>
<ol>
  <li><?php _e('do not donate money but submit a photo at the ','OSM-plugin') ?><a target="_new" href="http://www.Fotomobil.at">Fotomobil.at</a> <?php _e('project.','OSM-plugin') ?></li>
  <li><?php _e('put a link to the osm-plugin page on your site ','OSM-plugin') ?><a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin">www.Fotomobil.at/wp-osm-plugin</a>.</li>
  <li><?php _e('or simply leave a message with a link to your page at ','OSM-plugin') ?><a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin-forum">www.Fotomobil.at/wp-osm-plugin-forum</a>.</li>
  <li><?php _e('post an article about ','OSM-plugin') ?><a target="_new" href="http://www.OpenStreetMap.org">OpenStreetMap</a><?php _e(' on your blog.','OSM-plugin') ?></li>
  <li><?php _e('give this plugin a good ranking at ','OSM-plugin') ?><a target="_new" href="http://wordpress.org/extend/plugins/osm/">WordPress.org</a>.</li>
</ol>
<form method="post">
 <tr> <h3><?php _e('How to geotag your post/page ','OSM-plugin') ?></h3> </tr>
  <ol>
    <li><?php _e('Choose a Custom Field name here.','OSM-plugin') ?></li>
    <li><?php _e('Add the geoaddress to this Custom Field in your post/page.','OSM-plugin') ?></li>
  </ol>
 <tr>
  <td><label for="osm_custom_field"><?php _e('Custom Field Name','OSM-plugin') ?>:</label></td>
  <td><input type="text" name="osm_custom_field" value="<?php echo $osm_custom_field ?>" /></td>
 </tr>
 <tr> <h3>  PHP Interface</h3> </tr>
 <tr>
  <td><label for="osm_zoom_level"><?php _e('Map Zoomlevel for the PHP Link (1-17)','OSM-plugin') ?>:</label></td>
  <td><input type="text" name="osm_zoom_level" value="<?php echo $osm_zoom_level ?>" /></td>
 </tr>
</table>
<div class="submit"><input type="submit" name="Options" value="<?php _e('Update Options','OSM-plugin') ?> &raquo;" /></div>
</div>
</form>
