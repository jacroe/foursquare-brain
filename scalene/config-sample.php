<?php

date_default_timezone_set("America/New_York");

$config["load"]["core"][] = "database";
$config["load"]["core"][] = "email";
$config["load"]["library"][] = "pushover";
$config["load"]["model"][] = "foursquare";
$config["load"]["model"][] = "places";
$config["load"]["model"][] = "checkins";
$config["load"]["model"][] = "info";

$config["database"]["server"] = "localhost";
$config["database"]["database"] = "foursquare-brain";
$config["database"]["user"] = "root";
$config["database"]["pass"] = "password";

$config["email"]["server"] = "mail.example.com";
$config["email"]["port"] = 465;
$config["email"]["user"] = "tim@example.com";
$config["email"]["pass"] = "thisisforeveryone";
$config["email"]["from"] = array("email"=>"tim@example.com", "name"=>"Tim BL");

$config["pushover"]["appID"] = "";
$config["pushover"]["userID"] = "";

$config["foursquare"]["userid"] = ""; // Your user id
$config["foursquare"]["oauth"] = ""; // An OAUTH tokens
