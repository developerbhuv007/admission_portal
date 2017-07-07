<?php
class Gerp extends AppModel {
	
	public $validate = array(
        'username' => array(
            'rule' => 'notEmpty'
        ),
        'password' => array(
            'rule' => 'notEmpty'
        )
		);
	
}
?>