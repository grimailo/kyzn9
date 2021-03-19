<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int|null $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [
                ['item_name'],
                'exist',
                'skipOnError' => true,
                'targetClass' => AuthItem::className(),
                'targetAttribute' => ['item_name' => 'name']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ItemName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

    public static function changeUserRole($userId, $roles)
    {
        $newRoles = empty($roles) ? [] : $roles;
        $removeRoles = array_diff(AuthItem::getArrayRoles(), $newRoles);
        $auth = Yii::$app->authManager;
        static::revoke($userId, $removeRoles, $auth);
        static::assign($userId, $newRoles, $auth);
    }

    private static function assign($userId, $roles, $auth)
    {
        for ($i = 0; $i < count($roles); $i++) {
            $role = $auth->getRole($roles[$i]);
            try {
                $auth->assign($role, $userId);
            } catch (\Exception $e) {
            }
        }

    }

    private static function revoke($userId, $removeRoles, $auth)
    {
        if (!empty($removeRoles)) {
            foreach ($removeRoles as $value) {
                $role = $auth->getRole($value);
                $auth->revoke($role, $userId);
            }
        }
    }

    public static function revokeAll($userId)
    {
        Yii::$app->authManager->revokeAll($userId);
    }

    /**
     * @param $roles
     * @return array
     */
    public static function getModeratorsId($roles)
    {
       return static::find()->select('user_id')->where(['in', 'item_name', $roles])->asArray()->column();
    }
}