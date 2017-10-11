<?php
Class MyGenerator{

    public static function kodePelanggan() // setiap ganti bulan, reset ke $default
    {
        $tahun        = date('Y');
        $bulan          = date('m');
        $default        = "000001";
        $prefix         = $tahun.$bulan;
        $sqlKodePelanggan    = " SELECT CAST(MAX(SUBSTR(kode,".(strlen($prefix)+1).",".(strlen($default)).")) AS integer) nomaksimal
                            FROM m_pelanggan 
                            WHERE kode LIKE ('".$prefix."%')";
        $kodePelanggan       = Yii::app()->db->createCommand($sqlKodePelanggan)->queryRow();
        $kode_pelanggan_baru = $prefix.(isset($kodePelanggan['nomaksimal']) ? (str_pad($kodePelanggan['nomaksimal']+1, strlen($default), 0, STR_PAD_LEFT)):$default);
        return trim($kode_pelanggan_baru);
    }
}

