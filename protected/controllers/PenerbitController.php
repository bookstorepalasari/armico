<?php

class PenerbitController extends Controller
{
        public $layout='//layouts/default';
        public $defaultAction='Admin';
        public $menuIndex = 1;
        public $accordionIndex = 0;
        public $menu_head;
        public $menu_action;

	public function filters()
	{
		return array(
		'accessControl', // perform access control for CRUD operations
		);
	}
        
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionView($id)
        {
            $this->menu_head = 'Penerbit';
            $this->menu_action = 'Detail';
            $detail = $this->loadModel($id);
            
            $this->render('view',array(
                'model'=>$detail,
            ));
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $this->menu_head = 'Penerbit';
            $this->menu_action = 'Tambah Penerbit';
            $model=new MPenerbit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MPenerbit']))
		{
			$model->attributes=$_POST['MPenerbit'];
            $model->penerbit = str_replace(",","",$_POST['MPenerbit']['penerbit']);
            if($model->save()){
				Yii::app()->user->setFlash('success',"Data Penerbit Tersimpan.");
				$this->redirect(array('admin'));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $this->menu_head = 'Penerbit';
            $this->menu_action = 'Update Penerbit';
            
            $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MPenerbit']))
		{
			$model->attributes=$_POST['MPenerbit'];
			if($model->save()){
                Yii::app()->user->setFlash('success',"Data Penerbit Tersimpan.");
                $this->redirect(array('admin'));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            $this->menu_head = 'List Data Penerbit';
		$model=new MPenerbit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['MPenerbit'])){
                    $search = isset($_POST['MPenerbit']['global_search'])?$_POST['MPenerbit']['global_search']:null;
                    if($search){
                        $models = MPenerbit::model()->globalSearch($search);
                        if(count($models)>0){
                            foreach($models as $i=>$model)
                            {
                                $attributes = $model->attributeNames();
                                foreach($attributes as $j=>$attribute) {
                                        $returnVal[$i]["$attribute"] = $model->$attribute;
                                }
                            }
                                $model->attributes=$returnVal;
                        }
                    }else{
                        $model->unsetAttributes();  // clear any default values
                    }
                }
                
		$this->render('admin',array(
			'model'=>$model,
                        'search'=>isset($search)?$search:''
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MPenerbit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MPenerbit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MPenerbit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='msupplier-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
