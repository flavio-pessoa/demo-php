<?php

namespace app\models;

use Yii;

/**
 * Esta é a classe de modelo para tabela "departamento".
 *
 * @property int $cod_departamento
 * @property string $nome_departamento
 * @property string $status_departamento
 *
 * @property Funcionario[] $funcionarios
 */
class Departamento extends \yii\db\ActiveRecord
{
    
    const TIPO_STATUS_INATIVO  = '0';
    const TIPO_STATUS_ATIVO    = '1';
    
    /**
     * Entrada para registrar as alterações do banco de dados
     */
    public function behaviors()
    {
        return [
            'bedezign\yii2\audit\AuditTrailBehavior'
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_departamento','status_departamento','vlr_limite_departamento'], 'required','message' => Yii::$app->params['campoObrigatorio']],
            [['nome_departamento'], 'string', 'max' => 100],
            [['status_departamento'], 'string', 'max' => 1],
            [['vlr_limite_departamento'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cod_departamento' => 'Codigo',
            'nome_departamento' => 'Nome',
            'status_departamento' => 'Status',
            'vlr_limite_departamento' => 'Limite de Gastos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['cod_departamento' => 'cod_departamento']);
    }

    /**
     * {@inheritdoc}
     * @return DepartamentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartamentoQuery(get_called_class());
    }
    
    public function getStatus()
    {
        if($this->status_departamento == self::TIPO_STATUS_INATIVO){
            return 'Inativo';
        }else{
            return 'Ativo';
        }
    }
    
    public function formatoReal($valor) {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
    
}
