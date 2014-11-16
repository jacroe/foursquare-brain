<?php

class Foursquare extends Model
{
	private $userid;
	private $oauth;

	public function __construct()
	{
		foreach($this->config["foursquare"] as $k => $v)
			$this->$k = $v;
	}

	public function getLatestCheckin()
	{
		$userid = $this->userid;
		$oauth = $this->oauth;
		$date = date("Ymd");
		$url = "https://api.foursquare.com/v2/users/$userid/checkins?oauth_token=$oauth&v=$date";
		$data = json_decode(file_get_contents($url));

		return $data->response->checkins->items[0];
	}
}