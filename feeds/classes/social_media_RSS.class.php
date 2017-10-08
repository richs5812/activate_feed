<?
  class RSS
  {
	public function RSS()
	{
		require_once ('/home6/detrojd9/mysql_connect_rss.php');
	}
	public function GetFeed()
	{
		return $this->getDetails() . $this->getItems();
	}
	private function dbConnect()
	{
		DEFINE ('LINK', mysql_connect (DB_HOST, DB_USER, DB_PASSWORD));
	}
	private function getDetails()
	{
		$detailsTable = "social_media_feed";
		$this->dbConnect($detailsTable);
		$query = "SELECT * FROM ". $detailsTable;
		$result = mysql_db_query (DB_NAME, $query, LINK);
		while($row = mysql_fetch_array($result))
		{
			$details = '<?xml version="1.0" encoding="ISO-8859-1" ?>
    <rss version="2.0">
     <channel>
      <title>Activate! 313 Daily list of events</title>
      <link>http://www.activate313.org/p/home.html</link>
      <description>Daily list of events from activate313.org - progressive community calendar for SE Michigan</description>';
		}
		return $details;
	}
	private function getItems()
	{
		$itemsTable = "social_media_feed";
		$this->dbConnect($itemsTable);
		$query = "SELECT * FROM ". $itemsTable;
		$result = mysql_db_query (DB_NAME, $query, LINK);
		$items = '';
		while($row = mysql_fetch_array($result))
		{			
			$items .= '<item>
				<title>'. $row["EventTitle"] .'</title>
				<link>'. $row["EventLink"] .'</link>
				<description><![CDATA['. $row["EventDescription"] .']]></description>
				<pubDate>'. $row["PubDate"] .'</pubDate>
			</item>';
		}
		$items .= '</channel>
				</rss>';
		return $items;
	}
}
?>