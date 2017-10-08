# activate_feed
Activate! RSS feed

## Installation Instructions

Below is a basic procedure for setting up an RSS feed that will produce a list of daily events each morning from an Activate! calendar.
<ol>
	<li>Download <a href="http://simplepie.org/downloads/" target="_blank">SimplePie RSS parser</a></li>
	<li>Unzip the downloaded zip file and move the unzipped folder to your server</li>
	<li>create MySQL database on your server with columns for the following items: Event Title, Event Description, Event Link, and published date</li>
	<li>create a php script file within the unzipped Simplepie folder on your server to parse Activate! Atom feed events and save today's events to the database (<a href="https://github.com/richs5812/activate_feed/blob/master/simplepie/activate_script.php" target="_blank">see example file for Detroit here fropm this repo</a>)</li>
	<li>set a cron job to execute the php script once each morning</li>
	<li>create an RSS feed for your database items using PHP (a good tutorial here: <a href="http://www.htmlgoodies.com/beyond/xml/article.php/3691751" target="_blank">http://www.htmlgoodies.com/beyond/xml/article.php/3691751</a>)</li>
</ol>
That's it! Once the RSS feed is working, you can connect it to social media accounts via tools like Hootsuite, and set up a daily email with an RSS campaign in Mailchimp.
