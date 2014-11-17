<?php
require "scalene/Scalene.php";

$checkin = $_->foursquare->getLatestCheckin();
$info = $_->database->get("info");
foreach($info as $i)
{
	if ($i["name"] == "lastCheckin")
		$lastCheckin = $i["value"];
}

if ($checkin->id != $lastCheckin)
{
	if (!$_->places->get($checkin->venue->id))
	{
		$newPlace = true;
		$_->places->put($checkin->venue);
	}

	$_->checkins->add($checkin);
	$_->database->update("info", array("value"=>$checkin->id), "`name` = 'lastCheckin'");
	if ($newPlace)
		$_->pushover->send("Checked-in at ".$checkin->venue->name, "First time here.", array("link"=>"http://jacroe.ngrok.com/foursquare-brain/editCheckin.php?id=".$checkin->id, "title"=>"Add meal info"));
	else
		$_->pushover->send("Checked-in at ".$checkin->venue->name, "Not your first rodeo.", array("link"=>"http://jacroe.ngrok.com/foursquare-brain/checkins.php?id=".$checkin->venue->id, "title"=>"View past meals and add this one's."));
}