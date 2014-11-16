<?php
require "scalene/Scalene.php";
$_->load->model(array("foursquare", "places", "checkins"));

if ($_POST["checkinID"])
{
	$_->checkins->update($_POST["checkinID"], $_POST["meal"], $_POST["comments"], $_POST["rating"], array_key_exists("complete", $_POST));
	header("Location: checkin.php?id=".$_POST["checkinID"]);
}

if ($_GET["id"] && $checkin = $_->checkins->get($_GET["id"]))
{
	$checkin->place = $_->places->get($checkin->placesID);
}
else
	header("Location: index.php");

$_->view->assign("checkin", $checkin);
$_->view->display("checkin");