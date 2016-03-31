<?php
/**
 * @group Data
 */
class Test_Data_Import_Data extends TestCase
{
	/**
	 * @before
	 */
	public function truncate_data()
	{
		DBUtil::truncate_table('messages');
	}

	public function test_csv_to_array()
	{
		$data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		$data_json = new Test_Data_Import_JSON_Data('messages','/messages/messages.json');
		$data_xml = new Test_Data_Import_XML_Data('messages','/messages/messages.xml');

		$data_csv->seed();
		$expect_csv = Model_Message::get_all();

		$data_json->seed();
		$expect_json = Model_Message::get_all();

		$data_xml->seed();
		$expect_xml = Model_Message::get_all();

		$this->assertEquals(count($expect_csv),9);
		$this->assertEquals($expect_json,$expect_xml);
	}
}