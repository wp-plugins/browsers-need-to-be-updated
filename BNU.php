<?php
/*
Plugin Name: Browsers Need to be Updated
Plugin URI: http://SheriThemes.com/plugins/BNU
Description: Notify Users to Upgrade their browser
Version: 1.0
Author: ShervinQQ
Author URI: http://www.SheriThemes.com
License: GPLv2 or later
Tags: browser,older browser,browser detect,browser warning,chrome,firefox,ie,internet explorer,safari
*/

if( ! defined( 'ABSPATH' )) {
	wp_die('CHEAT?');
	exit;
}

class BNU {

	function __construct() {
		define('BNU_PLUGIN_URL', plugin_dir_url( __FILE__ ));

		add_action('init',array(&$this, 'BNU_LOAD_SETTINGS'));
		add_action('init', array(&$this, 'BNU_LANGUAGE'));
		add_action('get_header',array(&$this, 'BNU_UPGRADE_BROWSERS'));
	}

	function BNU_LANGUAGE() {
		load_plugin_textdomain('TMM', false, dirname(plugin_basename( __FILE__ )) . '/languages');
	}

	function BNU_LOAD_SETTINGS() {
		$dir = plugin_dir_path( __FILE__ );
	    require 'classes/sf-class-settings.php';
	    $settings_framework = new SF_Settings_API($id = 'BNU', $title = 'Browsers Need to be Updated', $menu = 'plugins.php', __FILE__);
	    $settings_framework->load_options( $dir .'options.php');
	}

	function BNU_UPGRADE_BROWSERS() {
		$options = get_option('BNU_options');
		if($options['upgrade_browsers']){
				require_once (dirname(__FILE__).'/BrowserDetection.php');
				$browser = new BrowserDetection();

				if($options['chrome_browser_notify']){
					$chrome_borwser = 'Chrome';
					$chrome_version = $options['min_chrome_ver'];
				}
				if($options['firefox_browser_notify']){
					$firefox_borwser = 'Firefox';
					$firefox_version = $options['min_firefox_ver'];
				}
				if($options['ie_browser_notify']){
					$ie_borwser = 'Internet Explorer';
					$ie_version = $options['min_ie_ver'];
				}
				if($options['ie_mobile_browser_notify']){
					$ie_mobile_borwser = 'Internet Explorer Mobile';
					$ie_mobile_version = $options['min_ie_mobile_ver'];
				}
				if($options['opera_browser_notify']){
					$opera_borwser = 'Opera';
					$opera_version = $options['min_opera_ver'];
				}
				if($options['opera_mobile_browser_notify']){
					$opera_mobile_borwser = 'Opera Mobile';
					$opera_mobile_version = $options['min_opera_mobile_ver'];
				}
				if($options['opera_mini_browser_notify']){
					$opera_mini_borwser = 'Opera Mini';
					$opera_mini_version = $options['min_opera_mini_ver'];
				}
				if($options['safari_browser_notify']){
					$safari_borwser = 'Safari';
					$safari_borwser_version = $options['min_safari_ver'];
				}

				$browsers = array(
					$chrome_borwser,
					$firefox_borwser,
					$ie_borwser,
					$ie_mobile_borwser,
					$opera_borwser,
					$opera_mobile_borwser,
					$opera_mini_borwser,
					$safari_borwser,
				);
				$browsers_versions = array(
					$chrome_version,
					$firefox_version,
					$ie_version,
					$ie_mobile_version,
					$opera_version,
					$opera_mobile_version,
					$opera_mini_version,
					$safari_borwser_version
				);

				foreach (array_combine($browsers,$browsers_versions) as $browser_name => $min_version) {
					$browser = new BrowserDetection();
						if ($browser->getBrowser() == $browser_name && $browser->getVersion() < $min_version) {
							$current_user_ip = $_SERVER['REMOTE_ADDR'];
							$transient = get_transient( 'transient_'.$current_user_ip );
							$time_to_show = $options['upgrade_browsers_times'];
							switch ($time_to_show) {
								case ' ':
									$time = 60;
									break;
								case 'always':
									$time = 1;
									break;
								case 'every_hour':
									$time = 60*60;
									break;
								case 'six_hour':
									$time = 60*60*6;
									break;
								case 'twelve_hour':
									$time = 60*60*12;
									break;
								case 'every_day':
									$time = 60*60*24;
									break;
								case 'every_three_day':
									$time = 60*60*72;
									break;
								case 'every_month':
									$time = 60*60*720;
									break;
								default:
									$time = 60*60;
									break;
							}
							if (empty($transient)){
									$update_browser_url = BNU_PLUGIN_URL . 'update_browser.php';
									$data = 'Redirecting...';
									include 'update_browser.php';
								set_transient('transient_'.$current_user_ip, $data, $time );
								exit();
							}
						}	
					}
		}
	}
}


$BNU = new BNU();