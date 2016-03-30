<?php
use \Mockery as Mock;

/**
 * @group Helper
 */
class Test_Helper_Message extends TestCase
{
	public function tearDown()
    {
        \Mockery::close();
    }

	public function test_update_views_for_message()
	{
		$message         = \Mockery::mock();
		// add views property for $message
		$message->views  = 1;
		// add save method for $message
		$message->shouldReceive('save');

		Helper_Message::update_views_for_message($message);
		$this->assertEquals($message->views, 2);
	}
}