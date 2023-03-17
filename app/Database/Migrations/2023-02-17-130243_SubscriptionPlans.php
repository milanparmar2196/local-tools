<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubscriptionPlans extends Migration
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
			'plan_id' => [
				'type' => 'INT',
				'constraint' => 11,
			],
            'duration' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
            'amount' => [
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
		$this->forge->createTable('subscription_plans');
    }

    public function down()
    {
        $this->forge->dropTable('subscription_plans');
    }
}
