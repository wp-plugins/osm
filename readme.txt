=== OSM ===
Contributors: Michael Kang
Tags: map, OpenStreetMap, Google Maps, geo, KML, GPX, geotag, geolocation, geocache, geocaching, OSM, travelogue, template tag, travelblog
Requires at least: 2.5.1
Tested up to: 3.0.1
Stable tag: 0.9.3

OpenStreetMap plugin to embed maps (OpenStreetMap and Google Maps) with personal markers and routes in your blog. In addition to it geo meta data are added to posts and pages.

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

Licenses of the maps:

* OpenStreetMap: [OpenStreetMap License] (http://wiki.openstreetmap.org/wiki/OpenStreetMap_License "OSM License")
* Google Maps: [Google Maps Terms of Service] (http://code.google.com/intl/de-DE/apis/maps/terms.html "Google Maps License")

== Installation ==

1. Upload OSM folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create your shortcode in 'Settings' => 'OSM' by simply clicking on the map.

IMPORTANT: 
Personal data (eg. gpx files) must not be stored in the plugins/osm folder but in the upload folder!

NOTE: 
Feel free to delete the files screenshot-1.png to screenshot-4.png in the OSM-folder to save webspace.

== Frequently Asked Questions ==

= Do I need any key or any registration to show maps in my blog =

No!

= I have limited webspace, why does this plugin use more than 500kB =

Feel free to delete the files screenshot-1.png to screenshot-4.png.

= Can I use OSM-plugin at Wordpress MU? =

Yes.

= Why is there no map in the "Edit post" page ? =

Since most people do not add a map in every post I decided to put it in the settings page. If 
there are some requests to put it in the Edit post I will make it configureable.

= How can I use this plugin for my geocache posts ? =

You have to install [gcstats plugin](http://wordpress.org/extend/plugins/gcstats/ "Link to gcstats plugin") to use geocaching feature of OSM-plugin.

== Screenshots ==
1. Shortcode generator in the plugin settings page
2. Showing the geo data of all posts/pages within one map
3. Showing a track added with a GPX file and popupmarker with photo
4. Use template-tags to show a map if your post/page has got a geolocation

== Changelog ==
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
