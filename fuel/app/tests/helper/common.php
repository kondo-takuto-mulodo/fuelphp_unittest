<?php
/**
 * @group Helper
 */
class Test_Helper_Common extends TestCase
{
	/**
	 * @before
	 */
	protected function truncate_data()
	{
		DBUtil::truncate_table('messages');
	}

	public function test_format_time()
	{
		$expect = "10/05/2015 12:10";
		$date   = new DateTime($expect);
		$date   = $date->getTimestamp();

		$this->assertEquals(Helper_Common::format_time($date), $expect);
	}

	/**
	 * @dataProvider data_get_hot_items
	 */
	public function test_get_hot_items($input,$expect)
	{
		$result = Helper_Common::get_hot_items($input,'views');

		$this->assertEquals($expect,$result);
	}

	public function data_get_hot_items()
	{
		$messages        = new Test_Data_Messages;
		$hot_messages    = $messages->get_as_object(Test_Data_Messages::HOT);
		$normal_messages = $messages->get_as_object(Test_Data_Messages::NORMAL);
		return array(
			// get 3 hot items
			array(
					array(
						$normal_messages[1],
						$hot_messages[3],
						$normal_messages[0],
						$hot_messages[2],
						$normal_messages[2],
						$hot_messages[4],
					),
					array(
						$hot_messages[4],
						$hot_messages[3],
						$hot_messages[2],
					)
				),
			// get 2 hot items
			array(
					array(
						$normal_messages[1],
						$hot_messages[1],
					),
					array(
						$hot_messages[1],
						$normal_messages[1],
					)
				),
			// get 0 hot items
			array(
					null,
					array()
				),
			);
	}
}