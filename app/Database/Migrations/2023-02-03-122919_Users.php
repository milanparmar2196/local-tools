<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'country_pre' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => 15,
				'null' => true,
			],
			'country' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
				'default' => false,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'unique' => TRUE,
				'default' => false,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'default' => false,
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'default' => 'business',
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
