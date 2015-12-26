<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Список танков';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
			[
				'attribute' => 'tank_name',
				'contentOptions' => function($model, $key, $index, $column){
					//все танки, кроме легких - полужирным шрифтом
					return ['class' => $model->tankClass];
				},
			],
			'tankArmor',
			'tankGunLine',
			
        ],
		//'layout' => "{summary}\n{items}",
        'summary' => "Количество записей: {count} из {totalCount}.",
    ]); ?>

</div>
