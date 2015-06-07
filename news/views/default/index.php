<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
 <table>
 <tr valign="top">
 <td>
     <?php
        $items = [];  
        
        $year=''; 
        $submenu=[];
        // выборка лет и месяцев    
        foreach($years_months as $ym) {
            if (!$year){
                $year=$ym['year'];
                $submenu=[]; 
            }
            if ($year!=$ym['year']){
                $items[] = [
                		'label' => "$year",
                    'url' => ['index', 'year' => "$year" ],
                    'items' => $submenu,
                ];  
                $year=$ym['year'];
                $submenu=[]; 
            } 
            
            $submenu[] = [
            		'label' => "$ym[month] ($ym[count])",
                'url' => ['index', 'year' => "$ym[year]",'month'=>"$ym[month]" ],
            ];  
        }
        $items[] = [
        		'label' => "$year",
            'url' => ['index', 'year' => "$year" ],
            'items' => $submenu,
        ];  
        
        // выборка всех категорий с количеством   
        foreach($categories as $category) {
              $items[] = [
              		'label' => "$category->name ($category->cnt)",
              		'url' => ['index', 'cat' => $category->id]
              ];
        }
    
        echo Menu::widget([
                  'options' => ['class' => 'navbar navbar-left'],
                  'items' => $items,
        ]); 
    ?>
</td>
<td>
 <div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_short_view',
    ]) ?>

</div>
</td>
</tr>
</table>