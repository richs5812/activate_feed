<?php
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
date_default_timezone_set('America/Detroit');
//2nd test
$todaysDate = date('l, F d, Y');
//echo $todaysDate;
//echo gettype($todaysDate);
//$todaysDate = "Sunday";
#require_once('../simplepie.inc');
// For 1.3+:
require_once('autoloader.php');
//will this show up remotely?
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

	$description = $item->get_description();
	//echo $description;
	//echo $description;
	//echo '<br />';
	//echo $todaysDate;
	//echo '<br />';
	$string = "Sunday, January 17, 2016 from 5:30-7:30pm at Lansing City Hall Courtyard (124 W Michigan Ave, Lansing, MI 48933)";
	$pos = strpos($description, $todaysDate);

	// Note our use of ===.  Simply == would not work as expected
	// because the position of 'a' was the 0th (first) character.
	if ($pos === false) {
    //echo "The string '$todaysDate' was not found in the string '$description'";
} else {
    //echo "The string '$todaysDate' was found in the string '$description'";
    //echo " and exists at position $pos";
    echo $description;
}
 
}
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?>
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 
<html xmlns
<head>
	<title>Sample SimplePie Page</title>
	<meta
</head>
<body>
 
	<div class="header">
		<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
		<p><?php echo $feed->get_description(); ?></p>
	</div>
 
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>
 
		<div class="item">
			<h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
			<p><?php echo $item->get_description(); ?></p>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
		</div>
 
	<?php endforeach; ?>
 
</body>
</html>-->
