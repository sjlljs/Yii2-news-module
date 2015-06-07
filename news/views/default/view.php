<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\news\models\news */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p> <?= Yii::$app->formatter->asDate($model->date, 'long') ?> , <?= $model->category->name?>  </p>
    <p> <?= Html::encode($model->content)?> </p>
    
    <p align="center"> <?= Html::a('Все новости', ['index']) ?> </p>
    
</div>
