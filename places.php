<?php
require "scalene/Scalene.php";

if(!$_GET["id"])
{
	$places = $_->places->getAll();
	foreach($places as $p)
	{
		$p->checkins = $_->database->numRows("checkins", "`placesID` = '{$p->id}'");
	}

	$_->view->assign("places", $places);
	$_->view->display("places");
}