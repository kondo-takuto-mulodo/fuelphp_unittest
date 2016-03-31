<?php
class Test_Data_Messages extends Test_Data_Abstract_Data
{
	const DEFINE_OBJECT = 'define_object';

	public $define_object;

	public function set_define_object($array_object)
	{
		$this->define_object = $array_object;
	}

	const HOT = 'hot_messages';

	public $hot_messages = [
							[
							'name' => 'hot_messages 001',
							'message' => 'hot_messages 001',
							'views' => 10,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
						   [
							'name' => 'hot_messages 002',
							'message' => 'hot_messages 002',
							'views' => 20,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
							[
							'name' => 'hot_messages 003',
							'message' => 'hot_messages 003',
							'views' => 30,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
							[
							'name' => 'hot_messages 004',
							'message' => 'hot_messages 004',
							'views' => 40,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
							[
							'name' => 'hot_messages 005',
							'message' => 'hot_messages 005',
							'views' => 50,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
						];

	const NORMAL = 'normal_messages';

	public $normal_messages = [
							[
							'name' => 'normal_messages 001',
							'message' => 'normal_messages 001',
							'views' => 0,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
							[
							'name' => 'normal_messages 002',
							'message' => 'normal_messages 002',
							'views' => 0,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
							[
							'name' => 'normal_messages 003',
							'message' => 'normal_messages 003',
							'views' => 0,
							'created_at' => '1457672260',
							'deleted_at' => null,
							],
						];

	const DELETED = 'deleted_messages';

	public $deleted_messages = [
							[
							'name' => 'deleted_messages 001',
							'message' => 'deleted_messages 001',
							'views' => 0,
							'created_at' => '1457672260',
							'deleted_at' => '1457672373',
							],
							[
							'name' => 'deleted_messages 002',
							'message' => 'deleted_messages 002',
							'views' => 0,
							'created_at' => '1457672260',
							'deleted_at' => '1457672373',
							],
							[
							'name' => 'deleted_messages 003',
							'message' => 'deleted_messages 003',
							'views' => 0,
							'created_at' => '1457672260',
							'deleted_at' => '1457672373',
							],
						];

	const VALIDATE = 'validate_message';

	public $validate_message = [
							[
								[
									'name' => 'validate_message 001',
									'message' => 'validate message 001',
								],
								1,
								true
							],
							// name with 255 characters
							[
								[
									'name' => '004 validate_message 004 validate_message 004 validate_message 004  validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 00',
									'message' => 'validate message',
								],
								2,
								true
							],
							[
								[
									'name' => ' ',
									'message' => 'Validate message',
								],
								3,
								false
							],
							[
								[
									'name' => 'Validate message',
									'message' => ' ',
								],
								4,
								true
							],
							[
								[
									'name' => null,
									'message' => 'validate_message 002',
								],
								5,
								false
							],
							[
								[
									'name' => 'validate_message 003',
									'message' => null,
								],
								6,
								false
							],
								// name with 256 characters
							[
								[
									'name' => '004 validate_message 004 validate_message 004 validate_message 004  validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004 validate_message 004',
									'message' => 'validate message',
								],
								7,
								false
							]
	];
}
