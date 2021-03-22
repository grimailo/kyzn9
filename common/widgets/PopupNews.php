<?php

namespace common\widgets;

use common\models\News;
use common\models\NewsAlert;
use common\widgets\assets\PopupNewsAsset;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use \Yii;

class PopupNews extends Widget
{
    public function init()
    {
        parent::init();
        PopupNewsAsset::register($this->getView());
    }

    /**
     * @return bool|string
     */
    public function getViewPath()
    {
        return Yii::getAlias('@common/widgets/views/popupNews/');
    }

    /**
     * @return string
     */
    public function run()
    {
        if (!Yii::$app->user->isGuest && $newsId = NewsAlert::getUserAlert(Yii::$app->user->id)) {
            NewsAlert::deleteAllUserAlert(Yii::$app->user->id);
            $dataProvider = new ActiveDataProvider([
                'query' => News::find()->where(['in', 'id', $newsId])
            ]);
            return $this->render('popup_news', ['dataProvider' => $dataProvider]);
        }
    }
}