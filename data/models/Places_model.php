<?php

class Places extends Model
{
	public function get($id)
	{
		$rows = $this->database->get("places", "`id` = '$id'");
		if ($rows)
			return $this->_format($rows[0]);
		return false;
	}

	public function getAll()
	{
		$rows = $this->database->get("places", "1 ORDER BY `name`");
		$places = array();
		foreach($rows as $row)
		{
			$places[] = $this->_format($row);
		}

		return $places;
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

	private function _format($row)
	{
		$place = new stdClass;

		foreach($row as $k => $v)
		{
			$place->$k = $v;
		}

		$place->category = $this->_getCategoryInfo($place->categoryID);
		unset($place->categoryID);

		return $place;
	}
}