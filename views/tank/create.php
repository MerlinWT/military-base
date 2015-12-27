<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tank */

$this->title = 'Дабавить танк';
$this->params['breadcrumbs'][] = ['label' => 'Танки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
