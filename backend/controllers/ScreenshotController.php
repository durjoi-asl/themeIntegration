<?php

namespace backend\controllers;
use backend\models\Screenshot;
use Yii;

class ScreenshotController extends \yii\web\Controller
{
  public function actionStore(){

    $model = new Screenshot();
    $model->image = Yii::$app->request->post('img');

    if ($model->save()) {
            return "OK";
        }

    return print_r(Yii::$app->request->post());
  }
}
