<?php

use yii\db\Migration;

/**
 * Class m210322_104903_alter_news_table
 */
class m210322_104903_alter_news_table extends Migration
{
    const TABLE = 'news';
    const CREATE_COLUMN = 'created_at';
    const UPDATE_COLUMN = 'updated_at';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(static::TABLE, static::CREATE_COLUMN, $this->dateTime());
        $this->addColumn(static::TABLE, static::UPDATE_COLUMN, $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(static::TABLE, static::CREATE_COLUMN);
        $this->dropColumn(static::TABLE, static::UPDATE_COLUMN);
    }
}
