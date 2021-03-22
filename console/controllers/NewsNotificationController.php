<?php

namespace console\controllers;

use console\models\NewsNotification;
use yii\helpers\Console;
use \yii\console\Controller;

class NewsNotificationController extends Controller
{

    public function actionIndex()
    {
        $notification = new NewsNotification();
        $this->stdout('Поиск новых новостей' . PHP_EOL, Console::FG_YELLOW);
        $news = $notification->findNewNews();
        $findStr = count($news) ? 'Новых новостей: ' . count($news) : 'Новых новостей нет';

        $this->stdout($findStr . PHP_EOL, Console::FG_RED);
        if (!empty($news)) {

            $countProgress = count($news) - 1;
            $this->stdout('Отправка оповещений' . PHP_EOL, Console::FG_CYAN);
            Console::startProgress(0, $countProgress);

            for ($i = 0; $i < count($news); $i++) {
                $notification->notification($news[$i]->id);
                Console::updateProgress($i, $countProgress);
            }
            Console::endProgress(false);
            $this->stdout('Отправка завершена' . PHP_EOL, Console::FG_RED);
        }
    }
}