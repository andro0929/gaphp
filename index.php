<?php
include "googleanalytics.class.php";
try {
	/* 
	 * Google Analytics - Request Data
	 * Require: Email account, Password
	 */
	$email = "YOUR_EMAIL_ACCOUNT";
	$password = "YOUR_PASSWORD";

	$profile_id = 'ga:YOUR_GA_PROFILE_ID';		// Format: 'ga:XXXXXXXX'
	$start  = date('Y-m-d', strtotime('-7 days', strtotime('now')));
	$finish = date('Y-m-d', strtotime('now'));

	$ga = new GoogleAnalytics($email,$password);
	$ga->setProfile($profile_id);
	$ga->setDateRange($start, $finish);		// Format: 'yyyy-mm-dd'

	$report = $ga->getReport(array(
		'dimensions' => urlencode('ga:date, ga:country'),
		'metrics' => urlencode('ga:pageviews, ga:visitors'),
		'sort' => '-ga:pageviews'
	));

	//print out the $report array
	print "<pre>";
	print_r($report);
	print "</pre>";
	
} catch (Exception $e) { 
	print 'Error: ' . $e->getMessage(); 
}

?>