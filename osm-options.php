<?php
/*
  Option page for OSM wordpress plugin
  Michael Kang * april 2009
  http://www.Fotomobil.at/wp-osm-plugin
*/
?>

<div class="wrap">
<form method="post">
<table border="0">
 <tr>
  <td><p><img src="<?php echo OSM_PLUGIN_URL ?>/OSM_Logo_01.png" alt="Osm Logo"></p></td>
  <td><h2>OpenStreetMap Plugin v0.8.1</h2></td>
 </tr>
 <tr>
  <td><label for="osm_custom_field"><?php echo __('Custom Field Name', 'Osm') ?>:</label></td>
  <td><input type="text" name="osm_custom_field" value="<?php echo $osm_custom_field ?>" /></td>;
 </tr>
 <tr>
  <td><label for="osm_zoom_level"><?php echo __('Map Zoomlevel for the PHP Link (1-17)', 'Osm') ?>:</label></td>
  <td><input type="text" name="osm_zoom_level" value="<?php echo $osm_zoom_level ?>" /></td>;
 </tr>
</table>
<div class="submit"><input type="submit" name="Options" value="<?php echo __('Update Options', 'Osm') ?> &raquo;" /></div>
</form>
<h3>How to add a map to your post/article</h3>
<ol>
  <li>1.) select the area and zoomlevel of your map</li>
  <li>2.) click on the map where you want to place a marker</li>
  <li>3.) copy the shortcode from the massage window</li>
  <li>4.) paste the shortcode in your post / article.</li>
  <li>5.) if you do not want to place a marker delete the marker argument</li>
  <li>6.) add other arguments to insert tracks, points ... or modify mapsize ... if needed</li>
</ol>
<br>
<?php echo Osm::sc_showMap(array('msg_box'=>'y','lat'=>'50','long'=>'18.5','zoom'=>'3', 'width'=>'600','height'=>'450')); ?>
</div>
