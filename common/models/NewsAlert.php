<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_alert".
 *
 * @property int $id_news
 * @property int $id_user
 *
 * @property News $news
 * @property User $user
 */
class NewsAlert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_alert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_news', 'id_user'], 'required'],
            [['id_news', 'id_user'], 'integer'],
            [['id_news', 'id_user'], 'unique', 'targetAttribute' => ['id_news', 'id_user']],
            [['id_news'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['id_news' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_news' => 'Id News',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'id_news']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @param $userId
     * @return array
     */
    static public function getUserAlert($userId)
    {
        $newsAlert = NewsAlert::find()
            ->select('id_news')
            ->where(['id_user' => $userId])
            ->asArray()
            ->column
            ();
        if (!empty($newsAlert)) {
            return $newsAlert;
        }
    }

    static public function deleteAllUserAlert($idUser)
    {
        static::deleteAll(['in', 'id_user', $idUser]);
    }
}
