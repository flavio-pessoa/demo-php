<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */

$this->title = $model->nome_funcionario;
$this->params['breadcrumbs'][] = ['label' => 'Funcionario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod_funcionario',            
            'nome_funcionario',            
            'email_funcionario:email',
            'login_funcionario',            
            [
                'attribute' => 'status_funcionario',
                'value' => $model->getStatus(),
                'format' => 'text',
            ],
            'accessToken_funcionario',
            [
                'attribute' => 'codDepartamento.nome_departamento',
                'label' => 'Departamento',
            ],
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->cod_funcionario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->cod_funcionario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
