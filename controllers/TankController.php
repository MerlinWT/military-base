<?php

namespace app\controllers;

use Yii;
use app\models\Tank;
use app\models\TankSearch;
use app\models\TankCreate;
use app\models\Gun;
use yii\web\Controller;
use yii\filters\VerbFilter;

class TankController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new TankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	public function actionCreate(){
		$model = new TankCreate();
		if ($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['index']);
		}else{
			return $this->render('create', ['model' => $model]);
		}

	}
}
