<?php

namespace app\controllers\api;

use yii\rest\ActiveController;
// use yii\web\Response;
use yii\filters\auth\HttpBasicAuth;

class DepartamentoController extends ActiveController
{
    public $modelClass = 'app\models\Departamento';
    
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