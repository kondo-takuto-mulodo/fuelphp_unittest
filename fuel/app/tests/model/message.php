<?php
/**
 * @group Model
 */
class Test_Model_Message extends TestCase
{
	/**
	 * @before
	 */
	protected function truncate_data()
	{
		DBUtil::truncate_table('messages');
	}

	/**
	 * @dataProvider data_get_all
	 */
	public function test_get_all($input,$expect)
	{
		(new Test_Data_Import_Array_Data("messages",$input))->seed();
		$result = Model_Message::get_all();

		foreach ($result as $key => $item)
		{
			$this->assertEquals($item->name, $expect[$key-1]['name']);
			$this->assertEquals($item->message, $expect[$key-1]['message']);
		}

	}

	public function data_get_all()
	{
		$messages         = new Test_Data_Messages;

		$hot_messages     = $messages->get_as_array(Test_Data_Messages::HOT);
		$normal_messages  = $messages->get_as_array(Test_Data_Messages::NORMAL);
		$deleted_messages = $messages->get_as_array(Test_Data_Messages::DELETED);

		return array(
				// with deleted records
				array(
						array_merge($normal_messages,$deleted_messages),
						$normal_messages
					),
				// without deleted records
				array(
						array_merge($normal_messages,$hot_messages),
						array_merge($normal_messages,$hot_messages),
					),
				// no record
				array(
						array(),
						array(),
					)
			);
	}

	public function test_validate()
	{
		$messages  = new Test_Data_Messages;
		$data_test = $messages->get_as_array(Test_Data_Messages::VALIDATE);
		$val = Model_Message::validate('test');

		foreach ($data_test as $value) {
			$this->assertEquals(
				['testcase' => $value[1],'result' => $val->run($value[0])],
				['testcase' => $value[1],'result' => $value[2]]
			);
		}

	}

}