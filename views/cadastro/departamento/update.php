<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = 'Atualizar Departamento: ' . $model->nome_departamento;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_departamento, 'url' => ['view', 'id' => $model->cod_departamento]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="departamento-update">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
