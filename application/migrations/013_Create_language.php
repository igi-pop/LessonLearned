<?php
class Migration_Create_language extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'lang_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'lang_slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'lang_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			
		));
		$this->dbforge->add_key('lang_id', TRUE);
		$this->dbforge->create_table('language');
	}

	public function down()
	{
		$this->dbforge->drop_table('language');
	}
}