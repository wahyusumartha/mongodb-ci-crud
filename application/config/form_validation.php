<?php
$config = array(
				'author' =>array(
				 			array(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'required'
							),
							array(
								'field' => 'nickname',
								'label' => 'Nickname',
								'rules' => 'required'
							),
							array(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'required|valid_email'
							)
				)
);

?>