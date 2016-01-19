<?php
class Migration_Add_courses extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'course_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'category_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			),
			'c_slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'author_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'pub_date' => array(
				'type' => 'DATE',
			),
			'approved' => array(
				'type' => 'BOOLEAN',
				
			),
		));
		$this->dbforge->add_key('course_id', TRUE);
		$this->dbforge->create_table('courses');
	}

	public function down()
	{
		$this->dbforge->drop_table('courses');
	}
}