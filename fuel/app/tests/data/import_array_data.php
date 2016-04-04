<?php
class Test_Data_Import_Array_Data extends Test_Data_Abstract_Import_Data
{
	/**
	 * Generate data from JSON
	 * @return [Array] [[column_1 => value, column_2 => value],[column_1 => value,column_2 =>
	 * value],...]
	 */
	public function get_values()
	{
		return $this->resource;
	}
}