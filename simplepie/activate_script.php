<?php
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
date_default_timezone_set('America/Detroit');

$todaysDate = date('l, F d, Y');

#require_once('../simplepie.inc');
// For 1.3+:
require_once('autoloader.php');

//connect to database using php script
require_once ('mysql_connect.php');

// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set which feed to process.
$feed->set_feed_url('http://detroit.activatehub.org/events.atom');

// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();

/*
Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
*/
foreach ($feed->get_items() as $item) {

	$description = addslashes($item->get_description());
	$link = $item->get_permalink();
	$title = addslashes($item->get_title());
	$pubDate = $item->get_date('D, d M Y H:i:s T');

	$pos = strpos($description, $todaysDate);

	if ($pos === false) {
    //echo "No matches found";
} else {
    $values = array($description,$link,$title,$pubDate);

$stmt = $conn->prepare("INSERT INTO social_media_feed (EventDescription, EventLink, EventTitle, PubDate) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $values[0], $values[1], $values[2], $values[3]);

	if ($stmt->execute() == TRUE) {
	   echo 'record entered successfully <br /> <br />';
	} else {
		echo "Error: '. $stmt->error.'";
	}
}
 
}
 
?>