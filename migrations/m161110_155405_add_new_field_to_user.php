<?php

use yii\db\Migration;

class m161110_155405_add_new_field_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'language_id', \yii\db\Schema::TYPE_INTEGER);
    }

    public function down()
    {
        echo "m161110_155405_add_new_field_to_user cannot be reverted.\n";
        $this->dropColumn('{{%user}}', 'language_id');
        return false;
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
