<?php

class Checkins extends Model
{
	public function add($checkinObj)
	{
		$checkin = array(
			"id" => $checkinObj->id,
			"placesID" => $checkinObj->venue->id,
			"comments" => property_exists($checkinObj, "shout") ? $checkinObj->shout : null,
			"time" => $checkinObj->createdAt
		);

		$this->database->insert("checkins", $checkin);
	}

	public function get($id)
	{
		if ($this->exists($id))
		{
			$rows = $this->database->get("checkins", "`id` = '$id'");
			return $this->_format($rows[0]);
		}
		else
			return null;
	}

	public function getByPlaceID($placeID)
	{
		$rows = $this->database->get("checkins", "`placesID` = '$placeID'");
		$checkins = array();

		foreach($rows as $row)
			$checkins[] = $this->_format($row);

		return $checkins;
	}

	public function update($id, $meal, $comments, $rating, $complete = false)
	{
		$checkin = array(
			"id" => $id,
			"meal" => $meal,
			"comments" => $comments,
			"rating" => $rating,
			"complete" => (bool)$complete
		);
		$this->database->update("checkins", $checkin, "`id` = '$id'");
	}

	public function exists($checkinID)
	{
		return (bool)$this->database->numRows("checkins", "`id` = '$checkinID'");
	}

	private function _format($row)
	{
		$checkin = new stdClass;

		foreach($row as $k => $v)
		{
			$checkin->$k = $v;
		}

		$checkin->time = date("M j, Y g:ia", $checkin->time);

		return $checkin;
	}
}