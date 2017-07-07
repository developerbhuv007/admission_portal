<?php
class Doctor extends AppModel {
	
	public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'mfd' => array(
            'rule' => 'notEmpty'
        ),
		'exd'=> array('rule'=>'notEmpty'),
		'type'=>array('rule'=>'notEmpty')
		);
	
}
?>