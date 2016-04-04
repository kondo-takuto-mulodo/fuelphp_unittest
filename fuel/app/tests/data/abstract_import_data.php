<?php
abstract class Test_Data_Abstract_Import_Data
{
	protected $table;
	protected $resource;

	public function __construct($table,$resource)
	{
		$this->table = $table;
		$this->resource  = $resource;
	}

	public function get_table()
	{
		return $this->table;
	}

	abstract public function get_values();

	public function seed()
	{
		DBUtil::truncate_table($this->table);
		$this->install_data($this->get_values(),$this->table);
	}

	protected function install_data($data,$table)
	{
		if ( ! is_array($data) || is_null($table))
		{
			return;
		}

		foreach ($data as $item)
		{
			$query = DB::insert($table);
			$query->set($item)->execute();
		}
	}
}