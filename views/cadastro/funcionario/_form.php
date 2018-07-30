<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Departamento;
use app\models\Funcionario;
use kartik\password\PasswordInput;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionario-form">

	<h1><?= $model->isNewRecord ? 'Novo Funcionario' : 'Atualizar Funcionario'?></h1>

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $model->senha_funcionario = '';
	?>  

    <?= $form->field($model, 'nome_funcionario')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'email_funcionario')->input('email')?>

    <?= $form->field($model, 'login_funcionario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senha_funcionario')->widget(PasswordInput::classname(), ['pluginOptions' => ['language' => 'pt-BR','showMeter' => true,'toggleMask' => true ] ] )?>
    
    <?php
	   if (!$model->isNewRecord)
	       echo $form->field($model, 'status_funcionario')->dropDownList([
	           Funcionario::TIPO_STATUS_INATIVO => 'Inativo',
	           Funcionario::TIPO_STATUS_ATIVO => 'Ativo'
	       ], ['prompt' => 'Status'])
	?>

    <?= $form->field( $model, 'cod_departamento')->widget(Select2::classname(), [ 'data' => ArrayHelper::map(Departamento::find()->all(), 'cod_departamento', 'nome_departamento' ),'theme' => Select2::THEME_BOOTSTRAP,'options' => ['placeholder' => 'Selecione Departamento...' ],'pluginOptions' => [ 'allowClear' => true ] ] )->label('Departamento')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
