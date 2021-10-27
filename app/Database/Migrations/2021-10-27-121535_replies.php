<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Replies extends Migration
{
	public function up()
	{
		$fields = [
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
				'unsigned' => true
			],
			'post_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false
			],
			'comment_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => false
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => false
			],
			'reply' => [
				'type' => 'TEXT',
				'null' => false
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id', true);
		$this->forge->createTable('replies');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('replies');
	}
}
