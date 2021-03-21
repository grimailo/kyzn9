<?php

namespace frontend\controllers;


use common\models\News;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use \Yii;

class NewsController extends Controller
{
    /**
     * @return array[]
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view'],
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $pageSize = Yii::$app->request->get('pageSize') ?: 5;
        $dataProvider = new ActiveDataProvider([
            'query' => News::find(),
            'pagination' => [
                'pageSize' => $pageSize
            ]
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider, 'pageSize' => $pageSize]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = News::findOne($id);

        return $this->render('view', ['model' => $model]);
    }

}