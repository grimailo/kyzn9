<?php

use yii\db\Migration;

/**
 * Class m210318_142010_add_data_user
 */
class m210318_142010_add_data_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'user',
            [
                'email',
                'username',
                'password_hash',
                'auth_key',
                'created_at',
                'updated_at'
            ],
            [
                [
                    'admin@admin.ru',
                    'admin',
                    Yii::$app->security->generatePasswordHash('qwerty'),
                    Yii::$app->security->generateRandomString(),
                    time(),
                    time()
                ],
                [
                    'moderator@moderator.ru',
                    'moderator',
                    Yii::$app->security->generatePasswordHash('qwerty'),
                    Yii::$app->security->generateRandomString(),
                    time(),
                    time()
                ],
                [
                    'user@user.ru',
                    'user',
                    Yii::$app->security->generatePasswordHash('qwerty'),
                    Yii::$app->security->generateRandomString(),
                    time(),
                    time()
                ]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
