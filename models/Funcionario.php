<?php

namespace app\models;

use Yii;

/**
 * Esta é a classe de modelo para tabela "funcionario".
 *
 * @property int $cod_funcionario
 * @property int $cod_departamento
 * @property string $nome_funcionario
 * @property string $email_funcionario
 * @property string $login_funcionario
 * @property string $senha_funcionario
 * @property string $status_funcionario
 * @property string $authKey_funcionario
 * @property string $accessToken_funcionario
 *
 * @property Departamento $codDepartamento
 */
class Funcionario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_departamento'], 'integer'],
            [['nome_funcionario', 'status_funcionario'], 'required','message' => Yii::$app->params['campoObrigatorio']],
            [['nome_funcionario'], 'string', 'max' => 200],
            [['email_funcionario'], 'string', 'max' => 100],
            [['login_funcionario'], 'string', 'max' => 20],
            [['senha_funcionario'], 'string', 'max' => 128],
            [['authKey_funcionario'], 'string', 'max' => 128],
            [['accessToken_funcionario'], 'string', 'max' => 128],
            [['status_funcionario'], 'string', 'max' => 1],
            [['cod_departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['cod_departamento' => 'cod_departamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cod_funcionario' => 'Codigo',
            'cod_departamento' => 'Departamento',
            'nome_funcionario' => 'Nome',            
            'email_funcionario' => 'Email',
            'login_funcionario' => 'Login',
            'senha_funcionario' => 'Senha',
            'status_funcionario' => 'Status',
            'accessToken_funcionario' => 'Token',            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['cod_departamento' => 'cod_departamento']);
    }

    /**
     * {@inheritdoc}
     * @return FuncionarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FuncionarioQuery(get_called_class());
    }
    
    public function getStatus()
    {
        if($this->status_funcionario == self::TIPO_STATUS_INATIVO){
            return 'Inativo';
        }else{
            return 'Ativo';
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['accessToken_funcionario' => $token,'status_funcionario' => self::TIPO_STATUS_ATIVO]);        
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {        
        return self::findOne(['login_funcionario' => $username,'status_funcionario' => self::TIPO_STATUS_ATIVO]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->cod_funcionario;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey_funcionario;
    }
    
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey_funcionario === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha_funcionario === hash('sha512', $password);
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey_funcionario = Yii::$app->getSecurity()->generateRandomString();
                $this->accessToken_funcionario = Yii::$app->getSecurity()->generateRandomString();
            }
            return true;
        }
        return false;
    }

}
