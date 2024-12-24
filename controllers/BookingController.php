<?php

namespace app\controllers;

use app\models\Booking;
use app\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
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
   * Lists all Booking models.
   *
   * @return string
   */
  public function actionIndex()
  {
    $searchModel = new BookingSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Booking model.
   * @param int $booking_id Booking ID
   * @return string
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($booking_id)
  {
    return $this->render('view', [
      'model' => $this->findModel($booking_id),
    ]);
  }

  /**
   * Creates a new Booking model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return string|\yii\web\Response
   */
  public function actionCreate()
  {
    $model = new Booking();

    if ($this->request->isPost) {
      if ($model->load($this->request->post()) && $model->save()) {
        return $this->redirect(['view', 'booking_id' => $model->booking_id]);
      }
    } else {
      $model->loadDefaultValues();
    }

    return $this->render('create', [
      'model' => $model,
    ]);
  }

  /**
   * Updates an existing Booking model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param int $booking_id Booking ID
   * @return string|\yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionUpdate($booking_id)
  {
    $model = $this->findModel($booking_id);

    if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
      return $this->redirect(['view', 'booking_id' => $model->booking_id]);
    }

    return $this->render('update', [
      'model' => $model,
    ]);
  }

  /**
   * Deletes an existing Booking model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param int $booking_id Booking ID
   * @return \yii\web\Response
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($booking_id)
  {
    $this->findModel($booking_id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Booking model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param int $booking_id Booking ID
   * @return Booking the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($booking_id)
  {
    if (($model = Booking::findOne(['booking_id' => $booking_id])) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
