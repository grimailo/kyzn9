<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m210318_141859_create_news_table extends Migration
{

    const NEWS_TABLE = 'news';
    const FK = 'fk_news_user';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::NEWS_TABLE, [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'id_user' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(self::FK, self::NEWS_TABLE, 'id_user', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK, self::NEWS_TABLE);
        $this->dropTable(self::NEWS_TABLE);
    }
}
