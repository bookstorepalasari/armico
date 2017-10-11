<?php

class SupplierController extends Controller
{
        public $layout='//layouts/default';
        public $defaultAction='Admin';
        public $menuIndex = 1;
        public $accordionIndex = 2;
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
            $this->menu_head = 'Supplier';
            $this->menu_action = 'Detail';
            $detail = $this->loadModel($id);
            $detail->create_time = date("d M Y H:i:s", strtotime($detail->create_time));
            $detail->create_login = $detail->userPemakai->nama_pemakai;
            $detail->update_time = isset($detail->update_time) ? date("d M Y H:i:s", strtotime($detail->update_time)) : '-';
            $detail->update_login = isset($detail->update_login) ? $detail->userPemakai->nama_pemakai : '-';
            $detail->update_login = isset($detail->update_login) ? $detail->userPemakai->nama_pemakai : '-';
            $detail->update_login = isset($detail->update_login) ? $detail->userPemakai->nama_pemakai : '-';
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
            $this->menu_head = 'Supplier';
            $this->menu_action = 'Tambah Supplier';
		$model=new MSupplier;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MSupplier']))
		{
			$model->attributes=$_POST['MSupplier'];
                        $model->create_time = date("Y-m-d H:i:s");
                        $model->create_login = Yii::app()->user->id;
                        if($model->save()){
//				$this->redirect(array('view','id'=>$model->id));
                                Yii::app()->user->setFlash('success',"Data Supplier Tersimpan.");
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
            $this->menu_head = 'Supplier';
            $this->menu_action = 'Update Supplier';
            
            $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MSupplier']))
		{
			$model->attributes=$_POST['MSupplier'];
			if($model->save()){
                            Yii::app()->user->setFlash('success',"Data Supplier Tersimpan.");
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
            $this->menu_head = 'List Data Supplier';
		$model=new MSupplier('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['MSupplier'])){
                    $search = isset($_POST['MSupplier']['global_search'])?$_POST['MSupplier']['global_search']:null;
                    if($search){
                        $models = MSupplier::model()->globalSearch($search);
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
	 * @return MSupplier the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MSupplier::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MSupplier $model the model to be validated
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
