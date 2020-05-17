<?php
					// class name        // folder chứa file
App::uses('AppModel', 'Model'); // giống namespace laravel
class Note extends AppModel
{
	public  $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Tiêu đề không được để trống'
		),
		'content' => array(
			'not null' => array( // đặt tùy ý
				'rule' => 'notEmpty', // syntax
				'message' => 'Nội dung không được để trống'
			),
			'min length' => array( // đặt tùy ý
				'rule' => array('minLength', 10), // syntax
				'message' => 'Nội dung không được ngắn hơn 10 ký tự'
			)
		)
	);
}
