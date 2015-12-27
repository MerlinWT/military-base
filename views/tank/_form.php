<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="tank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tank_name')->textInput() ?>
    <?= $form->field($model, 'tankArmor')->textInput() ?>
    <?= $form->field($model, 'tankGunLine')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
