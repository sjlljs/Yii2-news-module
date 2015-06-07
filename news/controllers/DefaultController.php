<?php

namespace common\modules\news\controllers;

use common\modules\news\models\news;
use common\modules\news\models\category;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\db\Query;

/**
 * DefaultController implements the CRUD actions for news model.
 */
class DefaultController extends Controller
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

    /**
     * Lists all news models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query=news::find();
        
        // режим просмотра по категориям 
        $get_cat=Yii::$app->request->get('cat');
        if ($get_cat) {
            $query=news::find()->where(['category_id'=>$get_cat]);
        } 

        // режим просмотра по году-месяцу 
        $get_year=Yii::$app->request->get('year');
        $get_month=Yii::$app->request->get('month');
        if ($get_year && $get_month) {
           $query=news::find()->where(["DATE_FORMAT(date,'%Y-%M')"=>"$get_year-$get_month"]);
        } else if ($get_year) {
           $query=news::find()->where(["DATE_FORMAT(date,'%Y')"=>$get_year]);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [ 
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 5,
            ],            
        ]);
        
        // счетчик публикаций по годам и месяцам
        $q = new Query;
        $years_months=$q->select('YEAR(date) as year, MONTHNAME(date) as month, COUNT(*) as count')
              ->from('{{%news}}')->groupBy('YEAR(date),MONTHNAME(date)')
              ->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => Category::find()->all(),
            'years_months' => $years_months,
        ]);
    }

    /**
     * Displays a single news model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the news model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return news the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = news::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
