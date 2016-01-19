<?php
class Migration_Create_category extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'category_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'cat_slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'category_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'pub_date' => array(
				'type' => 'DATE',
			),
			'approved' => array(
				'type' => 'BOOLEAN',
				
			),
			'counter' => array(
				'type' => 'INT',
				'constraint' => 25,
				'unsigned' => TRUE,
			),
		));
		$this->dbforge->add_key('category_id', TRUE);
		$this->dbforge->create_table('category');
	}

	public function down()
	{
		$this->dbforge->drop_table('category');
	}
}