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

	public function addCategories()
	{
		$oauth = $this->oauth;
		$date = date("Ymd");
		$data = json_decode(file_get_contents("https://api.foursquare.com/v2/venues/categories?oauth_token=$oauth&v=$date"));

		$catsToAdd = array();

		foreach($data->response->categories as $c)
		{
			if ($c->name == "Shop & Service")
			{
				foreach($c->categories as $sc)
				{
					if ($sc->name == "Food & Drink Shop")
					{
						foreach($sc->categories as $ssc)
						{
							$catsToAdd[] = $ssc;
						}
						break;
					}
				}
			}
			elseif ($c->name == "Food")
			{
				foreach($c->categories as $sc)
				{
					$catsToAdd[] = $sc;
				}
			}
		}
		foreach($catsToAdd as $c)
			$this->database->insert("categories", array("id"=>$c->id, "name"=>$c->name, "icon"=>$c->icon->prefix));
	}
}