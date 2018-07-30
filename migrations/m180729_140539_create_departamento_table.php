<?php

use yii\db\Migration;
use app\models\Departamento;

/**
 * Handles the creation of table `departamento`.
 */
class m180729_140539_create_departamento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('departamento', [
            'cod_departamento' => $this->primaryKey(),
            'nome_departamento' => $this->string(100)->notNull(),
            'status_departamento' => $this->char(1)->notNull(),
        ]);
        
        $this->insert('departamento', [
            'cod_departamento' => 1,
            'nome_departamento' => 'Administração',
            'status_departamento' => Departamento::TIPO_STATUS_ATIVO,
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('departamento');
    }
}
