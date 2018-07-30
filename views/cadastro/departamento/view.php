<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = $model->nome_departamento;
$this->params['breadcrumbs'][] = ['label' => 'Departamento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-view">    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod_departamento',
            'nome_departamento',         
            [
                'attribute' => 'vlr_limite_departamento',
                'value' => $model->formatoReal($model->vlr_limite_departamento),
                'format' => 'text',
            ],
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->cod_departamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->cod_departamento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
