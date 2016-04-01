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
		Session::delete_flash('success');
		Session::delete_flash('error');
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

		public function test_action_view_not_found()
	{
		$response = Request::forge('messages/view/' . 100)->execute()->response();
		$errors = Session::get_flash('error');
		$this->assertEquals($errors,"Could not find message #100");
	}

	public function test_action_new()
	{
		$response = Request::forge('messages/create')->execute()->response();
		$body = $response->body;
		$title = $body->title;
		$this->assertEquals($title,"New Message");
	}

	public function test_action_clone()
	{
		$data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		$data_csv->seed();

		$message_expect = Model_Message::find(1);

		$response = Request::forge('messages/clone/' . $message_expect->id)->execute()->response();
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

		public function test_action_edit_error()
	{
		$response = Request::forge('messages/edit/' . 100)->execute()->response();
		$errors = Session::get_flash('error');
		$this->assertEquals($errors,"Could not find message #100");
	}

	public function test_action_delete_success()
	{
		$data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		$data_csv->seed();

		$message_expect = Model_Message::find(1);

		$response = Request::forge('messages/delete/' . $message_expect->id)->execute()->response();
		$success = Session::get_flash('success');
		$errors = Session::get_flash('error');

		$this->assertEquals($success,"Deleted message #1");
		$this->assertEquals($errors,null);
	}

	public function test_action_delete_error()
	{
		$response = Request::forge('messages/delete/' . 100)->execute()->response();
		$success = Session::get_flash('success');
		$errors = Session::get_flash('error');

		$this->assertEquals($success,null);
		$this->assertEquals($errors,"Could not delete message #100");
	}

		public function test_action_create()
	{
		// $data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		// $data_csv->seed();

		// $message_expect = Model_Message::find(1);

		// $response = Request::forge('messages/delete/' . $message_expect->id)->execute()->response();
		// $this->assertEquals($message,$message_expect);
	}

			public function test_action_update()
	{
		// $data_csv = new Test_Data_Import_CSV_Data('messages','/messages/messages.csv');
		// $data_csv->seed();

		// $message_expect = Model_Message::find(1);

		// $response = Request::forge('messages/delete/' . $message_expect->id)->execute()->response();
		// $this->assertEquals($message,$message_expect);
	}
}