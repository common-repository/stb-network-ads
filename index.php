<?php
/**
 * @package STB Network Ads
 * @version 1.0.2
 */
/*
Plugin Name: STB Network Ads
Plugin URI: https://stb.network/
Description: A Plugin that helps you to integrate ads from stb.network into your site with ease.
Author: STB Network
Version: 1.0.2
Author URI: https://stb.network/
*/
global $stb_network_ads;

if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/redux-framework/framework.php'))
	{
	require_once (dirname(__FILE__) . '/redux-framework/framework.php');

	}

if (!isset($redux_demo) && file_exists(dirname(__FILE__) . '/options-init.php'))
	{
	require_once (dirname(__FILE__) . '/options-init.php');

	}

function stb_network_ads_shortcode($atts)
	{
	extract(shortcode_atts(array(
	    'ad_rcd' => 'OA==',
		'ad_count' => '3',
		'ad_width' => '200',
		'ad_color' => 'transparent'
	) , $atts));
	if ($ad_width == '200')
		{
		$ad_height = '260';
		}
	elseif ($ad_width == '125')
		{
		$ad_height = '190';
		}
	  else
		{
		}

	global $stb_network_ads;

	// Check for size

	if ($ad_width !== '200' && $ad_width !== '125')
		{
		return '<p style="color: #ff0000;">Bad Ad Width.<p>Please use the <a href="/wp-admin/admin.php?page=stb-network-ads&tab=6">generator</a> to see allowed options</p>' . $ad_width;
		}

	// Check if count is integer and between given values

	elseif ($ad_count !== '1' && $ad_count !== '2' && $ad_count !== '3' && $ad_count !== '4' && $ad_count !== '5' && $ad_count !== '6' && $ad_count !== '7' && $ad_count !== '8')
		{
		return '<p style="color: #ff0000;">Bad Ad Width.<p>Please use the <a href="/wp-admin/admin.php?page=stb-network-ads&tab=6">generator</a> to see allowed options</p>' . $ad_width;
		}
	  else
		{
		return '<p>' . str_repeat('<iframe src="https://stb.network/codes/banner?rcd=' . $ad_rcd . '"scrolling="no" style="background: ' . $ad_color . ';width:' . $ad_width . 'px; height:' . $ad_height . 'px; border:0px; padding:0;overflow:hidden;margin-right: 10px;" allowtransparency="true"></iframe>', $ad_count) . '</p>';
		}
	}

add_shortcode('stb-network-ads', 'stb_network_ads_shortcode');

// Insert Ads Before Content

function stb_before_content($title)
	{
	global $stb_network_ads;

	// Set Ad Width and Height

	if ($stb_network_ads['contextual-top-size'] == "1")
		{
		$top_ad_width = '125';
		$top_ad_height = '190';
		}
	elseif ($stb_network_ads['contextual-top-size'] == "2")
		{
		$top_ad_width = '200';
		$top_ad_height = '260';
		}
	  else
		{
		}
    // Set Before Content RCD
    if ($stb_network_ads['contextual-top-rcd-enable'] == "1" && !empty($stb_network_ads['contextual-top-rcd'])) 
		{
		$top_ad_rcd = $stb_network_ads['contextual-top-rcd'];
		}
	else
		{
		$top_ad_rcd = $stb_network_ads['ad-rcd'];
		}
	//Insert Ads
	if ($stb_network_ads['contextual-enable'] == '1' && $stb_network_ads['contextual-top-enable'] == '1')
		{
		if (is_single())
			{
			$stb_title = '<p>' . str_repeat('<iframe src="https://stb.network/codes/banner?rcd=' . $top_ad_rcd . '"scrolling="no" style="background: ' . $stb_network_ads['contextual-top-color'] . '; width:' . $top_ad_width . 'px; height:' . $top_ad_height . 'px; border:0px; padding:0;overflow:hidden;margin-right: 10px;" allowtransparency="true"></iframe>', $stb_network_ads['contextual-top-count']) . '</p>';
			$title.= $stb_title;
			return $title;
			}
		  else
			{
			return $title;
			}
		}
	}
if ($stb_network_ads['contextual-enable'] == '1' && $stb_network_ads['contextual-top-enable'] == '1') {
	add_filter('the_title', 'stb_before_content');
}
else
{
}


// Insert Ads Inside Content

add_filter('the_content', 'stb_inside_content');

function stb_inside_content($content)
	{
	global $stb_network_ads;

	// Set Ad Width and Height

	if ($stb_network_ads['contextual-inside-size'] == "1")
		{
		$inside_ad_width = '125';
		$inside_ad_height = '190';
		}
	elseif ($stb_network_ads['contextual-inside-size'] == "2")
		{
		$inside_ad_width = '200';
		$inside_ad_height = '260';
		}
	  else
		{
		}
    // Set Inside Content RCD
    if ($stb_network_ads['contextual-inside-rcd-enable'] == "1" && !empty($stb_network_ads['contextual-inside-rcd'])) 
		{
		$inside_ad_rcd = $stb_network_ads['contextual-inside-rcd'];
		}
	else
		{
		$inside_ad_rcd = $stb_network_ads['ad-rcd'];
		}
	//Insert Ads
	$ad_code = '<p>' . str_repeat('<iframe src="https://stb.network/codes/banner?rcd=' . $inside_ad_rcd . '"scrolling="no" style="background: ' . $stb_network_ads['contextual-inside-color'] . '; width:' . $inside_ad_width . 'px; height:' . $inside_ad_height . 'px; border:0px; padding:0;overflow:hidden; margin-right: 10px;" allowtransparency="true"></iframe>', $stb_network_ads['contextual-inside-count']) . '</p>';
	if (is_single() && $stb_network_ads['contextual-enable'] == '1' && $stb_network_ads['contextual-inside-enable'] == '1')
		{
		return stb_insert_after_paragraph($ad_code, $stb_network_ads['contextual-inside-paragraphs'], $content);
		}

	return $content;
	}

function stb_insert_after_paragraph($insertion, $paragraph_id, $content)
	{
	$closing_p = '</p>';
	$paragraphs = explode($closing_p, $content);
	foreach($paragraphs as $index => $paragraph)
		{
		if (trim($paragraph))
			{
			$paragraphs[$index].= $closing_p;
			}

		if ($paragraph_id == $index + 1)
			{
			$paragraphs[$index].= $insertion;
			}
		}

	return implode('', $paragraphs);
	}

// Insert Ads After Content

function stb_after_content($content)
	{
	global $stb_network_ads;

	// Set Ad Width and Height

	$bottom_ad_width = '0';
	$bottom_ad_height = '0';
	if ($stb_network_ads['contextual-bottom-size'] == "1")
		{
		$bottom_ad_width = '125';
		$bottom_ad_height = '190';
		}
	elseif ($stb_network_ads['contextual-bottom-size'] == "2")
		{
		$bottom_ad_width = '200';
		$bottom_ad_height = '260';
		}
	  else
		{
		}
    // Set After Content RCD
    if ($stb_network_ads['contextual-bottom-rcd-enable'] == "1" && !empty($stb_network_ads['contextual-bottom-rcd'])) 
		{
		$bottom_ad_rcd = $stb_network_ads['contextual-bottom-rcd'];
		}
	else
		{
		$bottom_ad_rcd = $stb_network_ads['ad-rcd'];
		}
	//Insert Ads
	if (is_single() && $stb_network_ads['contextual-enable'] == '1' && $stb_network_ads['contextual-bottom-enable'] == '1')
		{
		$content.= '<p>' . str_repeat('<iframe src="https://stb.network/codes/banner?rcd=' . $bottom_ad_rcd . '"scrolling="no" style="background: ' . $stb_network_ads['contextual-bottom-color'] . '; width:' . $bottom_ad_width . 'px; height:' . $bottom_ad_height . 'px; border:0px; padding:0;overflow:hidden;margin-right: 10px;" allowtransparency="true"></iframe>', $stb_network_ads['contextual-bottom-count']) . '</p>';
		}

	return $content;
	}

add_filter("the_content", "stb_after_content");