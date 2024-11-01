=== STB Network Ads ===
Contributors: stbnetwork
Tags: ads, stb.network, automatic ads, 
Requires at least: 4.0.1
Tested up to: 4.9.5
Requires PHP: 5.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a simple plugin to help publishers enrolled in STB.network to easily place ads inside their WordPress Based Websites.

== Description ==

We developed this plugin so our publishers can easily ad STB.Network ads on their wordpress based website.
We designed our ad network while focusing on publishers.
We do our best to reduce fraudulent clicks and we focused on creating a network based on results. So 

== Installation ==

1. Upload the plugin directory to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the `STB.Network` Menu  to configure the plugin
4. Make sure you include the CORRECT Rcd of your ad zone to be credited for any clicks or sales

== Frequently Asked Questions ==

= Where do I get the Rcd From =

In order to get an Rcd you must sign up as a publisher on https://stb.network and submit a website for approval.
Once your website is approved you simply need to create an ad zone there.

= What resolutions are allowed=

We currently allow 125 px wide and 200px wide banners.
You can place as much as 8 banners per row (bellow title, inside content and after content areas are made automatically available.
You can also use the shortcode generator to manually place the ads inside the content.

= My theme is incompatible with automated ad placement or gives errors. What should I do? =

We tested this plugin with a lot of themes but unfortunately we can't test its compatibility with all the custom free or premium themes out there.
This is why we added the shortcode functionality because a lot of themes offer the possibility to ad the shortcode to different regions in the page.

= Can I place multiple shortcodes on a page? =
Yes, You can 

= Can I add different resolutions/ad zones for diferent regions of the blog post? =

Yes you can. You simply need to activate "Different Rcd for Before Content Ads" and fill in your Rcd

= The shortcode generator is not working. What can I do? =
We discovered some incompatibility with the shortcode generator on some browsers.
Here is the shortcode explained:
'[stb-network-ads ad_rcd="OA==" ad_count="3" ad_width="200" ad_color="#FFFFFF"]'

ad_rcd is your unique RCD for the zone
ad_count is the number of ads to be displayed per row (min:1, max: 8)
ad_width is the width in pixels of the ads. Please use the same width as the zone. (allowed width: 125 or 200)
ad_color is the background color of the ads. Some people may need to make it stand out or to customize it to fit their design. When not specified it defaults to "transparent"

== Screenshots ==

1. This is where you need to put your Rcd
2. Customizing different regions in the blog post
3. Using the shortcode generator


== Changelog ==

= 1.0.2 =
* Fixed title not showing on some themes

= 1.0.1 =
* Added Banner Sizes to include Texts (better conversions)

= 1.0 =
* Initial Release

