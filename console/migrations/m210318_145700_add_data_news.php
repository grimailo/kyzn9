<?php

use yii\db\Migration;

/**
 * Class m210318_145700_add_data_news
 */
class m210318_145700_add_data_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'news',
            ['title', 'content', 'id_user'],
            [
                ['Test news 1', 'Some content 1', 1],
                ['Test news 2', 'Some content 2', 1],
                ['Test news 3', 'Some content 3', 2],
                ['Test news 4', 'Some content 4', 2],
                ['Test news 5', 'Some content 5', 1],
                ['Test news 6', 'Some content 6', 1],
                ['Test news 7', 'Some content 7', 2],
                ['Test news 8', 'Some content 8', 2],
                ['Test news 9', 'Some content 9', 1],

            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
