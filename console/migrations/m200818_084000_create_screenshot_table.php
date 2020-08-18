<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%screenshot}}`.
 */
class m200818_084000_create_screenshot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%screenshot}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%screenshot}}');
    }
}
