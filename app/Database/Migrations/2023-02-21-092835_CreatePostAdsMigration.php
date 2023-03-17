<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostAdsMigration extends Migration
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
			'seller_id' => [
				'type' => 'INT',
				'constraint' => 6,
                'unsigned' => true,
			],
            'category_id' => [
				'type' => 'INT',
				'constraint' => 6,
                'unsigned' => true,
			],
            'sub_category_id' => [
				'type' => 'INT',
				'constraint' => 6,
			],
            'brand_id' => [
				'type' => 'INT',
				'constraint' => 6,
                'unsigned' => true,
			],
            'ad_plan_id' => [
				'type' => 'INT',
				'constraint' => 6,
			],
            'ad_type' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
            'title' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
			],
            'description' => [
				'type' => 'LONGTEXT',
			],
			'currency' =>[
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
			],
            'duration' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
                'comment' => 'counted renting hours',
			],
            'amount' => [
				'type' => 'INT',
                'constraint' => '50',
                'null' => FALSE,
                'default' => 0,
			],
            
            'stocks' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
			],
            'vendor_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
			],
            'phone_number' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
			],
            'provider_desc' => [
				'type' => 'TEXT',
                'null' => FALSE,
			],
            'address_line_1' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
			],
            'address_line_2' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
                'null' => FALSE,
			],
			'vendor_country' => [
				'type' => 'INT',
				'constraint' => 11,
                'null' => FALSE,
			],
			'vendor_state' => [
				'type' => 'INT',
				'constraint' => 11,
                'null' => FALSE,
			],
			'vendor_city' => [
				'type' => 'INT',
				'constraint' => 11,
                'null' => FALSE,
			],
            'pincode' => [
				'type' => 'INT',
				'constraint' => 11,
                'null' => FALSE,
			],
			'deopsite' => [
				'type' => 'INT',
				'constraint' => 6,
				'null' => FALSE,
			],
			'deposite_duration' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE,
			],
			'deposite_amount' => [
				'type' => 'DECIMAL',
                'constraint' => '10,6',
                'null' => FALSE,
                'default' => 0.000000,
			],
            'product_detail' => [
				'type' => 'LONGTEXT',
                'null' => FALSE,
			],
            'about_product' => [
				'type' => 'LONGTEXT',
                'null' => FALSE,
			],
            'things_to_know_desc' => [
				'type' => 'LONGTEXT',
                'null' => FALSE,
			],
            'cancellation_policy' => [
				'type' => 'LONGTEXT',
                'null' => FALSE,
			],

			'listing_address1' => [
				'type' => 'VARCHAR',
				'constraint' =>  255,
                'null' => FALSE,
			],
			'listing_address2' => [
				'type' => 'VARCHAR',
				'constraint' =>  255,
                'null' => FALSE,
			],
			'country_list' => [
				'type' => 'INT',
				'constraint' =>  11,
                'null' => FALSE,
			],
			'state_list' => [
				'type' => 'INT',
				'constraint' =>  11,
                'null' => FALSE,
			],
			'city_list' => [
				'type' => 'INT',
				'constraint' =>  11,
                'null' => FALSE,
			],
			'postcode_list' => [
				'type' => 'INT',
				'constraint' =>  11,
                'null' => FALSE,
			],
			'latitude' => [
				'type' => 'VARCHAR',
                'constraint' => 255,
			],
			'longitude' => [
				'type' => 'VARCHAR',
                'constraint' => 255,
			],

            'status' => [
				'type' => 'ENUM("active","deactivate")',
                'null' => FALSE,
				'default' => 'active',
			],
            'ads_time' => [
				'type' => 'DATETIME',
			],
            'ads_end_datetime' => [
				'type' => 'DATETIME',
			],
            
			'tax_id' => [
				'type' => 'INT',
                'constraint' => 6,
			],
			'service_fee' => [
				'type' => 'INT',
                'constraint' => 6,
			],
			'demage' => [
				'type' => 'INT',
                'constraint' => 6,
			],
			'demage_amount' => [
				'type' => 'INT',
                'constraint' => 6,
			],
			
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('post_ads');
    }

    public function down()
    {
        $this->forge->dropTable('post_ads');
    }
}
