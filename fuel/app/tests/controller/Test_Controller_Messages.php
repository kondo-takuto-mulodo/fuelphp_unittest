<?php
use \Mockery as Mock;

/**
 * @group Controller
 */
class Test_Controller_Messages extends TestCase {

	/**
	 * @before
	 */
	protected function truncate_data()
	{
		DBUtil::truncate_table('messages');
	}

	protected function tearDown()
		{
			\Mockery::close();
		}

	public function test_action_index()
	{
		$data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		$data_csv->seed();

		$response = Request::forge('messages/index')->execute()->response();
		$body = $response->body;
		$title = $body->title;
		$messages_list = $body->content->messages;
		$hot_messages_list = $body->content->hot_message;

    $this->assertEquals($title,"Messages");
    $this->assertEquals(count($messages_list),9);
    $this->assertEquals(count($hot_messages_list),3);
	}

	public function test_action_view()
	{
		$data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		$data_csv->seed();

		$message_expect = Model_Message::find(1);

		$response = Request::forge('messages/view/' . $message_expect->id)->execute()->response();
		$body = $response->body;
		$title = $body->title;
		$message = $body->content->message;
		$this->assertEquals($title,"View Message");

		$this->assertEquals($message,$message_expect);
	}

	public function test_action_new()
	{
		$data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		$data_csv->seed();

		$message_expect = Model_Message::find(1);

		$response = Request::forge('messages/new/' . $message_expect->id)->execute()->response();
		$body = $response->body;
		$title = $body->title;
		$message = $body->content->message;
		$this->assertEquals($title,"New Message");

		$this->assertEquals($message,$message_expect);
	}

	public function test_action_edit()
	{
		$data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		$data_csv->seed();

		$message_expect = Model_Message::find(1);

		$response = Request::forge('messages/edit/' . $message_expect->id)->execute()->response();
		$body = $response->body;
		$title = $body->title;
		$message = $body->content->message;
		$this->assertEquals($title,"Edit Message");

		$this->assertEquals($message,$message_expect);
	}
}