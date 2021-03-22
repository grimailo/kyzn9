<?php

namespace console\models;

use common\models\News;
use common\models\NewsAlert;
use common\models\User;
use \Yii;
use yii\base\Model;

class NewsNotification extends Model
{

    /**
     * @return array
     */
    public function findNewNews()
    {
        $yesterday = date('Y-m-d H:m:s', mktime(12, 0, 0, date('m'), date('d') - 1, date('y')));
        $today = date('Y-m-d H:m:s', mktime(12, 0, 0, date('m'), date('d'), date('y')));

        return News::find()
            ->where(['>=', 'created_at', $yesterday])
            ->andWhere(['<', 'created_at', $today])
            ->all();
    }


    public function notification($idNews)
    {
        foreach (User::find()->each() as $user) {
            Yii::$app->db->createCommand(
                'INSERT INTO `' . NewsAlert::tableName() . '` (`id_user`, `id_news`) VALUES (:id_user, :id_news)',
                [
                    ':id_user' => $user->id,
                    ':id_news' => $idNews,
                ])->execute();

            static::sendMail($user);
        }
    }

    private static function sendMail($user)
    {
        Yii::$app
            ->mailer
            ->compose(
                ['text' => 'news-notification'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($user->email)
            ->setSubject('New news at ' . Yii::$app->name)
            ->send();
    }
}