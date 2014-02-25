/*
  OSM OpenLayers for OSM wordpress plugin
  plugin: http://wp-osm-plugin.HanBlog.net
  blog:   http://www.HanBlog.net
*/

// Display Disc / Circles
function osm_getFeatureDiscCenter(a_tileLayer, a_discLayer, a_lon, a_lat, a_radius, a_centeropac, a_centercol, a_strw, a_strcol, a_stropac, a_fillcol, a_fillopac) 
{
    var lonLat = new OpenLayers.LonLat(a_lon, a_lat).transform(a_tileLayer.displayProjection, a_tileLayer.projection);

    var discStyle    = { strokeColor: a_strcol,
                         strokeOpacity: a_stropac,
                         strokeWidth: a_strw,
                         fillColor: a_fillcol,
                         fillOpacity: a_fillopac
                       };
    var centerStyle  = { strokeColor: a_centercol,
                         strokeOpacity: a_centeropac,
                         strokeWidth: a_strw,
                         fillColor: a_centercol,
                         fillOpacity: a_centeropac
                       };

    var radius = a_radius / Math.cos(a_lat*(Math.PI/180));

    var disc = OpenLayers.Geometry.Polygon.createRegularPolygon(
                                             new OpenLayers.Geometry.Point(lonLat.lon, lonLat.lat),
                                             radius,
                                             200); // nombre de faces
                 
    var center = OpenLayers.Geometry.Polygon.createRegularPolygon(
                                             new OpenLayers.Geometry.Point(lonLat.lon, lonLat.lat),
                                             1,   // taille dans lunite de la carte
                                             5);  // nombre de faces
                 

    var featureDisc   = new OpenLayers.Feature.Vector(disc,null,discStyle);
    var featureCenter = new OpenLayers.Feature.Vector(center,null,centerStyle);
    a_discLayer.addFeatures([featureDisc,featureCenter]);
}

// Draw line
function osm_setLinePoints(a_tileLayer, a_lineLayer, a_strw, a_strcol, a_stropac, a_Points)
{
  var Points = new Array();

  for (var i = 0; i < a_Points.length; i++) {
   // var lonLat = new OpenLayers.LonLat(a_Points[i]["lon"], a_Points[i]["lat"]).transform(new OpenLayers.Projection("EPSG:4326"), a_tileLayer.getProjectionObject());
   var lonLat = new OpenLayers.LonLat(a_Points[i]["lon"], a_Points[i]["lat"]).transform(a_tileLayer.displayProjection, a_tileLayer.projection);
    Points[i] = new OpenLayers.Geometry.Point(lonLat.lon, lonLat.lat);
  }
  var line = new OpenLayers.Geometry.LineString(Points);
  var style = { 
    strokeColor: a_strcol, 
    strokeOpacity: a_stropac, 
    strokeWidth: a_strw 
   };

  var lineFeature = new OpenLayers.Feature.Vector(line, null, style);
  a_lineLayer.addFeatures([lineFeature]);
}


// Clickhandler / Shorcode generator

function osm_getRadioValue(a_Form){
  if (a_Form == "Markerform"){
    for (var i=0; i < document.Markerform.Art.length; i++){
      if (document.Markerform.Art[i].checked){
        var rad_val = document.Markerform.Art[i].value;
        return rad_val;
      }
    }
    return "undefined";
  }
  else if (a_Form == "GPXcolourform"){
    for (var i=0; i < document.GPXcolourform.Gpx_colour.length; i++){
      if (document.GPXcolourform.Gpx_colour[i].checked){
        var rad_val = document.GPXcolourform.Gpx_colour[i].value;
        return rad_val;
      }
    }
    return "undefined";
  }
  else if (a_Form == "Bordercolourform"){
    for (var i=0; i < document.Bordercolourform.Border_colour.length; i++){
      if (document.Bordercolourform.Border_colour[i].checked){
        var rad_val = document.Bordercolourform.Border_colour[i].value;
        return rad_val;
      }
    }
    return "undefined";
  }
  else if (a_Form == "Naviform"){
    for (var i=0; i < document.Naviform.Navi_Link.length; i++){
      if (document.Naviform.Navi_Link[i].checked){
        var rad_val = document.Naviform.Navi_Link[i].value;
        return rad_val;
      }
    }
    return "undefined";
  }
  else if (a_Form == "ControlStyleform"){
    for (var i=0; i < document.ControlStyleform.Cntrl_style.length; i++){
      if (document.ControlStyleform.Cntrl_style[i].checked){
        var rad_val = document.ControlStyleform.Cntrl_style[i].value;
        return rad_val;
      }
    }
    return "undefined";
  }
  return "not implemented";
}

function getTileURL(bounds) {
  var res = this.map.getResolution();
  var x = Math.round((bounds.left - this.maxExtent.left) / (res * this.tileSize.w));
  var y = Math.round((this.maxExtent.top - bounds.top) / (res * this.tileSize.h));
  var z = this.map.getZoom();
  var limit = Math.pow(2, z);
  if (y < 0 || y >= limit) {
    return null;
  } 
  else {
    x = ((x % limit) + limit) % limit;
    url = this.url;
    path= z + "/" + x + "/" + y + "." + this.type;
    if (url instanceof Array) {
      url = this.selectUrl(path, url);
    }
    return url+path;
  }
}

// http://trac.openlayers.org/changeset/9023
function osm_getTileURL(bounds) {
    var res = this.map.getResolution();
    var x = Math.round((bounds.left - this.maxExtent.left) / (res * this.tileSize.w));
    var y = Math.round((this.maxExtent.top - bounds.top) / (res * this.tileSize.h));
    var z = this.map.getZoom();
    var limit = Math.pow(2, z);

    if (y < 0 || y >= limit) {
        return OpenLayers.Util.getImagesLocation() + "404.png";
    } else {
        x = ((x % limit) + limit) % limit;
        return this.url + z + "/" + x + "/" + y + "." + this.type;
    }
}


