<?php
require "scalene/Scalene.php";

if ($_POST["checkinID"])
{
	$_->checkins->update($_POST["checkinID"], $_POST["meal"], $_POST["comments"], $_POST["rating"], array_key_exists("complete", $_POST));
	$checkin = $_->checkins->get($_POST["checkinID"]);
	header("Location: checkins.php?id=".$checkin->placesID);
}

if ($_GET["id"] && $checkin = $_->checkins->get($_GET["id"]))
{
	$checkin->place = $_->places->get($checkin->placesID);
}
else
	header("Location: index.php");

$_->view->assign("checkin", $checkin);
$_->view->display("editcheckin");