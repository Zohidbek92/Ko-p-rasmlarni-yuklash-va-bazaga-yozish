<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($upload, 'rasm[]')->fileInput(['multiple' => true]) ?>

    <?= $form->field($upload, 'product_id')->dropdownList(ArrayHelper::map(\backend\models\Product::find()->all(), 'id', 'nomi_uz'), ['prompt' => "Mahsulotni tanlang"]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Yuklash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
