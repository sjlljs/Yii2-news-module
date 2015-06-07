<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\news\models\news */

$this->title = $model->title;
?>
<div class="news-view">

    <h3><?= Html::encode($this->title) ?></h3>
    
    <p> <?= Yii::$app->formatter->asDate($model->date, 'long') ?> , <?= $model->category->name?>  </p>
    <p> <?= Html::encode($model->contshort)?> </p>
    <p align="right"> <?= Html::a('Читать далее >>>',['view','id'=>$model->id]) ?> </p>
</div>
