<?php

namespace frontend\controllers;

use app\models\CommunicationMembers;
use Yii;
use app\models\Customer;
use app\models\CustomerContacts;
use app\models\Project;
use app\models\ProjectTeam;
use app\models\Roles;
use app\models\Communication;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{

    public $layout = 'newmain';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        $model = new Project();
        $dataProvider = $model->findAll('1');

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'newmain';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idproject]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idproject]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTeam($id)
    {
        $model = new ProjectTeam();

        if($model->load(yii::$app->request->post()) && $model->save()){
            //return $this->redirect(['index']);
        }
        $team = ProjectTeam::find($id)->joinWith(['user', 'role'])->all();
        $excludeIds = $model->exludeIds($team);

        $users = User::find()->where('id NOT IN ('.$excludeIds.')')->all();
        $roles = Roles::find()->all();
        $projects = Project::find()->all();

        return $this->render('team', [
            'users' => $users,
            'team' => $team,
            'roles' => $roles,
            'model' => $model,
            'projects' => $projects,
        ]);
    }

    public function actionCustomer($id)
    {
        $project = Project::find($id)->one();
        $customer = Customer::find($project->customer_id)->one();
        $customer_contacts = CustomerContacts::findAll(['customer_id' => $customer->idcustomer]);
        return $this->render('customer',[
            'customer' => $customer,
            'customer_contacts' => $customer_contacts,
        ]);
    }

    public function actionRoles()
    {
        $this->layout = 'main';
        $roles = new Roles();
        $request = yii::$app->request->post();

        if ($roles->load($request)){
            $roles->save();
            return $this->redirect(['roles']);
        }


        return $this->render('roles', [
            'roles' => Roles::find()->all(),
            'rolesModel' => $roles,
        ]);
    }

    public function actionCommunication($id)
    {
        $communication_model = new Communication();
        $communication_members_model = new CommunicationMembers();

        $request = yii::$app->request->post();

        if($request)
            $request['Communication']['communication_date'] = strtotime($request['Communication']['communication_date']);

        if($communication_model->load($request) && $communication_model->save())
        {
            $request['CommunicationMembers']['communication_id'] = $communication_model->idcommunication;
            $member_ids = $request['CommunicationMembers']['user_id'];
            foreach($member_ids as $member_id){
                $request['CommunicationMembers']['user_id'] = $member_id;
                $communication_members_model_tmp = new CommunicationMembers();
                if($communication_members_model_tmp->load($request) && $communication_members_model_tmp->save())
                    echo 1;
            }
        }



        return $this->render('communication', [
            'communication_model' => $communication_model,
            'communication_members_model' => $communication_members_model,
            'communications' => Communication::find()->where('project_id = :id' , [':id' => $id])->joinWith('communicationMembers')->joinWith('user')->all(),
            'members' => ProjectTeam::find()->where('project_id = :id', [':id' => $id])->joinWith('user')->all(),
            //'members' => User::find()->where('project_id = :id', [':id' => $id])->joinWith('user')->all(),
        ]);
    }
}
