=== OSM ===
Tags: map, OpenStreetMap, geo, KML, GPX, geocache, geocaching, OSM
Requires at least: 2.5.1
Tested up to: 2.7.1
Stable tag: 0.8.4

OpenStreetMap plugin to embed maps with personal markers and routes in your blog. In addition to it geo meta data are added to posts and pages.

== Description ==

OSM is a plugin the focuses on OpenstreetMap and geo data in your blog.

* NEW! Add your marker in the shortcode generator
* NEW! Import your geocaches from [gcstats plugin](http://michael.josi.de/projects/gcstats/ "Link to gcstats plugin") to the map
* Shortcode generator in plugin settings
* using shortcode to add OSM maps in your blog
* visualize a list of markers in the map 
* visualize your route in the map (KML and GPX format)
* visualize geo data of all posts in one map
* use custom field to add geodata to your blog
* geo data are written to html-meta tags of your blog

== Installation ==

1. Upload osm folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. No configuration is needed to add a map to your blog

note: plugindirectory has to be "osm" (lower-case)

== Frequently Asked Questions ==

= Do I need any key or registration to show OSM maps in my blog =

No, OSM is under cc-license, you do not need any API-key!

= Can I use several maps in the same poost/page =

Just use as many shortcodes as you want to, even within one post.

= There are already geo data in customfields in my blog, can I reuse them? =

Yes, the format has to be Lat,Long. The name of the customfield has to be configured.

= I tagged my posts/pages with another plugin, can I use this tag wit OSM plugin ? =

Yes, up to now WPGMG (google-maps-geocoder) plugin is supported, others will follow on request.

= Why is there no map in the "Edit post" page ? =

Since most people do not add a map in every post I decided to put it in the settings page. If 
there are some requests to put it in the Edit post I will make it configureable.

= How can I use this plugin for my geocache posts ? =

You have to install [gcstats plugin](http://michael.josi.de/projects/gcstats/ "Link to gcstats plugin") to use geocaching feature of OSM-plugin.

== Screenshots ==
1. Shortcode generator in the plugin settings page
2. Showing the geo data of all posts/pages within one map
3. Showing a track added with a GPX file


