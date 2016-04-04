<?php
abstract class Test_Data_Abstract_Data
{
	public function get_as_array($dataname)
	{
		return $this->{$dataname};
	}
	public function get_as_object($dataname)
	{
		$data = $this->{$dataname};
		$this->array_to_object($data);

		return (array)$data;
	}
	protected function array_to_object(&$array)
	{
		if (!$array) {
			return;
		}

		if (is_array($array)) {
			foreach ($array as $key => &$item) {
				if (is_array($item)) {
					$this->array_to_object($item);
				}
			}
		}
		$array = (object)$array;
	}
}
