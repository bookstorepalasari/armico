<?php
/**
 * Class CustomFunction untuk menyimpan function PHP yg digunakan umum (semua module)
 * - mencari nilai tertentu
 * - menentukan nilai dari parameter
 */
class CustomFunction
{
    /**
     * Menghitung hari antara 2 tanggal
     * @param type $dateFrom
     * @param type $dateTo
     * @return type
     */
    public static function hitungHari($dateFrom,$dateTo=''){
        $dateTo = (!empty($dateTo)) ? strtotime($dateTo) : time(); // or your date as well
        $dateFrom = strtotime($dateFrom);
        $datediff = $dateTo - $dateFrom;
        $hari = floor($datediff/(60*60*24));
        return $hari;
    }
    
    /**
     * menampilkan module-module yang ada
     * @return type
     */
    public static function getModules()
    {
        $moduls = Yii::app()->metadata->getModules();
        foreach($moduls as $i=>$modul){
            $result[$modul] = $modul;
        }
        
        return $result;
    }
    
    /**
     * menampilkan controller dari module
     * @param type $namaModul 
     */
    public static function getControllers($namaModul)
    {        
        $controllers = Yii::app()->metadata->getControllers($namaModul);
        foreach($controllers as $i=>$controller){
            $controller = str_replace('Controller', '', $controller);
            $result[$controller] = $controller;
        }
        
        return $result;
    }
    
    /**
     * manempilkan action dari controller dan module
     * @param type $contorllerId
     * @param type $namaModul 
     */
    public static function getActions($contorllerId, $namaModul)
    {
        $result = array();
		
        $actions = Yii::app()->metadata->getActions(ucfirst($contorllerId).'Controller', $namaModul);
		foreach($actions as $i=>$action){
            $result[$action] = $action;
        }
        
        return $result;
    }
    
    /**
     * Menampilkan list nama hari
     * @return string
     */
    public static function getNamaHari()
    {
        $namaHari = array(
            'SENIN'=>'Senin',
            'SELASA'=>'Selasa',
            'RABU'=>'Rabu',
            'KAMIS'=>'Kamis',
            'JUMAT'=>'Jumat',
            'SABTU'=>'Sabtu',
            'MINGGU'=>'Minggu',
        );
        return $namaHari;
    }
    
    /**
     * menampilkan semua tahun dari $sebelumthn tahun sampai $setelahthn tahun dari tahun sekarang
     * @param type $sebelumthn
     * @param type $setelahthn
     */
    public static function getTahun($sebelumthn = null, $setelahthn = null){
        $rangeArr = range(2000,date("Y"));
        if(isset($sebelumthn) && empty($setelahthn))
            $rangeArr = range(date("Y", strtotime("-".$sebelumthn." years")),date("Y"));
        else if(empty($sebelumthn) && isset($setelahthn))
            $rangeArr = range(date("Y"),date("Y", strtotime("+".$setelahthn." years")));
        else if(isset($setelahthn) && isset($setelahthn))
            $rangeArr = range(date("Y", strtotime("-".$sebelumthn." years")),date("Y", strtotime("+".$setelahthn." years")));
        
        $tahunArr = array();
        foreach($rangeArr as $value){
            $tahunArr[$value] = $value;
        }
        return $tahunArr;
    }

     /**
     * menampilkan semua bulan
     */
    public static function getBulan(){
        $bulan = array(
                        '01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember'
            );
        return $bulan;
    }

    /**
     * menampilkan list angka dari $dari sampai $sampai
     * @param type $dari
     * @param type $sampai
     * @return array
     */
    public static function getDaftarAngka($dari = 1, $sampai = 20)
    {
        for ($i = $dari; $i <= $sampai; $i++) {
            $angka[$i] = $i;
        } 
        return $angka;
    }
    /**
     * menampilkan urutan dari angka kedalam text
     * @param type $dari
     * @param type $sampai
     * @return array | ex: [3]=>"ketiga"
     */
    public static function getNomorUrutText($dari = 1, $sampai = 20){
        $format = new MyFormatter();
        for ($i = $dari; $i <= $sampai; $i++) {
            $angka[$i] = "Ke".$format->kataTerbilang($i);
        } 
        return $angka;       
    }
    
    /*
     * Params ubah angka ke Romawi 
     */
    public static function Romawi($n){
		$n=(int)$n;
        $hasil = "";
        $iromawi =
        array("","I","II","III","IV","V","VI","VII","VIII","IX","X",
        20=>"XX",30=>"XXX",40=>"XL",50=>"L",60=>"LX",70=>"LXX",80=>"LXXX",
        90=>"XC",100=>"C",200=>"CC",300=>"CCC",400=>"CD",500=>"D",
        600=>"DC",700=>"DCC",800=>"DCCC",900=>"CM",1000=>"M",
        2000=>"MM",3000=>"MMM");

            if(array_key_exists($n,$iromawi)){
            $hasil = $iromawi[$n];
            }elseif($n >= 11 && $n <= 99){
            $i = $n % 10;
            $hasil = $iromawi[$n-$i] . self::Romawi($n % 10);
            }elseif($n >= 101 && $n <= 999){
            $i = $n % 100;
            $hasil = $iromawi[$n-$i] . self::Romawi($n % 100);
            }else{
            $i = $n % 1000;
            $hasil = $iromawi[$n-$i] . self::Romawi($n % 1000);
        }
        return $hasil;
    }
    
    /**
     * konversi character tertentu ke simbol yang diinginkan
     * @param type $string
     * @return type
     */
    public static function symbolsConverter($string){
            //== 1. replace ^($string) to <sup>($string)</sup> ==
            $value = preg_replace("/\^(\w*)/", "<sup>$1</sup>", $string);

            return $value;
    }
}
?>
