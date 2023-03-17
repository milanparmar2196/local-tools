<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubscriptioPlansMigration extends Migration
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
            'icon' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
            'status' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('subscription_category');
    }

    public function down()
    {
        $this->forge->dropTable('subscription_category');
    }
}
