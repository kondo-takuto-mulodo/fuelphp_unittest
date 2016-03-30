<?php
class Helper_Common
{
		public static function format_time($timestamp)
		{
			return Date::forge($timestamp)->format('%m/%d/%Y %H:%M');
		}

		public static function get_hot_items($array,$key,$limit = 3)
		{
			if( ! is_array($array))
			{
				return array();
			}

			usort($array,Helper_Common::call_compare_func($key));
			return array_slice($array,0,$limit);
		}

		public static function call_compare_func($key)
		{
			return function ($item1, $item2) use ($key) {
				return ($item1->{$key} == $item2->{$key}) ? 0 : ($item1->{$key} > $item2->{$key}) ? - 1 : + 1;
			};
		}

		public static function install_data($data,$table)
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