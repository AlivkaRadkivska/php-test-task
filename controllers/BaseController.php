<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
  public function beforeAction($action)
  {
    $language = Yii::$app->request->get('language', Yii::$app->session->get('language', 'en'));
    Yii::$app->language = $language;
    Yii::$app->session->set('language', $language);

    return parent::beforeAction($action);
  }
}
