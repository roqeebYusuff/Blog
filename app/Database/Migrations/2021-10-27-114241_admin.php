<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false
            ],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => false,
				'unique' => true
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => false
			],
			'profile_pic' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
		];

		$this->forge->addField($fields);
		$this->forge->addKey('id', true);
		$this->forge->createTable('admin');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('admin');
	}
}
