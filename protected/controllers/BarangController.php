<?php

class BarangController extends Controller
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
				'actions'=>array('create','update','cetakBarcode','printBarcode'),
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
            $this->menu_head = 'Barang';
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
            $this->menu_head = 'Barang';
            $this->menu_action = 'Tambah Barang';
            $model=new MBarang;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MBarang']))
		{
			$model->attributes=$_POST['MBarang'];
                        $model->create_time = date("Y-m-d H:i:s");
                        $model->create_login = Yii::app()->user->id;
                        $model->diskon = $_POST['MBarang']['diskon'];
                        $model->harga_jual = str_replace(",","",$_POST['MBarang']['harga_jual']);
                        $model->harga_beli = str_replace(",","",$_POST['MBarang']['harga_beli']);
                        if($model->save()){
//				$this->redirect(array('view','id'=>$model->id));
                                Yii::app()->user->setFlash('success',"Data Barang Tersimpan.");
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
            $this->menu_head = 'Barang';
            $this->menu_action = 'Update Barang';
            
            $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MBarang']))
		{
			$model->attributes=$_POST['MBarang'];
			if($model->save()){
                            Yii::app()->user->setFlash('success',"Data Barang Tersimpan.");
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
            $this->menu_head = 'List Data Barang';
		$model=new MBarang('search');
		$model->unsetAttributes();  // clear any default values
                $modBarcode = new HistoryBarcode();
                $modBarcode->nama_toko = 'ARMICO';
                $modBarcode->panjang = 3.50;
                $modBarcode->lebar = 1.50;
		if(isset($_POST['MBarang'])){
                    $search = isset($_POST['MBarang']['global_search'])?$_POST['MBarang']['global_search']:null;
                    if($search){
                        $models = MBarang::model()->globalSearch($search);
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
                        'search'=>isset($search)?$search:'',
			'modBarcode'=>$modBarcode
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MBarang the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MBarang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MBarang $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mbarang-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionCetakBarcode(){
            if(Yii::app()->request->isAjaxRequest) {
                $modBarcode = new HistoryBarcode();
                $modBarcode->attributes = $_POST;
                $modBarcode->harga_jual = str_replace(",","",$_POST['harga_jual']);
                $modBarcode->save();
                
                echo CJSON::encode($modBarcode->id);
            }
            Yii::app()->end();
        }
        
        public function  actionPrintBarcode(){
            $model = HistoryBarcode::model()->barcodeData($_GET['id']);
            
            $this->renderPartial('print_barcode',array(
                    'model'=>$model
                )
            );
        }
}