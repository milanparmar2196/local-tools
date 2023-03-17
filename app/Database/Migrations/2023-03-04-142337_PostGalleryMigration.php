<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostGalleryMigration extends Migration
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
            'post_id' => [
				'type' => 'INT',
				'constraint' => 6,
                'unsigned' => true,
			],
            'post_image' => [
				'type' => 'INT',
				'constraint' => 6,
                'unsigned' => true,
			],
            'image_name' => [
				'type' => 'INT',
				'constraint' => 6,
                'unsigned' => true,
			],
            'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('gallerypost_ads');
    }

    public function down()
    {
        $this->forge->dropTable('gallerypost_ads');
    }
}
