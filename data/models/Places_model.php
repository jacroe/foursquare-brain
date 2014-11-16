<?php

class Places extends Model
{
	public function get($id)
	{
		$rows = $this->database->get("places", "`id` = '$id'");
		if ($rows)
		{
			$row = $rows[0];
			$place = new stdClass;

			foreach($row as $k => $v)
			{
				$place->$k = $v;
			}

			return $place;
		}

		return false;
	}

	public function put($placeObj)
	{
		$place = array(
			"id" => $placeObj->id,
			"name" => $placeObj->name,
			"location" => $placeObj->location->address." ".$placeObj->location->formattedAddress[1],
			"category" => $placeObj->categories[0]->name
		);
		$this->database->insert("places", $place);
	}
}