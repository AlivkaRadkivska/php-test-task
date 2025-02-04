<?php

namespace app\controllers;

use app\models\Car;
use app\models\CarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarController implements the CRUD actions for Car model.
 */
class CarController extends Controller
{
  /**
   * @inheritDoc
   */
  public function behaviors()
  {
    return array_merge(
      parent::behaviors(),
      [
        'verbs' => [
          'class' => VerbFilter::className(),
          'actions' => [
            'delete' => ['POST'],
          ],
        ],
      ]
    );
  }

  /**
   * Lists all Car models.
   *
   * @return string
   */
  public function actionIndex()
  {
    $searchModel = new CarSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Car model.
   * @param int $car_id Car ID
   * @return string
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($car_id)
  {
    return $this->render('view', [
      'model' => $this->findModel($car_id),
    ]);
  }

  /**
   * Creates a new Car model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return string|\yii\web\Response
   */
  public function actionCreate()
  {
    $model = new Car();

    if ($this->request->isPost) {
      if ($model->load($this->request->post()) && $model->save()) {
        return $this->redirect(['view', 'car_id' => $model->car_id]);
      }
    } else {
      $model->loadDefaultValues();
    }

    return $this->render('create', [
      'model' => $model,
    ]);
  }

  /**
   * Updates an existing Car model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param int $car_id Car ID
   * @return string|\yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($car_id)
  {
    $model = $this->findModel($car_id);

    if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
      return $this->redirect(['view', 'car_id' => $model->car_id]);
    }

    return $this->render('update', [
      'model' => $model,
    ]);
  }

  /**
   * Deletes an existing Car model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param int $car_id Car ID
   * @return \yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($car_id)
  {
    $this->findModel($car_id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Car model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param int $car_id Car ID
   * @return Car the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($car_id)
  {
    if (($model = Car::findOne(['car_id' => $car_id])) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
