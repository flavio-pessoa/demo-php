<?php

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */

$this->title = 'Criar Funcionario';
$this->params['breadcrumbs'][] = ['label' => 'Funcionario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
