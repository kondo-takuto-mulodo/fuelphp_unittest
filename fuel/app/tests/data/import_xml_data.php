<?php
class Test_Data_Import_XML_Data extends Test_Data_Abstract_Import_Data
{
	/**
	 * Generate data from XML
	 * @return [Array] [[column_1 => value, column_2 => value],[column_1 => value,column_2 =>
	 * value],...]
	 */
	public function get_values()
	{
		$data = file_get_contents(dirname(__FILE__) . $this->resource);
		$values = (array)simplexml_load_string($data);
		$array = array();

		foreach($values[$this->table] as $value)
		{
			$val = (array)$value->attributes();
			array_push($array, $val['@attributes']);
		}
		return $array;
	}
}