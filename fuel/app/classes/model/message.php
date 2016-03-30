<?php
use Orm\Model_Soft;

class Model_Message extends Model_Soft
{
	protected static $_properties = array(
		'id',
		'name',
		'message',
		'views',
		'created_at',
		'updated_at',
		'deleted_at',
	);

	protected static $_soft_delete = array(
		'deleted_field'                                    => 'deleted_at',
		'mysql_timestamp'                                  => false,
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events'                                      => array('before_insert'),
			'mysql_timestamp'                             => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events'                                      => array('before_save'),
			'mysql_timestamp'                             => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_callable(new MyRules());
		$val->add_field('name', 'Name', 'required|max_length[255]|no_blank');
		$val->add_field('message', 'Message', 'required');

		return $val;
	}

	public static function get_all()
	{
		return Model_Message::find('all',array(
			'order_by'                                    => array('created_at' => 'desc'),
			'from_cache'                                  => false,
		));
	}

}
