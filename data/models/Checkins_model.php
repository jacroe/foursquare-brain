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
}