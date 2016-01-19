<?php
class Migration_Create_diffuculty_table extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'difficulty_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'difficulty_slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'difficulty_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			
		));
		$this->dbforge->add_key('difficulty_id', TRUE);
		$this->dbforge->create_table('difficulty');
	}

	public function down()
	{
		$this->dbforge->drop_table('difficulty');
	}
}