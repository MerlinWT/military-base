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
			'tank_name',
			'tankArmor',
			'tankGunLine',
			
        ],
		//'layout' => "{summary}\n{items}",
        'summary' => "Количество записей: {count} из {totalCount}.",
    ]); ?>

</div>
