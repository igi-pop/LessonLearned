<?php
class Migration_Create_blocks extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'block_id' => array(
				'type' => 'INT',
				'constraint' => 110,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'block_group' => array(
				'type' => 'int',
				'constraint' => '11',
			),
			'block_order' => array(
				'type' => 'int',
				'constraint' => '11',
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'description' => array(
				'type' => 'TEXT',
				
			),
			'note' => array(
				'type' => 'TEXT',
				
			),
			'code' => array(
				'type' => 'TEXT',
				
			),
			'output' => array(
				'type' => 'TEXT',
				
			),
			'image' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				
			),


			'approved' => array(
				'type' => 'BOOLEAN',
			),
			'pub_date' => array(
				'type' => 'DATE',
			),
			'mod_date' => array(
				'type' => 'DATE',
			),
			
		));
		$this->dbforge->add_key('block_id', TRUE);
		$this->dbforge->create_table('blocks');
	}

	public function down()
	{
		$this->dbforge->drop_table('blocks');
	}
}