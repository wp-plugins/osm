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
<h3>How to add a map to your post/article</h3>
<ol>
  <li>choose your maptype with this icon <img src="http://www.openlayers.org/api/img/layer-switcher-maximize.png" alt="map type icon"> in the map</li>
  <li>select the area and zoomlevel on the map</li>
  <li>click on the map where you want to place a marker</li>
  <li>copy the shortcode from the massage window and paste it in your post / article</li>
  <li>modify or delete the arguments <i>marker</i> and <i>marker_name</i> if you do not need a marker in your map</li>
  <li>delete the argument <i>type</i> if you want all maps to be available, which loads all libs as well</li>
  <li>add other arguments to insert tracks, points ... or modify mapsize ... if needed</li>
  <li style="color:red"> do not save any of your personal data in the plugins/osm folder but in the upload folder!</li>
</ol>
<br>

<table border="0">
<h3>These markers are supported</h3>
  <colgroup>
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">
  </colgroup>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/marker_blue.png" alt="Blue Marker"><br>marker_blue.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-green.png" alt="Green Waypoint"><br>wpttemp-green.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-red.png" alt="Red Waypoint"><br>wpttemp-red.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-yellow.png" alt="Yellow Marker"><br>wpttemp-yellow.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/geocache.png" alt="Geocache"><br>geocache.png</p></td>
 </tr>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/car.png" alt="Blue Marker"><br>car.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/bus.png" alt="Green Waypoint"><br>bus.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/bicycling.png" alt="Red Waypoint"><br>bicycling.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/airport.png" alt="Yellow Marker"><br>airport.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/motorbike.png" alt="Geocache"><br>motorbike.png</p></td>
 </tr>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/hotel.png" alt="Blue Marker"><br>hotel.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/hostel.png" alt="Green Waypoint"><br>hostel.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/guest_house.png" alt="Red Waypoint"><br>guest_house.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/camping.png" alt="Yellow Marker"><br>camping.png</p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/styria_linux.png" alt="Styria Tux"><br>styria_linux.png</p></td>
 </tr>
</table>
<br>
<h3>Adjust the map and click to get your shortcode</h3>
<?php echo Osm::sc_showMap(array('msg_box'=>'sc_gen','lat'=>'50','long'=>'18.5','zoom'=>'3', 'width'=>'600','height'=>'450')); ?>
<br>
<h3>Some usefull sites for this plugin:</h3>
<ol>
  <li>for advanced samples visit the <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin">osm-plugin page</a>.</li>
  <li>for detailed information about usage visit the <a target="_new" href="http://wiki.openstreetmap.org/wiki/Wp-osm-plugin">osm-wiki page</a>.</li>
  <li>for questions, bugs and other feedback visit the <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin-forum">osm-plugin forum</a>.</li>
  <li>find news and articles about the plugin at the <a target="_new" href="http://www.HanBlog.net">osm-author page</a>.</li>
  <li>download the last version at WordPress.org <a target="_new" href="http://wordpress.org/extend/plugins/osm/">osm-plugin download</a>.</li>
</ol>
<h3>If you want to express thanks for this plubin ...</h3>
<ol>
  <li>do not donate money but submit a photo at the <a target="_new" href="http://www.Fotomobil.at">Fotomobil.at</a> project.</li>
  <li>put a link to the osm-plugin page on your site <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin">www.Fotomobil.at/wp-osm-plugin</a>.</li>
  <li>or simply leave a message with a link to your page at <a target="_new" href="http://www.Fotomobil.at/wp-osm-plugin-forum">www.Fotomobil.at/wp-osm-plugin-forum</a>.</li>
</ol>
<form method="post">
 <tr> <h3>How to geotag your post/page </h3> </tr>
  <ol>
    <li>Choose a Custom Field name here.</li>
    <li>Add the geoaddress to this Custom Field in your post/page.</li>
  </ol>
 <tr>
  <td><label for="osm_custom_field"><?php echo __('Custom Field Name', 'Osm') ?>:</label></td>
  <td><input type="text" name="osm_custom_field" value="<?php echo $osm_custom_field ?>" /></td>;
 </tr>
 <tr> <h3>PHP Interface</h3> </tr>
 <tr>
  <td><label for="osm_zoom_level"><?php echo __('Map Zoomlevel for the PHP Link (1-17)', 'Osm') ?>:</label></td>
  <td><input type="text" name="osm_zoom_level" value="<?php echo $osm_zoom_level ?>" /></td>;
 </tr>
</table>
<div class="submit"><input type="submit" name="Options" value="<?php echo __('Update Options', 'Osm') ?> &raquo;" /></div>
</div>
</form>
