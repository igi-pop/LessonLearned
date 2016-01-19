<?php
class Migration_Create_lessons extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'lesson_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'course_id' => array(
				'type' => 'int',
				'constraint' => '11',
			),
			//maybe
			'language_id' => array(
				'type' => 'int',
				'constraint' => '11',
			),
			'lesson_name' => array(
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
		$this->dbforge->add_key('lesson_id', TRUE);
		$this->dbforge->create_table('lessons');
	}

	public function down()
	{
		$this->dbforge->drop_table('lessons');
	}
}