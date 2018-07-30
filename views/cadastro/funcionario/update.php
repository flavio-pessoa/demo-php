<?php

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */

$this->params['breadcrumbs'][] = ['label' => 'Funcionario', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_funcionario, 'url' => ['view', 'id' => $model->cod_funcionario]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="funcionario-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
