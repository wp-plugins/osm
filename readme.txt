=== OSM ===
Tags: map, OpenStreetMap, geo, KML, GPX, geotag, geolocation, geocache, geocaching, OSM, comment, travelogue, template tag, travelblog
Requires at least: 2.5.1
Tested up to: 3.0
Stable tag: 0.9.2

OpenStreetMap plugin to embed maps with personal markers and routes in your blog. In addition to it geo meta data are added to posts and pages.

== Description ==

OpenStreetMap plugin to visualize maps in various ways.

If you want to download the OSM-plugin you are right here!

If you want to get detailed information about the OSM-plugin visit these pages:

* OSM-plugin: [www.Fotomobil.at/wp-osm-plugin](http://www.Fotomobil.at/wp-osm-plugin/ "OSM-plugin")
* OSM-plugin Forum: [www.Fotomobil.at/wp-osm-plugin-forum](http://www.Fotomobil.at/wp-osm-plugin-forum/ "OSM-plugin forum")
* OSM-plugin Wiki: [wiki.OpenStreetMap.org](http://wiki.openstreetmap.org/wiki/Wp-osm-plugin "OSM-plugin Wiki")
* Author blog: [www.HanBlog.net](http://www.HanBlog.net/ "HanBlog.net")

Features of the OSM-plugin:

* embeds OpenStreetMap maps to your posts/pages
* embeds external maps to your posts/pages
* visualizes several tracks / routs in different colours (gpx and kml)
* visualizes geocaches with [gcstats plugin](http://michael.josi.de/projects/gcstats/ "Link to gcstats plugin")
* visualizes popup-html-markers (list in txt-file or single in the shortcode)
* visualize all geotagged posts of your blog in one map with/without a link to the post
* use custom field to add geolocation to your blog
* geo data are written to html-meta tags of your blog
* visit [THE PLUGIN PAGE](http://www.Fotomobil.at/wp-osm-plugin/ "Link to osm plugin") to see samples and read news!
* visit [THE WIKI PAGE](http://wiki.openstreetmap.org/wiki/Wp-osm-plugin "Link to Wiki") to get details about the tags!

Note: Feel free to delete the files screenshot-1.png to screenshot-4.png in the OSM-folder to save webspace.

== Installation ==

1. Upload OSM folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. No configuration is needed to add a map to your blog

IMPORTANT: 
Personal data (eg. gpx files) must not be stored in the plugins/osm folder but in the upload folder!

== Frequently Asked Questions ==

= Do I need any key or any registration to show OSM maps in my blog =

No, OSM is under [cc-license](http://wiki.openstreetmap.org/wiki/OpenStreetMap_License) and you do not need any API-key!

= I have limited webspace, why does this plugin use more than 500kB =

Feel free to delete the files screenshot-1.png to screenshot-4.png.

= Can I use OSM-plugin at Wordpress MU? =

Yes.

= Why is there no map in the "Edit post" page ? =

Since most people do not add a map in every post I decided to put it in the settings page. If 
there are some requests to put it in the Edit post I will make it configureable.

= How can I use this plugin for my geocache posts ? =

You have to install [gcstats plugin](http://michael.josi.de/projects/gcstats/ "Link to gcstats plugin") to use geocaching feature of OSM-plugin.

== Screenshots ==
1. Shortcode generator in the plugin settings page
2. Showing the geo data of all posts/pages within one map
3. Showing a track added with a GPX file and popupmarker with photo
4. Use template-tags to show a map if your post/page has got a geolocation

== Changelog ==
= 0.9.2 =
* Feature: added osm_l tag for map with linked marker to tagged posts.
* Bugfix: correct offset for pin-icons and non-osm-icons
* Bugfix: style correction for some WP-themes
= 0.9.1 =
* Feature: popup marker with link for the map displaying all posts/pages of the blog
* Bugfix: licenselink is not displayed if an external map is loaded
* Bugfix: some WP-thems showed grids/lines in the map
* Bugfix: bug if several maps were shown at the same time
= 0.9 =
* Feature: display several gpx files with diff. colours in one map
* Feature: template tags to be used in your theme to show maps at geotagged posts
* Feature: extend zoom level for mapnik to 18
= 0.8.7 =
* WP 2.9 Bugfix: HTML-PopUp-Marker without Customfield-Text produced 'Array'
* Bugfix: size of bicycle icon
= 0.8.6 =
* Feature: performance improvement: needed libraries are loaded only if maps are displayed - improves the whole blog!
* Feature: external maps can be included instead of standard OSM-maps
* Feature: controls (scale, scaleline, mouseposition) can be included by tag
= 0.8.5 =
* Feature HTML marker for PopUps
= 0.8.4 =
* Bugfix: plugin folder changed
* Bugfix: some internal stuff
= 0.8.3 =
* Bugfix: correct offset for indiv. marker
= 0.8.1  = 
* check whether gcstats is activated or not
= 0.8.0  = 
* separate file for option and import; gcstats support; add marker in option page
= 0.7.0  = 
* shortcode generator in option page added
= 0.6.0  = 
* options got prefix "osm_", therefore settings have to be made again at upgrade
= 0.5.0  = 
* added type at shortcode (Mapnik, Osmarender, CycleMap, All) ; overviewmap in shortcode
= 0.4.0  = 
* added KML support and colour interface for tracks
= 0.3.0  = 
* added "marker_all_posts" at shortcode to set a marker for all posts
= 0.2.0  = 
* loading GPX files with shortcode