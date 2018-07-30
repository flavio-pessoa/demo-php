<?php

use yii\db\Migration;
use app\models\Funcionario;

/**
 * Handles the creation of table `funcionario`.
 */
class m180729_165804_create_funcionario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('funcionario', [
            'cod_funcionario' => $this->primaryKey(),
            'cod_departamento' => $this->integer()->notNull(),
            'nome_funcionario' => $this->string(200)->notNull(),
            'email_funcionario' => $this->string(100),
            'login_funcionario' => $this->string(20)->notNull(),
            'senha_funcionario' => $this->string(128)->notNull(),
            'status_funcionario' => $this->char(1)->notNull(),
            'authKey_funcionario' => $this->string(128)->notNull(),
            'accessToken_funcionario' => $this->string(128)->notNull(),
        ]);
        
        $this->addForeignKey('fk_departamento_funcionario', 'funcionario', 'cod_departamento', 'departamento', 'cod_departamento');
        
        $this->insert('funcionario', [
            'cod_funcionario' => 1,
            'cod_departamento' => 1,
            'nome_funcionario' => 'Administrador Geral',
            'email_funcionario' => 'admin@example.com.br',
            'login_funcionario'  => 'admin',
            'senha_funcionario'  => hash('sha512', '12345678'),
            'status_funcionario' => Funcionario::TIPO_STATUS_ATIVO,
            'authKey_funcionario'  => 'etSxB05sOu8HG8qA1BPHY2XPk42xp4TC',
            'accessToken_funcionario' => 'm_EX9P2rGiy7hZUHwyFAtgwrBxCJTI7R',            
        ]);
        
        $this->insert('funcionario', [
            'cod_funcionario' => 2,
            'cod_departamento' => 1,
            'nome_funcionario' => 'FLAVIO LUIS LOPES PESSOA',
            'email_funcionario' => 'flavio.pessoa@example.com.br',
            'login_funcionario'  => 'flavio.pessoa',
            'senha_funcionario'  => hash('sha512', '12345678'),
            'status_funcionario' => Funcionario::TIPO_STATUS_ATIVO,
            'authKey_funcionario'  => '1UjD5n8W6-7eoAVIqCAZvD83wQNlZ5_d',
            'accessToken_funcionario' => 'gfg9DwV_pUEh4yXZFP4bvm2FXe5KkCyl',
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('funcionario');
    }
}
