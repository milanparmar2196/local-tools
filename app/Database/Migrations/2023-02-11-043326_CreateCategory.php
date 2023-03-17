<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategory extends Migration
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
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'parent_id' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'is_active' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'german_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'icon' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
