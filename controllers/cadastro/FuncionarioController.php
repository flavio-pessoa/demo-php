<?php

namespace app\controllers\cadastro;

use Yii;
use app\models\Funcionario;
use app\models\FuncionarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * FuncionarioController implements the CRUD actions for Funcionario model.
 */
class FuncionarioController extends Controller
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create','view', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single Funcionario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    
    /**
     * Lists all Funcionario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FuncionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Funcionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Funcionario();        
        if ($model->load(Yii::$app->request->post())) {
            $model->senha_funcionario = hash('sha512', $model->senha_funcionario);
            $model->status_funcionario = Funcionario::TIPO_STATUS_ATIVO;
            $model->save();
            return $this->redirect(['view', 'id' => $model->cod_funcionario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Funcionario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            $model->senha_funcionario = hash('sha512', $model->senha_funcionario);
            $model->status_funcionario = Funcionario::TIPO_STATUS_ATIVO;
            $model->save();
            return $this->redirect(['view', 'id' => $model->cod_funcionario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Funcionario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        $model->status_funcionario = Funcionario::TIPO_STATUS_INATIVO;
        
        $model->save();
        
        return $this->redirect ( [
            'index'
        ] );

        return $this->redirect(['index']);
    }

    /**
     * Finds the Funcionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Funcionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Funcionario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página requisitada não existe.');
    }
}
