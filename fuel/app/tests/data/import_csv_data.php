<?php
class Test_Data_Import_CSV_Data extends Test_Data_Abstract_Import_Data
{
	/**
	 * Generate data from CSV
	 * @return [Array] [[column_1 => value, column_2 => value],[column_1 => value,column_2 =>
	 * value],...]
	 */
	public function get_values()
	{
		$values = [];
		$csv = array_map('str_getcsv', file(dirname(__FILE__) . $this->resource));

		for($i=1;$i<count($csv);$i++)
		{
			$data = [];
			foreach ($csv[$i] as $key => $value) {
					$data[$csv[0][$key]] = strlen($value) < 1 ? null : $value;
			}

			array_push($values,$data);
		}
		return $values;
	}
}