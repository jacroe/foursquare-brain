<?php

class Notify extends Model
{
	public function push($title, $message, $url = null, $pri = 0)
	{
		$this->load->library("pushover");
		$this->pushover->send($title, $message, $url, $pri);
	}
}