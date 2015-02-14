<?php

function osm_map_create() {
  //create a custom meta box

   wp_enqueue_script( 'ajax-script', plugins_url( '/js/osm-plugin-lib.js', __FILE__ ), array('jquery') );
   wp_localize_script( 'ajax-script', 'osm_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'lat' => '', 'lon' => '', 'icon' => '', 'post_id' => '' ) );

  $screens = array( 'post', 'page' );
  foreach ($screens as $screen) {
    add_meta_box( 'osm-sc-meta', 'WP OSM Plugin shortcode generator', 'osm_map_create_shortcode_function', $screen, 'normal', 'high' );
    add_meta_box( 'osm-geotag-meta', 'WP OSM Plugin geotag', 'osm_geotag_post_function', $screen, 'side', 'core' );
  }
}

function osm_geotag_post_function( $post ) {
?>
    <p>
    <b>1. <?php _e('post icon','OSM-plugin') ?></b>:
    <select name="osm_marker_geotag">
        <option value="none"><?php _e('none','OSM-plugin') ?></option>
        <option value="wpttemp-green.png"><?php _e('Waypoint','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="wpttemp-red.png"><?php _e('Waypoint','OSM-plugin');echo ' ';_e('red','OSM-plugin') ?></option>
        <option value="wpttemp-yellow.png"><?php _e('Waypoint','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="marker_blue.png"><?php _e('Marker','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_black_pinother_01.png"><?php _e('Pin #1','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_pin-export_01.png"><?php _e('Pin #2','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_red_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('red','OSM-plugin') ?></option>
        <option value="mic_green_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_blue_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>       
        <option value="mic_photo_icon.png"><?php _e('Camera','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option> 
        <option value="mic_yel_restaurant_chinese_01.png"><?php _e('Chin. restaurant','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="mic_yel_icecream_01.png"><?php _e('Icecream','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="mic_yel_campingtents_01.png"><?php _e('Campingtents','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="mic_green_campingcar_01.png"><?php _e('Campingcar','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_brown_pickup_camper_01.png"><?php _e('Pickup camper','OSM-plugin');echo ' ';_e('brown','OSM-plugin') ?></option>
        <option value="mic_toilets_disability_01.png"><?php _e('Toilets disability','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_shark_icon.png"><?php _e('Shark','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_red_pizzaria_01.png"><?php _e('Pizzaria','OSM-plugin');echo ' ';_e('red','OSM-plugin') ?></option>
        <option value="mic_parasailing_01.png"><?php _e('Parasailing','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_green_horseriding_01.png"><?php _e('Horseriding','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_cycling_icon.png"><?php _e('Cycling','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_coldfoodcheckpoint_01.png"><?php _e('Coldfookcheckpoint','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_blue_tweet_01.png"><?php _e('Tweet','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_blue_information_01.png"><?php _e('Information','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_blue_horseriding_01.png"><?php _e('Horserinding','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_black_train_01.png"><?php _e('Train','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_steamtrain_01.png"><?php _e('Steamtrain','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_powerplant_01.png"><?php _e('Powerplant','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_parking_bicycle-2_01.png"><?php _e('Bicycle Parking','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_cctv_01.png"><?php _e('cctv','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_blue_toilets_01.png"><?php _e('Toilets','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_blue_scubadiving_01.png"><?php _e('Scubadiving','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_orange_motorbike_01.png"><?php _e('Motorbike','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_orange_sailing_1.png"><?php _e('Sailing','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_orange_fishing_01.png"><?php _e('Fishing','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_blue_mobilephonetower_01.png"><?php _e('Mobilephonetower','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_orange_hiking_01.png"><?php _e('Hiking','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_blue_bridge_old_01.png"><?php _e('Bridge','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_black_memorial_01.png"><?php _e('Memorial','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_green_arbol_01.png"><?php _e('Tree','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_black_finish_01.png"><?php _e('Finish 01','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_finish2_01.png"><?php _e('Finish 02','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_start-race-2_01.png"><?php _e('Start 01','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_green_garden_01.png"><?php _e('Garden','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_blue_drinkingwater_01.png"><?php _e('Drinkingwater','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_orange_archery_01.png"><?php _e('Archery','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_black_archery_01.png"><?php _e('Archery','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="car.png"><?php _e('Car','OSM-plugin') ?></option>
        <option value="bus.png"><?php _e('Bus','OSM-plugin') ?></option>
        <option value="bicycling.png"><?php _e('Bicycling','OSM-plugin') ?></option>
        <option value="airport.png"><?php _e('Airport','OSM-plugin') ?></option>
        <option value="motorbike.png"><?php _e('Motorbike','OSM-plugin') ?></option>
        <option value="hostel.png"><?php _e('Hostel','OSM-plugin') ?></option>
        <option value="guest_house.png"><?php _e('Guesthouse','OSM-plugin') ?></option>
        <option value="camping.png"><?php _e('Camping','OSM-plugin') ?></option>
        <option value="geocache.png"><?php _e('Geocache','OSM-plugin') ?></option>
        <option value="styria_linux.png"><?php _e('Styria Tux','OSM-plugin') ?></option>
    </select>
    <br>
    <b>2. <?php _e('Click into the map for geotag!','OSM-plugin') ?></b>:
<?php echo Osm::sc_showMap(array('msg_box'=>'metabox_geotag_gen','lat'=>'50','long'=>'18.5','zoom'=>'3', 'type'=>'mapnik_ssl', 'width'=>'100%','height'=>'300', 'map_border'=>'thin solid grey', 'theme'=>'dark', 'control'=>'mouseposition')); ?>
<!--  <br><b><font color="#FF0000"> -->
  <?php 
/*
    $url = 'http://wordpress.org/support/view/plugin-reviews/osm'; 
        $link = sprintf( __( 'There are neither a donation button nor a pay version. If you like OSM, support it with YOUR RATE <a href="%s" target="_blank">here</a> !', 'OSM-plugin' ), esc_url( $url ) );
      echo $link;
*/    ?>
<!--  </font></b> 
    <br> -->
    <?php /* _e('This red message will disappear again with OSM Plugin V2.8!','OSM-plugin') */ ?>
    <br>

  <div id="Geotag_Div"><br></div><br>
  <a class="button" onClick="osm_saveGeotag();"> <?php _e('Save','OSM-plugin')?> </a> 
  <br>
  <br>
  <?php
}


function osm_map_create_shortcode_function( $post ) {
?>
    <p>
    OSM shortcode options: <br>
    <b>1. <?php _e('Add markers','OSM-plugin') ?></b>: 
    <select name="osm_import">
        <option value="none"><?php _e('none','OSM-plugin') ?></option>
        <option value="single"><?php _e('single marker','OSM-plugin') ?></option>
        <option value="osm_l"><?php _e('all geotagged posts','OSM-plugin') ?></option>
        <option value="exif_m"><?php _e('photos (EXIF) in post/page','OSM-plugin') ?></option>
    </select>
    <br>
    <b>2. <?php _e('marker icon','OSM-plugin') ?></b>:
    <select name="osm_marker">
        <option value="none"><?php _e('none','OSM-plugin') ?></option>
        <option value="wpttemp-green.png"><?php _e('Waypoint','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="wpttemp-red.png"><?php _e('Waypoint','OSM-plugin');echo ' ';_e('red','OSM-plugin') ?></option>
        <option value="wpttemp-yellow.png"><?php _e('Waypoint','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="marker_blue.png"><?php _e('Marker','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_black_pinother_01.png"><?php _e('Pin #1','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_pin-export_01.png"><?php _e('Pin #2','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_red_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('red','OSM-plugin') ?></option>
        <option value="mic_green_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_blue_pinother_02.png"><?php _e('Pin #3','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>       
        <option value="mic_photo_icon.png"><?php _e('Camera','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option> 
        <option value="mic_yel_restaurant_chinese_01.png"><?php _e('Chin. restaurant','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="mic_yel_icecream_01.png"><?php _e('Icecream','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="mic_yel_campingtents_01.png"><?php _e('Campingtents','OSM-plugin');echo ' ';_e('yellow','OSM-plugin') ?></option>
        <option value="mic_green_campingcar_01.png"><?php _e('Campingcar','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_brown_pickup_camper_01.png"><?php _e('Pickup camper','OSM-plugin');echo ' ';_e('brown','OSM-plugin') ?></option>
        <option value="mic_toilets_disability_01.png"><?php _e('Toilets disability','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_shark_icon.png"><?php _e('Shark','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_red_pizzaria_01.png"><?php _e('Pizzaria','OSM-plugin');echo ' ';_e('red','OSM-plugin') ?></option>
        <option value="mic_parasailing_01.png"><?php _e('Parasailing','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_green_horseriding_01.png"><?php _e('Horseriding','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_cycling_icon.png"><?php _e('Cycling','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_coldfoodcheckpoint_01.png"><?php _e('Coldfookcheckpoint','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_blue_tweet_01.png"><?php _e('Tweet','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_blue_information_01.png"><?php _e('Information','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_blue_horseriding_01.png"><?php _e('Horserinding','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_black_train_01.png"><?php _e('Train','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_steamtrain_01.png"><?php _e('Steamtrain','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_powerplant_01.png"><?php _e('Powerplant','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_parking_bicycle-2_01.png"><?php _e('Bicycle Parking','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_cctv_01.png"><?php _e('cctv','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_blue_toilets_01.png"><?php _e('Toilets','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_blue_scubadiving_01.png"><?php _e('Scubadiving','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_orange_motorbike_01.png"><?php _e('Motorbike','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_orange_sailing_1.png"><?php _e('Sailing','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_orange_fishing_01.png"><?php _e('Fishing','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_blue_mobilephonetower_01.png"><?php _e('Mobilephonetower','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_orange_hiking_01.png"><?php _e('Hiking','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_blue_bridge_old_01.png"><?php _e('Bridge','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_black_memorial_01.png"><?php _e('Memorial','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_green_arbol_01.png"><?php _e('Tree','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_black_finish_01.png"><?php _e('Finish 01','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_finish2_01.png"><?php _e('Finish 02','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_black_start-race-2_01.png"><?php _e('Start 01','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="mic_green_garden_01.png"><?php _e('Garden','OSM-plugin');echo ' ';_e('green','OSM-plugin') ?></option>
        <option value="mic_blue_drinkingwater_01.png"><?php _e('Drinkingwater','OSM-plugin');echo ' ';_e('blue','OSM-plugin') ?></option>
        <option value="mic_orange_archery_01.png"><?php _e('Archery','OSM-plugin');echo ' ';_e('orange','OSM-plugin') ?></option>
        <option value="mic_black_archery_01.png"><?php _e('Archery','OSM-plugin');echo ' ';_e('black','OSM-plugin') ?></option>
        <option value="car.png"><?php _e('Car','OSM-plugin') ?></option>
        <option value="bus.png"><?php _e('Bus','OSM-plugin') ?></option>
        <option value="bicycling.png"><?php _e('Bicycling','OSM-plugin') ?></option>
        <option value="airport.png"><?php _e('Airport','OSM-plugin') ?></option>
        <option value="motorbike.png"><?php _e('Motorbike','OSM-plugin') ?></option>
        <option value="hostel.png"><?php _e('Hostel','OSM-plugin') ?></option>
        <option value="guest_house.png"><?php _e('Guesthouse','OSM-plugin') ?></option>
        <option value="camping.png"><?php _e('Camping','OSM-plugin') ?></option>
        <option value="geocache.png"><?php _e('Geocache','OSM-plugin') ?></option>
        <option value="styria_linux.png"><?php _e('Styria Tux','OSM-plugin') ?></option>
    </select> ( <a href="http://wp-osm-plugin.hanblog.net/wp-osm-plugin-icons/" target="_blank"> icons</a> )<br>
    <b>3. <?php _e('map type','OSM-plugin') ?></b>:
    <select name="osm_map_type">
        <option value="Mapnik">OpenStreetMap</option>
        <option value="CycleMap">CycleMap</option>
        <option value="OpenSeaMap">OpenSeaMap</option>
        <option value="OpenWeatherMap">OpenWeatherMap</option>
        <option value="basemap_at">BaseMap</option>
        <option value="stamen_watercolor">Stamen Watercolor</option>
        <option value="stamen_toner">Stamen Toner</option>
    </select>
    <b>4. <?php _e('OSM control theme','OSM-plugin') ?></b>: 
    <select name="osm_theme">
        <option value="none"><?php _e('none','OSM-plugin') ?></option>
        <option value="blue"><?php _e('blue','OSM-plugin') ?></option>
        <option value="dark"><?php _e('dark','OSM-plugin') ?></option>
        <option value="orange"><?php _e('orange','OSM-plugin') ?></option>
    </select>
    <br>
    <b>5. 
    <?php $url = 'http://wp-osm-plugin.hanblog.net/'; 
          $link = sprintf( __( 'Adjust the map and click into the map to generate the shortcode. Find more features  <a href="%s" target="_blank">here</a> !', 'OSM-plugin' ), esc_url( $url ) );
      echo $link;
    ?>
    </b>
    </p>
<?php echo Osm::sc_showMap(array('msg_box'=>'metabox_sc_gen','lat'=>'50','long'=>'18.5','zoom'=>'3', 'type'=>'mapnik_ssl', 'width'=>'450','height'=>'300', 'map_border'=>'thin solid grey', 'theme'=>'dark', 'control'=>'mouseposition,scaleline')); ?>
<!--  <br><b><font color="#FF0000"> -->
  <?php 
/*
    $url = 'http://wordpress.org/support/view/plugin-reviews/osm'; 
        $link = sprintf( __( 'There are neither a donation button nor a pay version. If you like OSM, support it with YOUR RATE <a href="%s" target="_blank">here</a> !', 'OSM-plugin' ), esc_url( $url ) );
      echo $link;
*/    ?>
<!--  </font></b> 
    <br> -->
    <?php /* _e('This red message will disappear again with OSM Plugin V2.8!','OSM-plugin') */ ?>
    <br>
  <h3><span style="color:green"><?php _e('Copy the generated shortcode/customfield/argument: ','OSM-plugin') ?></span></h3>
  <div id="ShortCode_Div"><?php _e('If you click into the map this text is replaced','OSM-plugin') ?>
  </div>
  <br>
  <?php
}

