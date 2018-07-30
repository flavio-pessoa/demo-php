<?php

namespace app\controllers\api;

use yii\rest\ActiveController;
// use yii\web\Response;
use yii\filters\auth\HttpBasicAuth;

class FuncionarioController extends ActiveController
{
    public $modelClass = 'app\models\Funcionario';
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        
        // Trocar retorno para JSON
        /* $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]
        ]; */
        
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
        ];
        
        return $behaviors;
    } 

}

?>