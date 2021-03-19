<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_alert}}`.
 */
class m210318_141915_create_news_alert_table extends Migration
{
    const NEWS_ALERT_TABLE = 'news_alert';
    const USER_TABLE = 'user';
    const NEWS_TABLE = 'news';
    const FK_USER = 'fk_news_alert_user';
    const FK_NEWS = 'fk_news_alert_news';
    const ID_NEWS = 'id_news';
    const ID_USER = 'id_user';
    const ID = 'id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::NEWS_ALERT_TABLE, [
            self::ID_NEWS => $this->integer()->notNull(),
            self::ID_USER => $this->integer()->notNull()
        ]);
        $this->addPrimaryKey('pk-news_alert', self::NEWS_ALERT_TABLE, [self::ID_NEWS, self::ID_USER]);

        $this->addForeignKey(self::FK_USER, self::NEWS_ALERT_TABLE, self::ID_USER, self::USER_TABLE, self::ID);
        $this->addForeignKey(self::FK_NEWS, self::NEWS_ALERT_TABLE, self::ID_NEWS, self::NEWS_TABLE, self::ID);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_NEWS, self::NEWS_ALERT_TABLE);
        $this->dropForeignKey(self::FK_USER, self::NEWS_ALERT_TABLE);
        $this->dropTable(self::NEWS_ALERT_TABLE);
    }
}
