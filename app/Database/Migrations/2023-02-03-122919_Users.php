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
				'type' => 'INT',
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
			'email_verified_at' => [
				'type' => 'TIMESTAMP',
				'constraint' => 6,
			],
			'customer_type' => [
				'type' => 'INT',
				'constraint' => 11,
				'default' => '1',
			],
			'remember_token' => [
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => true,
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'city' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'zipcode' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'state' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'stripe_id' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'pm_type' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'pm_last_four' => [
				'type' => 'VARCHAR',
				'constraint' => 4,
				'null' => true,
			],
			'trial_ends_at' => [
				'type' => 'TIMESTAMP',
				'constraint' => 6,
				'null' => true,
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
