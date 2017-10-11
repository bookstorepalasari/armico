<?php

class DashboardController extends Controller
{
    /**
    * @var string the default layout for the views. Defaults to '//layouts/default', meaning
    * using two-column layout. See 'protected/views/layouts/default.php'.
    */    
    public $layout='//layouts/default';
    public $defaultAction='Index';
    public $menuIndex = 0;
    public $accordionIndex;
    public $menu_head = '';
    public $menu_action = '';

    public function actionIndex()
    {
        $this->render('dashboard',array());
    }
	
	public function actionContohMaster()
    {
		$model = new MKategoriPemakai();
		$this->menu_head = 'Contoh Template Master';
        $this->render('master',array('model'=>$model));
    }
	
	public function actionContohTransaksi()
    {
		$format = new Formatter();
		$model = new MKategoriPemakai();
		$this->menu_head = 'Contoh Template Transaksi';
        $this->render('transaksi',array('model'=>$model,'format'=>$format));
    }
	
	public function actionContohInformasi()
    {
		$format = new Formatter();
		$model = new MBarang();
		$this->menu_head = 'Contoh Template Informasi';
        $this->render('informasi',array('model'=>$model,'format'=>$format));
    }
	
	public function actionContohLaporan()
    {
		$format = new Formatter();
		$model = new MBarang();
		$this->menu_head = 'Contoh Template Laporan';
        $this->render('laporan',array('model'=>$model,'format'=>$format));
    }
}
