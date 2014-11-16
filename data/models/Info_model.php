<?php

class Info extends Model
{
	public function get($name)
	{
		if ($rows = $this->database->get("info", "`name` = '$name'"))
		{
			return $rows[0]["value"];
		}
		else
		{
			$this->database->insert("info", array("name"=>$name));
			return null;
		}
	}

	public function set($name, $value)
	{
		$this->database->put("info", array("name"=>$name, "value"=>$value));
	}
}