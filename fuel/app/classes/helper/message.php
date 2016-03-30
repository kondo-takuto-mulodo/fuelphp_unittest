<?php
class Helper_Message
{
	public static function update_views_for_message(&$message)
	{
		$message->views += 1;
		$message->save();
	}
}
