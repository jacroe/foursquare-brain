<?php
require "scalene/Scalene.php";

if(!$_GET["id"] || !($place = $_->places->get($_GET["id"])))
{
	header("Location: places.php");
}


$checkins = $_->checkins->getByPlaceID($_GET["id"]);

$_->view->assign("place", $place);
$_->view->assign("checkins", $checkins);
$_->view->display("checkins");