<?php

use yii\db\Schema;
use yii\db\Migration;

class m150531_221737_init_category extends Migration
{
    public function up()
    {
        $this->insert('{{%category}}',[
            'name'=>'Категория 1'
        ]);

        $this->insert('{{%category}}',[
            'name'=>'Категория 2'
        ]);

        $this->insert('{{%category}}',[
            'name'=>'Категория 3'
        ]);
    }

    public function down()
    {
        $this->delete('{{%category}}', ['id' => 3]);
        $this->delete('{{%category}}', ['id' => 2]);
        $this->delete('{{%category}}', ['id' => 1]);

    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
