<?php
class Migration_Add_to_users extends CI_Migration {

	public function up()
	{
		// $fields = (array(
		// 	'username' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '100',
		// 	),
		// 	'first_name' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '100',
		// 	),
		// 	'last_name' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '100',
		// 	),
		// 	'new_password' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '128',
		// 	),
		// 	'account_active' => array(
		// 		'type' => 'BOOLEAN',
		// 	),
		// 	'new_pass_active' => array(
		// 		'type' => 'BOOLEAN',
		// 	),
		// 	'code' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '128',
		// 	),
		// 	'privileges' => array(
		// 		'type' => 'INT',
		// 		'constraint' => '5',
		// 	),
		// ));
		// $this->dbforge->add_column('users', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('users', 'username');
	}
}