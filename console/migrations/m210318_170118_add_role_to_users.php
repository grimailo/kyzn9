<?php

use yii\db\Migration;

/**
 * Class m210318_170118_add_role_to_users
 */
class m210318_170118_add_role_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $addNews = $auth->createPermission('addNews');
        $addNews->description = 'Create a news';
        $auth->add($addNews);

        $manageUsers = $auth->createPermission('manageUser');
        $manageUsers->description = 'Manage Users';
        $auth->add($manageUsers);

        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);
        $auth->addChild($moderator, $addNews);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manageUsers);
        $auth->addChild($admin, $addNews);

        $auth->assign($moderator, 2);
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
