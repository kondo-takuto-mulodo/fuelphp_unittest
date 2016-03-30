<?php
class MyRules
{
	public function _validation_no_blank($val)
	{
		$val = preg_replace('/\s+/','',$val);
		return ! strlen($val) == 0;
	}
}