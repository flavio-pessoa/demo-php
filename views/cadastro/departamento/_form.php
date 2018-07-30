<?php

use app\models\Departamento;
use kartik\money\MaskMoney;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamento-form">

	<h1><?= $model->isNewRecord ? 'Novo Departamento' : 'Atualizar Departamento'?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_departamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_departamento')->dropDownList([Departamento::TIPO_STATUS_ATIVO => 'Ativo', Departamento::TIPO_STATUS_INATIVO => 'Inativo', ], ['prompt' => 'Selecione Status...'])?>
    
    <?= $form->field($model, 'vlr_limite_departamento')->widget(MaskMoney::classname(), ['pluginOptions' => ['prefix' => 'R$ ','suffix' => '','thousands' => '.','decimal' => ',','precision' => 2,'allowZero' => false,'allowNegative' => false]]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
