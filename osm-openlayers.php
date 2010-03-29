<?php

class Osm_OpenLayers
{
  //support different types of GML Layers
  function addGmlLayer($a_LayerName, $a_FileName, $a_Colour, $a_Type)
  {
    Osm::traceText(DEBUG_INFO, "addGmlLayer(".$a_LayerName.",".$a_FileName.",".$a_Colour.",".$a_Type.")");
    $Layer .= '  var lgml = new OpenLayers.Layer.GML("'.$a_LayerName.'", "'.$a_FileName.'", {';
    $Layer .= '    format: OpenLayers.Format.'.$a_Type.',';
    $Layer .= '    style: {strokeColor: "'.$a_Colour.'", strokeWidth: 5, strokeOpacity: 0.5},';
    $Layer .= '    projection: new OpenLayers.Projection("EPSG:4326")';
    $Layer .= '  });';
    $Layer .= '  map.addLayer(lgml);';
    return $Layer;
  }
  
  // support different types of GML Layers
  function addOsmLayer($a_LayerName, $a_Type, $a_OverviewMapZoom, $a_MapControl, $a_ExtType, $a_ExtName, $a_ExtAddress, $a_ExtInit)
  {
    Osm::traceText(DEBUG_INFO, "addOsmLayer(".$a_LayerName.",".$a_Type.",".$a_OverviewMapZoom.")");
    $Layer .= ' map = new OpenLayers.Map ("'.$a_LayerName.'", {';
    $Layer .= '            controls:[';
    if ($a_MapControl[0] != 'off'){
      $Layer .= '              new OpenLayers.Control.Navigation(),';
      $Layer .= '              new OpenLayers.Control.PanZoom(),';
    }
    $Layer .= '              new OpenLayers.Control.Attribution()';
    $Layer .= '              ],';
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
      else if (($a_Type == 'Ext') || ($a_Type == 'ext')) {
        $Layer .= 'var lmap = new OpenLayers.Layer.'.$a_ExtType.'("'.$a_ExtName.'","'.$a_ExtAddress.'",{'.$a_ExtInit.'});';
      }
  
      $Layer .= 'map.addLayer(lmap);';
    }
	
	if ($a_MapControl[0] != 'No'){
	  foreach ( $a_MapControl as $MapControl ){
	  	$MapControl = strtolower($MapControl);
	    if ( $MapControl == 'scaleline'){
	      $Layer .= 'map.addControl(new OpenLayers.Control.ScaleLine());';
	    }
	    elseif ($MapControl == 'scale'){
		  $Layer .= 'map.addControl(new OpenLayers.Control.Scale());';
		}
		elseif ($MapControl == 'mouseposition'){
		  $Layer .= 'map.addControl(new OpenLayers.Control.MousePosition({displayProjection: new OpenLayers.Projection("EPSG:4326")}));';
		}
		// add more if needed!
	  }
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
	
	// http://trac.openlayers.org/changeset/9023
    $Layer .= '    function osm_getTileURL(bounds) {';
    $Layer .= '        var res = this.map.getResolution();';
    $Layer .= '        var x = Math.round((bounds.left - this.maxExtent.left) / (res * this.tileSize.w));';
    $Layer .= '        var y = Math.round((this.maxExtent.top - bounds.top) / (res * this.tileSize.h));';
    $Layer .= '        var z = this.map.getZoom();';
    $Layer .= '        var limit = Math.pow(2, z);';

    $Layer .= '        if (y < 0 || y >= limit) {';
    $Layer .= '            return OpenLayers.Util.getImagesLocation() + "404.png";';
    $Layer .= '        } else {';
    $Layer .= '            x = ((x % limit) + limit) % limit;';
    $Layer .= '            return this.url + z + "/" + x + "/" + y + "." + this.type;';
    $Layer .= '        }';
    $Layer .= '    }';
	
    return $Layer;
  }

  function AddClickHandler($a_msgBox)
  {
    Osm::traceText(DEBUG_INFO, "AddClickHandler(".$a_msgBox.")");
    $a_msgBox = strtolower($a_msgBox);
    $Layer .= 'OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {';               
    $Layer .= ' 	                defaultHandlerOptions: {';
    $Layer .= ' 	                    "single": true,';
    $Layer .= ' 	                    "double": false,';
    $Layer .= ' 	                    "pixelTolerance": 0,';
    $Layer .= ' 	                    "stopSingle": false,';
    $Layer .= ' 	                    "stopDouble": false';
    $Layer .= ' 	                },';

    $Layer .= ' 	                initialize: function(options) {';
    $Layer .= ' 	                    this.handlerOptions = OpenLayers.Util.extend(';
    $Layer .= ' 	                        {}, this.defaultHandlerOptions';
    $Layer .= ' 	                    );';
    $Layer .= ' 	                    OpenLayers.Control.prototype.initialize.apply(';
    $Layer .= ' 	                        this, arguments';
    $Layer .= ' 	                    );';
    $Layer .= ' 	                    this.handler = new OpenLayers.Handler.Click(';
    $Layer .= ' 	                        this, {';
    $Layer .= ' 	                            "click": this.trigger';
    $Layer .= ' 	                        }, this.handlerOptions';
    $Layer .= ' 	                    );';
    $Layer .= ' 	                },';

    $Layer .= ' 	                trigger: function(e) {';
    $Layer .= ' 	                  var Centerlonlat = map.getCenter(e.xy).clone();';
    $Layer .= ' 	                  var Clicklonlat = map.getLonLatFromViewPortPx(e.xy);';
    $Layer .= ' 	                  var zoom = map.getZoom(e.xy);';
    $Layer .= '                     Centerlonlat.transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"));';
    $Layer .= '                     Clicklonlat.transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"));';
    $Layer .= '                     Centerlonlat.lat = Math.round( Centerlonlat.lat * 1000. ) / 1000.;'; // get the center of the map
    $Layer .= '                     Centerlonlat.lon = Math.round( Centerlonlat.lon * 1000. ) / 1000.;';
    $Layer .= '                     Clicklonlat.lat = Math.round( Clicklonlat.lat * 1000. ) / 1000.;';   // get the position for the marker
    $Layer .= '                     Clicklonlat.lon = Math.round( Clicklonlat.lon * 1000. ) / 1000.;';    
    if ($a_msgBox == 'sc_gen'){  
     $Layer .= ' 	                  alert("Insert the Osm shortcode to your post:\n \n  [osm_map lat=\"" + Centerlonlat.lat + "\" long=\"" + Centerlonlat.lon + "\" zoom=\"" + zoom + "\" width=\"600\" height=\"450\" marker=\""+Clicklonlat.lat+","+Clicklonlat.lon+
"\" marker_name=\"marker_blue.png\"]");';
    }
    else if( $a_msgBox == 'lat_long'){
     $Layer .= ' 	                  alert("Lat= " + Clicklonlat.lat + " Long= " + Clicklonlat.lon);';   
    }
    $Layer .= ' 	                }';
    $Layer .= ' 	';
    $Layer .= ' 	            });';
    $Layer .= 'var click = new OpenLayers.Control.Click();';
    $Layer .= 'map.addControl(click);';
    $Layer .= 'click.activate();';
    return $Layer;
  }

  function addMarkerListLayer($a_LayerName, $a_marker_name, $a_marker_width, $a_marker_height,$a_MarkerArray,$a_OffsetW,$a_OffsetH, $a_PopUp)
  {
    Osm::traceText(DEBUG_INFO, "addMarkerListLayer(".$a_LayerName.",".$a_marker_name.",".$a_marker_width.",".$a_marker_height.",".$a_MarkerArray.",".$a_OffsetW.",".$a_OffsetH.",".$a_PopUp.")");

    $a_OffsetW = round(-$a_marker_width/2);
    $a_OffsetH = round(-$a_marker_height/2);

    $Layer .= 'var markers = new OpenLayers.Layer.Markers( "'.$a_LayerName.'" );';
    $Layer .= 'map.addLayer(markers);';
    
    $Layer .= 'var data = {};';
    $Layer .= 'data.icon = new OpenLayers.Icon("'.OSM_PLUGIN_ICONS_URL.$a_marker_name.'",';
    $Layer .= '     new OpenLayers.Size('.$a_marker_width.','.$a_marker_height.'),';
    $Layer .= '     new OpenLayers.Pixel('.$a_OffsetW.', '.$a_OffsetH.'));';   
    
    $NumOfMarker = count($a_MarkerArray);
    for ($row = 0; $row < $NumOfMarker; $row++){
      $Layer .= 'var ll = new OpenLayers.LonLat('.$a_MarkerArray[$row][lon].','.$a_MarkerArray[$row][lat].').transform(map.displayProjection,  map.projection);';
      $Layer .= '     var feature = new OpenLayers.Feature(markers, ll, data);';
         
      $Layer .= 'feature.closeBox = true;';
      $Layer .= 'feature.popupClass = OpenLayers.Class(OpenLayers.Popup.FramedCloud, {minSize: new OpenLayers.Size(100,150) } );';
      
      // add the the backslashes
      $OSM_HTML_TEXT = addslashes($a_MarkerArray[$row][text]);
      
      $Layer .= 'feature.data.popupContentHTML = "'.$OSM_HTML_TEXT.'";';
      $Layer .= 'feature.data.overflow = "hidden";';

      $Layer .= 'var marker = new OpenLayers.Marker(ll,data.icon.clone());';
      $Layer .= 'marker.feature = feature;';
   
      $Layer .= 'var markerClick = function(evt) {';
      $Layer .= '  if (this.popup == null) {';
      $Layer .= '    this.popup = this.createPopup(this.closeBox);';
      $Layer .= '    map.addPopup(this.popup);';
      $Layer .= '    this.popup.show();';
      $Layer .= '  } ';
      $Layer .= '  else {';
      $Layer .= '    this.popup.toggle();';
      $Layer .= '  }';
      $Layer .= '  OpenLayers.Event.stop(evt);';
      $Layer .= '};';
      
      $Layer .= 'marker.events.register("mousedown", feature, markerClick);';
      $Layer .= 'markers.addMarker(marker);';
      if ($a_PopUp == 'true'){
        $Layer .= 'map.addPopup(feature.createPopup(feature.closeBox));';   // maybe there is a better way to do 
        if ($NumOfMarker > 1){
          $Layer .= 'feature.popup.toggle();';                                // it than create and toggle!
        }
      }
    }
    return $Layer;
  }
    
  function addTextLayer($a_marker_file)
  {
    Osm::traceText(DEBUG_INFO, "addTextLayer(".$a_marker_file.")");   
    $Layer .= 'var pois = new OpenLayers.Layer.Text( "Markers",';
    $Layer .= '        { location:"'.$a_marker_file.'",';
    $Layer .= '          projection: map.displayProjection';
    $Layer .= '        });';
    $Layer .= 'map.addLayer(pois);';
    return $Layer; 
  }  

  function setMapCenterAndZoom($a_lat, $a_lon, $a_zoom)
  {
    Osm::traceText(DEBUG_INFO, "setMapCenterAndZoom(".$a_lat.",".$a_lon.",".$a_zoom.")");
    $Layer .= 'var lonLat = new OpenLayers.LonLat('.$a_lon.','.$a_lat.').transform(map.displayProjection,  map.projection);';
    $Layer .= 'map.setCenter (lonLat,'.$a_zoom.');'; // Zoomstufe einstellen
    return $Layer;
  }  
      
  // if you miss a MapType, just add it
  function checkMapType($a_type){
    if ($a_type != 'Mapnik' && $a_type != 'Osmarender' && $a_type != 'CycleMap' && $a_type != 'All' && $a_type != 'ext' && $a_type != 'Ext'){
      return "All";
    }
    return $a_type;
  }

  // check the num of zoomlevels
  function checkOverviewMapZoomlevels($a_Zoomlevels){
    if ( $a_Zoomlevels > 17){
      Osm::traceText(DEBUG_ERROR, "Zoomlevel out of range!");
      return 0;
    }
    return $a_Zoomlevels;
  }     
  
  function checkControlType($a_MapControl){
    foreach ( $a_MapControl as $MapControl ){
	  Osm::traceText(DEBUG_INFO, "Checking the Map Control");
	  $MapControl = strtolower($MapControl);
	  if (( $MapControl != 'scaleline') && ($MapControl != 'scale') && ($MapControl != 'no') && ($MapControl != 'mouseposition')&& ($MapControl != 'off')) {
	    Osm::traceText(DEBUG_ERROR, "e_invalid_control");
	    $a_MapControl[0]='No';
	  }
    }
  return $a_MapControl;
  }
  
}
?>
