=== OSM ===
Contributors: MiKa
Tags: map, OpenStreetMap, Google Maps, googlemaps, geo, KML, GPX, geotag, geolocation, geocache, geocaching, OSM, travelogue, template tag, travelblog, OpenLayers, Open Layers, Open Street Map, CloudMade, YourNavigation, OpenRouteService, marker, POI, geocode, geotagging, google earth, Leaflet, location, Route, Tracks, WMS
Requires at least: 2.5.1
Tested up to: 3.3.1
Stable tag: 1.1.1

OpenStreetMap plugin to embed maps. No API key! No Google API!
Include your OSM map with GPX tracks, POIs, markers and geotagged posts. 

== Description ==
If you want to download the OSM-plugin you are right here!

If you want to get detailed information about the OSM-plugin visit these pages:

* OSM-plugin: [www.Fotomobil.at/wp-osm-plugin](http://www.Fotomobil.at/wp-osm-plugin/ "OSM-plugin")
* OSM-plugin Forum: [www.Fotomobil.at/wp-osm-plugin-forum](http://www.Fotomobil.at/wp-osm-plugin-forum/ "OSM-plugin forum")
* OSM-plugin Wiki: [wiki.OpenStreetMap.org](http://wiki.openstreetmap.org/wiki/Wp-osm-plugin "OSM-plugin Wiki")
* Author blog: [www.HanBlog.net](http://www.HanBlog.net/ "HanBlog.net")

Features of the OSM-plugin:

* embeds OpenStreetMap and Google Maps maps to your posts/pages
* embeds external maps to your posts/pages
* visualizes several tracks / routs in different colours (gpx and kml)
* visualizes popup-html-markers (list in txt-file or single in the shortcode)
* visualize all geotagged posts of your blog in one map with/without a link to the post
* use custom field to add geolocation to your blog
* geo data are written to html-meta tags of your blog
* uses OpenLayers Library
* extends Mediathek rights to upload GPX files

Languages:

* English
* Deutsch

Licenses of the maps:

* OpenStreetMap: [OpenStreetMap License](http://wiki.openstreetmap.org/wiki/OpenStreetMap_License) 
* Google Maps: [Google Maps Terms of Service](http://code.google.com/intl/de-DE/apis/maps/terms.html)

== Installation ==

1. Upload OSM folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create your shortcode in 'Settings' => 'OSM' by simply clicking on the map.

IMPORTANT: 
Personal data (eg. gpx files) must not be stored in the plugins/osm folder but in the upload folder!

== Frequently Asked Questions ==

= Do I need any key or any registration to show maps in my blog =

No!

= Can I use OSM-plugin at Wordpress MU? =

Yes.

= Why is there no map in the "Edit post" page ? =

Since most people do not add a map in every post I decided to put it in the settings page. If 
there are some requests to put it in the Edit post I will make it configureable.

= I do not see my gpx file / marker file in the map ? =

The file has to be located at the same adress as your blog.
There must be not format tag (like href ...) in the shortcode.


== Changelog ==

= 1.1.1 =
* NEW: extended rights to upload GPX files in Mediathek
* NEW: CSS file 
* FIX: WP-Theme zBench fix
* FIX: HTML tag if post is geotagged
* FIX: z-index at shortcode generator
= 1.1 =
* NEW: add the text for popup marker directly in the shortcode generator (settings => OSM)
* NEW: add a link to a routing service (settings => OSM)
* NEW: set the z-index if needed (eg. for Next Gen Gallery)
* NEW: choose a theme for the control icons
* NEW: add the mouse position directly in the shortcode generator (settins => OSM)
* NEW: plugin size less than 100kB
= 1.0 =
* NEW: Internationalization (languages: EN, DE)
* FIX: HTML code for geotagged posts
* FIX: WP-Theme Twenty Eleven
= 0.9.6 =
* NEW: shortcode generator at Settings=>OSM extented
* NEW: marker filename is used for the map picker
* FIX: Warning: split() expects parameter 2 .. on line 211
* FIX: car icon size corrected
= 0.9.5 =
* NEW: mark all geotagged posts can be filtered by category
* NEW: map_border tag added to set border around the OSM map
* NEW: marker_focus tag added to adjust the marker
* NEW: gpx filename is used for the map picker
* FIX: style correction for some WP-themes (eg Suffusion)
= 0.9.4 =
* NEW: LIBS of diff. map types are loaded only when needed
* NEW: Shortcodegenerator at backend extented to get the chosen maptype
* FIX: Customfield marker error at IE
= 0.9.3 =
* NEW: added Google Maps: Sattelite, Street, Hybrid, Physical
= 0.9.2 =
* NEW: added osm_l tag for map with linked marker to tagged posts.
* FIX: correct offset for pin-icons and non-osm-icons
* FIX: style correction for some WP-themes
= 0.9.1 =
* NEW: popup marker with link for the map displaying all posts/pages of the blog
* FIX: licenselink is not displayed if an external map is loaded
* FIX: some WP-thems showed grids/lines in the map
* FIX: bug if several maps were shown at the same time
= 0.9 =
* NEW: display several gpx files with diff. colours in one map
* NEW: template tags to be used in your theme to show maps at geotagged posts
* NEW: extend zoom level for mapnik to 18
= 0.8.7 =
* FIX: HTML-PopUp-Marker without Customfield-Text produced 'Array' (WP 2.9)
* FIX: size of bicycle icon
= 0.8.6 =
* NEW: performance improvement: needed libraries are loaded only if maps are displayed - improves the whole blog!
* NEW: external maps can be included instead of standard OSM-maps
* NEW: controls (scale, scaleline, mouseposition) can be included by tag
= 0.8.5 =
* NEW: HTML marker for PopUps
= 0.8.4 =
* FIX: plugin folder changed
* FIX: some internal stuff
= 0.8.3 =
* FIX: correct offset for indiv. marker
= 0.8.1  = 
* FIX: check whether gcstats is activated or not
= 0.8.0  = 
* NEW: separate file for option and import; gcstats support; add marker in option page
= 0.7.0  = 
* NEW: shortcode generator in option page added
= 0.6.0  = 
* NEW: options got prefix "osm_", therefore settings have to be made again at upgrade
= 0.5.0  = 
* NEW:added type at shortcode (Mapnik, Osmarender, CycleMap, All) ; overviewmap in shortcode
= 0.4.0  = 
* NEW: added KML support and colour interface for tracks
= 0.3.0  = 
* NEW: added "marker_all_posts" at shortcode to set a marker for all posts
= 0.2.0  = 
* NEW: loading GPX files with shortcode
