<?php
/*
  Option page for OSM wordpress plugin
  Michael Kang * april 2009
  http://www.Fotomobil.at/wp-osm-plugin
*/
?>

<div class="wrap">
<table border="0">
 <tr>
  <td><p><img src="<?php echo OSM_PLUGIN_URL ?>/OSM_Logo_01.png" alt="Osm Logo"></p></td>
  <td><h2>OpenStreetMap Plugin <?php echo PLUGIN_VER ?> </h2></td>
 </tr>
</table>
<table border="0">
<h3>How to add a map to your post/article</h3>
<ol>
  <li>select the area and zoomlevel on the map</li>
  <li>click on the map where you want to place a marker</li>
  <li>copy the shortcode from the massage window and paste it in your post / article</li>
  <li>modify or delete the arguments <i>marker</i> and <i>marker_name</i> if you do not need a marker in your map</li>
  <li>add other arguments to insert tracks, points ... or modify mapsize ... if needed</li>
  <li style="color:red"> do not save any of your personal data in the plugins/osm folder but in the upload folder!</li>
</ol>
<br>
<table border="0">
  <colgroup>
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">
    <col width="120">
  </colgroup>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/marker_blue.png" alt="Blue Marker"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-green.png" alt="Green Waypoint"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-red.png" alt="Red Waypoint"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/wpttemp-yellow.png" alt="Yellow Marker"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/geocache.png" alt="Geocache"></p></td>
 </tr>
 <tr>
  <td align="center"><p>marker_blue.png</p></td>
  <td align="center"><p>wpttemp-green.png</p></td>
  <td align="center"><p>wpttemp-red.png</p></td>
  <td align="center"><p>wpttemp-yellow.png</p></td>
  <td align="center"><p>geocache.png</p></td>
 </tr>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/car.png" alt="Blue Marker"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/bus.png" alt="Green Waypoint"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/bicycling.png" alt="Red Waypoint"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/airport.png" alt="Yellow Marker"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/motorbike.png" alt="Geocache"></p></td>
 </tr>
 <tr>
  <td align="center"><p>car.png</p></td>
  <td align="center"><p>bus.png</p></td>
  <td align="center"><p>bicycling.png</p></td>
  <td align="center"><p>airport.png</p></td>
  <td align="center"><p>motorbike.png</p></td>
 </tr>
 <tr>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/hotel.png" alt="Blue Marker"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/hostel.png" alt="Green Waypoint"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/guest_house.png" alt="Red Waypoint"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/camping.png" alt="Yellow Marker"></p></td>
  <td align="center"><p><img src="<?php echo OSM_PLUGIN_URL ?>/icons/styria_linux.png" alt="Styria Tux"></p></td>
 </tr>
 <tr>
  <td align="center"><p>hotel.png</p></td>
  <td align="center"><p>hostel.png</p></td>
  <td align="center"><p>guest_house.png</p></td>
  <td align="center"><p>camping.png</p></td>
  <td align="center"><p>styria_linux.png</p></td>
 </tr>

</table>
<br>
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
