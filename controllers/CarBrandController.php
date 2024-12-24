<?php

namespace app\controllers;

use app\models\CarBrand;
use app\models\CarBrandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarBrandController implements the CRUD actions for CarBrand model.
 */
class CarBrandController extends Controller
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
   * Lists all CarBrand models.
   *
   * @return string
   */
  public function actionIndex()
  {
    $searchModel = new CarBrandSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single CarBrand model.
   * @param int $car_brand_id Car Brand ID
   * @return string
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($car_brand_id)
  {
    return $this->render('view', [
      'model' => $this->findModel($car_brand_id),
    ]);
  }

  /**
   * Creates a new CarBrand model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return string|\yii\web\Response
   */
  public function actionCreate()
  {
    $model = new CarBrand();

    if ($this->request->isPost) {
      if ($model->load($this->request->post()) && $model->save()) {
        return $this->redirect(['view', 'car_brand_id' => $model->car_brand_id]);
      }
    } else {
      $model->loadDefaultValues();
    }

    return $this->render('create', [
      'model' => $model,
    ]);
  }

  /**
   * Updates an existing CarBrand model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param int $car_brand_id Car Brand ID
   * @return string|\yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($car_brand_id)
  {
    $model = $this->findModel($car_brand_id);

    if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
      return $this->redirect(['view', 'car_brand_id' => $model->car_brand_id]);
    }

    return $this->render('update', [
      'model' => $model,
    ]);
  }

  /**
   * Deletes an existing CarBrand model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param int $car_brand_id Car Brand ID
   * @return \yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($car_brand_id)
  {
    $this->findModel($car_brand_id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the CarBrand model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param int $car_brand_id Car Brand ID
   * @return CarBrand the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($car_brand_id)
  {
    if (($model = CarBrand::findOne(['car_brand_id' => $car_brand_id])) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
