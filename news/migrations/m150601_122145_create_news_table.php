<?php

use yii\db\Schema;
use yii\db\Migration;

class m150601_122145_create_news_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
    
        $this->createTable('{{%news}}',[
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'category_id'=> Schema::TYPE_INTEGER . ' NOT NULL',
            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'content'=> Schema::TYPE_TEXT  
        ],$tableOptions);
        
        $this->addForeignKey('{{%fk_news_category}}','{{%news}}','category_id','{{%category}}','id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%news}}');    
        $this->dropForeignKey('fk_news_category','{{%news}}');
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
