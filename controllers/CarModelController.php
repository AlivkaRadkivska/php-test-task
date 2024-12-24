<?php

namespace app\controllers;

use app\models\CarModel;
use app\models\CarModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarModelController implements the CRUD actions for CarModel model.
 */
class CarModelController extends Controller
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
   * Lists all CarModel models.
   *
   * @return string
   */
  public function actionIndex()
  {
    $searchModel = new CarModelSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single CarModel model.
   * @param int $car_model_id Car Model ID
   * @return string
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($car_model_id)
  {
    return $this->render('view', [
      'model' => $this->findModel($car_model_id),
    ]);
  }

  /**
   * Creates a new CarModel model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return string|\yii\web\Response
   */
  public function actionCreate()
  {
    $model = new CarModel();

    if ($this->request->isPost) {
      if ($model->load($this->request->post()) && $model->save()) {
        return $this->redirect(['view', 'car_model_id' => $model->car_model_id]);
      }
    } else {
      $model->loadDefaultValues();
    }

    return $this->render('create', [
      'model' => $model,
    ]);
  }

  /**
   * Updates an existing CarModel model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param int $car_model_id Car Model ID
   * @return string|\yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($car_model_id)
  {
    $model = $this->findModel($car_model_id);

    if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
      return $this->redirect(['view', 'car_model_id' => $model->car_model_id]);
    }

    return $this->render('update', [
      'model' => $model,
    ]);
  }

  /**
   * Deletes an existing CarModel model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param int $car_model_id Car Model ID
   * @return \yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($car_model_id)
  {
    $this->findModel($car_model_id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the CarModel model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param int $car_model_id Car Model ID
   * @return CarModel the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($car_model_id)
  {
    if (($model = CarModel::findOne(['car_model_id' => $car_model_id])) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
