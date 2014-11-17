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

			$place->category = $this->_getCategoryInfo($place->categoryID);
			unset($place->categoryID);
			return $place;
		}

		return false;
	}

	public function put($placeObj)
	{
		if (!$this->database->numRows("places", "`id` = '{$placeObj->id}'"))
		{
			$place = array(
				"id" => $placeObj->id,
				"categoryID" => $placeObj->categories[0]->id,
				"name" => $placeObj->name,
				"location" => $placeObj->location->address." ".$placeObj->location->formattedAddress[1]
			);
			$this->database->insert("places", $place);
		}
	}

	private function _getCategoryInfo($id)
	{
		$rows = $this->database->get("categories", "`id` = '$id'");
		$row = $rows[0];
		$category = new stdClass;

		foreach($row as $k => $v)
		{
			$category->$k = $v;
		}

		return $category;
	}
}