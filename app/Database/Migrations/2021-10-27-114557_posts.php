<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
			'author' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
				'default' => 'The Roq'
            ],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => false,
				'unique' => true
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => false,
				'unique' => true
			],
			'views' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => false
			],
			'intro' => [
				'type' => 'TEXT',
				'null' => false
			],
			'body' => [
				'type' => 'TEXT',
				'null' => false
			],
			'published' => [
				'type' => 'ENUM',
				'constraint' => ['YES', 'NO'],
				'default' => 'YES',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id', true);
		$this->forge->createTable('posts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
