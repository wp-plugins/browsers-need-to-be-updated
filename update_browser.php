<?php

if( ! defined( 'ABSPATH' )) {
	wp_die( __('CHEAT?') );
	exit;
}

$browser = new BrowserDetection();
$user_browser = $browser->getBrowser();
$user_platform = $browser->getPlatform();

switch ($user_browser) {
	case 'Firefox':
		$user_browser_img = BNU_PLUGIN_URL.'assets/images/mozilla_firefox.png';
		$browser_upgrade_url = 'http://mozilla.org/firefox';
		break;
	case 'Chrome':
		$user_browser_img = BNU_PLUGIN_URL.'assets/images/google_chrome.png';
		$browser_upgrade_url = 'http://google.com/chrome/';
		break;
	case 'Safari':
		$user_browser_img = BNU_PLUGIN_URL.'assets/images/apple_safari.png';
		$browser_upgrade_url = 'http://apple.com/safari';
		break;
	case 'Internet Explorer':
		$user_browser_img = BNU_PLUGIN_URL.'assets/images/microsoft_internet_explorer.png';
		$browser_upgrade_url = 'http://windows.microsoft.com/en-us/internet-explorer/download-ie';
		break;
	case 'Opera':
		$user_browser_img = BNU_PLUGIN_URL.'assets/images/opera.png';
		$browser_upgrade_url = 'http://opera.com/download';
		break;
}


function current_domain_url() {
	$domainURL = 'http';
		if( isset($_SERVER["HTTPS"]) ) {
			if ($_SERVER["HTTPS"] == "on") {$domainURL .= "s";}
		}
		$domainURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$domainURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
		} else {
			$domainURL .= $_SERVER["SERVER_NAME"];
		}
		return $domainURL;
}
$options = get_option('BNU_options');
$recommended_browser = $options['recommend_browser'];

switch ($recommended_browser) {
	case 'firefox':
		$recommended_browser = 'Firefox';
		$recommended_browser_name = 'Mozilla Firefox';
		$recommended_browser_img = BNU_PLUGIN_URL.'assets/images/mozilla_firefox.png';
		$recommended_browser_url = 'http://mozilla.org/firefox';
		break;
	case 'chrome':
		$recommended_browser = 'Chrome';
		$recommended_browser_name = 'Google Chrome';
		$recommended_browser_img = BNU_PLUGIN_URL.'assets/images/google_chrome.png';
		$recommended_browser_url = 'http://google.com/chrome';
		break;
	case 'opera':
		$recommended_browser = 'Opera';
		$recommended_browser_name = 'Opera';
		$recommended_browser_img = BNU_PLUGIN_URL.'assets/images/opera.png';
		$recommended_browser_url = 'http://opera.com/download';
		break;
	case 'ie':
		$recommended_browser = 'Internet Explorer';
		$recommended_browser_name = 'Internet Explorer';
		$recommended_browser_img = BNU_PLUGIN_URL.'assets/images/microsoft_internet_explorer.png';
		$recommended_browser_url = 'http://windows.microsoft.com/en-us/internet-explorer/download-ie';
		break;
	default:
	case 'firefox':
		$recommended_browser = 'Firefox';
		$recommended_browser_name = 'Mozilla Firefox';
		$recommended_browser_img = BNU_PLUGIN_URL.'assets/images/mozilla_firefox.png';
		$recommended_browser_url = 'http://mozilla.org/firefox';
		break;		
}
$current_domain_url = current_domain_url();

?>
<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo BNU_PLUGIN_URL ?>assets/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo BNU_PLUGIN_URL ?>assets/css/style.css">
<!--[if lte IE 7]> 
<style type="text/css">
	.outer {
    display: inline;
    top: 0;
	}

	.middle {
	    display: inline;
	    top: 50%;
	    position: relative;
	}

	.inner {
	    display: inline;
	    top: -50%;
	    position: relative;
	}
</style>
<![endif]-->
<!--[if lte IE 9]> <style type="text/css"> div.wrapper { width : 960px } </style> <![endif]-->
</head>
<body>
	<div class="outer">
		<div class="middle">
			<div class="wrapper inner">
					<h2>You are using an unsupported version of <?php echo $user_browser; ?>.</h2>
					<p><?php echo $options['browser_upgrade_text']; ?></p>
					<div class="recommended-browser">
						<div class="browser-image"><img src="<?php echo $user_browser_img; ?>"></div>
						<div class="browser-content"><p>Upgrade <?php echo $user_browser; ?> for free</p></div>
						<div class="button-wrapper"><a class="btn" href="<?php echo $browser_upgrade_url; ?>">Upgrade</a></div>
					</div>
					<?php if($user_browser != $recommended_browser){ ?>
					<div class="recommended-browser">
						<div class="browser-image"><img src="<?php echo $recommended_browser_img; ?>"></div>
						<div class="browser-content"><p>Install <?php echo $recommended_browser_name; ?> for free</p></div>
						<div class="button-wrapper"><a class="btn" style="margin-right:10px" href="<?php echo $recommended_browser_url; ?>">Install</a></div>
					</div>
					<?php } ?>
					<div class="cancel">
						<a class="cancel-btn" href="<?php echo $current_domain_url; ?>">Continue Anyway</a>
					</div>
			</div>
		</div>
	</div>
 <script type='text/javascript'>
  	if(history.replaceState) history.replaceState({}, "", "/");
  </script>
</body>
</html>