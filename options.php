<?php
$options = array();

$options[] = array( 'name' => __( 'General', 'BNU' ), 'type' => 'heading' );
$options[] = array( 'name' => __( 'General options', 'BNU' ), 'type' => 'title', 'desc' => __( '', 'BNU' ) );

$options[] = array(
	'name' => __( 'Enable BNU', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'upgrade_browsers',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( 'Browsers Get Notify', 'BNU' ),
	'desc' => __( 'Chrome', 'BNU' ),
	'id'   => 'chrome_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( '', 'BNU' ),
	'desc' => __( 'Firefox', 'BNU' ),
	'id'   => 'firefox_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( '', 'BNU' ),
	'desc' => __( 'Internet Explorer', 'BNU' ),
	'id'   => 'ie_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( '', 'BNU' ),
	'desc' => __( 'Internet Explorer Mobile', 'BNU' ),
	'id'   => 'ie_mobile_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( '', 'BNU' ),
	'desc' => __( 'Opera', 'BNU' ),
	'id'   => 'opera_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( '', 'BNU' ),
	'desc' => __( 'Opera Mobile', 'BNU' ),
	'id'   => 'opera_mobile_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( '', 'BNU' ),
	'desc' => __( 'Opera Mini', 'BNU' ),
	'id'   => 'opera_mini_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( '', 'BNU' ),
	'desc' => __( 'Safari', 'BNU' ),
	'id'   => 'safari_browser_notify',
	'type' => 'checkbox'
);
$options[] = array(
	'name' => __( 'Minimum Chrome Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_chrome_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Minimum Firefox Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_firefox_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Minimum IE Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_ie_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Minimum IE Mobile Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_ie_mobile_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Minimum Opera Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_opera_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Minimum Opera Mobile Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_opera_mobile_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Minimum Opera Mini Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_opera_mini_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Minimum Safari Version', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'min_safari_ver',
	'type' => 'text'
);
$options[] = array(
	'name' => __( 'Times to Show Users', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'upgrade_browsers_times',
	'type' => 'select',
	'options' => array(
		' ' => '--Choose One--',
		'dev' => 'DEV',
		'always' => 'Always',
		'every_hour' => 'Once per Hour',
		'six_hour' => '6 Hours',
		'twelve_hour' => '12 Hours',
		'every_day' => 'Once per Day',
		'every_three_day' => 'Once per 3 Days',
		'every_month' => 'Once per Month'
	)
);
$options[] = array(
	'name' => __( 'Upgrade Browser Text', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'browser_upgrade_text',
	'type' => 'textarea',
	'std' => 'You are using a web browser that is not supportet by this website.This means that some function may not work as supposed which can result in strange behaviors when browsing arround.'
);
$options[] = array(
	'name' => __( 'Recommend Browser to Users', 'BNU' ),
	'desc' => __( '', 'BNU' ),
	'id'   => 'recommend_browser',
	'type' => 'select',
	'options' => array(
		'chrome' => 'Chrome',
		'firefox' => 'Firefox',
		'ie' => 'Internet Explorer',
		'opera' => 'Opera'
	)
);