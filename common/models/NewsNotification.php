<?php

namespace common\models;

use \Yii;
use yii\base\Model;

class NewsNotification extends Model
{
    public static function createNews($idNews)
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

    public static function sendMail($user)
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