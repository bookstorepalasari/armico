<?php
Class Params{
	const DATE_FORMAT = 'dd M yy';      //format default date untuk datepicker
    const TIME_FORMAT = 'H:i:s';        //format default time untuk datepicker
    const MONTH_FORMAT = 'M yy';        //format untuk monthpicker

    const TOOLTIP_PLACEMENT = 'bottom';                 //nilai konstanta tooltip placement untuk bootstrap tooltip
    const TOOLTIP_SELECTOR = 'a[rel="tooltip"],button[rel="tooltip"],input[rel="tooltip"]';        //nilai konstanta tooltip selector untuk bootstrap tooltip

    const KATEGORI_PEMAKAI_ADMIN = 1;
    const KATEGORI_PEMAKAI_KASIR = 2;
	
    public static function menu()
    {
        return array(
            array(
                'label'=>'Dashboard',
                'index'=>0,
                'url'=>'/dashboard',
                'icon'=>'entypo-gauge',
            ),
            array(
                'label'=>'Master',
                'index'=>1,
                'sub'=>array(
                    array('label'=>'Barang', 'url'=>'/barang'),
                    array('label'=>'Pelanggan', 'url'=>'/pelanggan'),
                    array('label'=>'Supplier', 'url'=>'/supplier'),
                    array('label'=>'Sales', 'url'=>'/sales'),
                    array('label'=>'Kategori Pemakai', 'url'=>'/kategoriPemakai'),
//                    array('label'=>'Cotoh Template Master', 'url'=>'dashboard/contohMaster'),
                ),
                'icon'=>'entypo-book',
            ),
            array(
                'label'=>'Transaksi',
                'index'=>2,
                'sub'=>array(
                    array('label'=>'Cotoh Template Transaksi', 'url'=>'dashboard/contohTransaksi'),
                ),
                'icon'=>'entypo-pencil',
            ),
            array(
                'label'=>'Informasi',
                'index'=>3,
                'sub'=>array(
                    array('label'=>'Cotoh Template Informasi', 'url'=>'dashboard/contohInformasi'),
                ),
                'icon'=>'entypo-list',
            ),
            array(
                'label'=>'Laporan',
                'index'=>4,
                'sub'=>array(
                    array('label'=>'Cotoh Template Laporan', 'url'=>'dashboard/contohLaporan'),
                ),
                'icon'=>'entypo-chart-bar',
            ),
        );
    }
}