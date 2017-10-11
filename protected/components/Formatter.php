<?php 
/**
 * - format tanggal
 * - format angka
 */
class Formatter extends CFormatter
{
    /**
     * untuk format database
     * @param type $inputdatetime = date or datetime
     * 1) d-M-Y | '15-Jan-2014'
     * 2) d-m-Y | '15-01-2014'
     * 3) Y-M-d | '2014-Jan-15'
     * 4) Y-m-d | '2014-01-15'
     * 5) d/M/Y | '15/Jan/2014'
     * 6) d/m/Y | '15/01/2014'
     * 7) Y/M/d | '2014/Jan/15'
     * 8) Y/m/d | '2014/01/15'
     * 9) d M Y | '15 Jan 2014'
     * 10) d m Y | '15 01 2014'
     * 11) Y M d | '2014 Jan 15'
     * 12) Y m d | '2014 01 15'
     * M = Jan = January = Januari
     * @return type $return Y-m-d | '2014-01-15'
     */
    public static function formatDateTimeForDb($inputdatetime)
    {
        if(empty($inputdatetime)) 
            return null;
        $datetime = explode('/',trim($inputdatetime));
        if(count($datetime) > 1)
            $inputdatetime = str_replace ("/", "-", $inputdatetime);
        $datetime = explode(' ',trim($inputdatetime));
        $return = null;
        if(strlen($datetime[0]) > 9){
            $date = explode('-',trim($datetime[0]));
            if(strlen($date[1]) > 2) 
                if(strlen($date[0])>3)//ex:2014-Jan-15
                    $return = $date[0]."-".self::getMonthDb($date[1])."-".self::getTwoDigit($date[2]).(isset($datetime[1]) ? " ".$datetime[1]:"");
                else//ex:15-Jan-2014
                    $return = $date[2]."-".self::getMonthDb($date[1])."-".self::getTwoDigit($date[0]).(isset($datetime[1]) ? " ".$datetime[1]:"");
            else{ 
                if(strlen($date[0])>3)//ex:2014-01-15
                    $return = $inputdatetime;
                else//ex:15-01-2014
                    $return = $date[2]."-".$date[1]."-".$date[0].(isset($datetime[1]) ? " ".$datetime[1]:"");
            }
        }else{
            if(strlen($datetime[0]) > 3){ //ex: 2014 Jan 15 | 2014 01 15
                $return = $datetime[0]."-".self::getMonthDb($datetime[1])."-".self::getTwoDigit($datetime[2]).(isset($datetime[3]) ? " ".$datetime[3]:"");
            }else{ //ex: 15 Jan 2014 | 15 01 2014
                $return = $datetime[2]."-".self::getMonthDb($datetime[1])."-".self::getTwoDigit($datetime[0]).(isset($datetime[3]) ? " ".$datetime[3]:"");
            }
        }
        return $return;
    }
    
    /**
     * merubah format bulan untuk database (tanpa hari)
     * @param type $inputmonth = "m-Y" | "M-Y" | "m Y" | "M Y" | "m/Y" | "M/Y" | "Y-m" | ...
     * @return type '2012-04'
     */
    public static function formatMonthForDb($inputmonth)
    {
        if(empty($inputmonth)) 
            return null;
        $return = null;
        $month = explode("/",$inputmonth);
        if(count($month) > 1)
            $inputmonth = str_replace ("/", "-", $inputmonth);
        $month = explode(' ', trim($inputmonth));
        if (count($month) == 1){
            $month = explode("-",$inputmonth);
        }
        if (count($month) > 1){
            if(is_numeric($month[0])){
                $return = $month[0]."-".self::getMonthDb($month[1]);
            }else{
                $return = $month[1]."-".self::getMonthDb($month[0]);
            }
        }
        return $return;
    }
    
    /**
     * untuk format user (indonesia)
     * @param type $inputdatetime = date or datetime
     * 1) d-M-Y | '15-Jan-2014'
     * 2) d-m-Y | '15-01-2014'
     * 3) Y-M-d | '2014-Jan-15'
     * 4) Y-m-d | '2014-01-15'
     * 5) d/M/Y | '15/Jan/2014'
     * 6) d/m/Y | '15/01/2014'
     * 7) Y/M/d | '2014/Jan/15'
     * 8) Y/m/d | '2014/01/15'
     * 9) d M Y | '15 Jan 2014'
     * 10) d m Y | '15 01 2014'
     * 11) Y M d | '2014 Jan 15'
     * 12) Y m d | '2014 01 15'
     * M = Jan = January = Januari
     * @return type $return d M Y | '15 Jan 2014' (Indonesia)
     */
    public static function formatDateTimeForUser($inputdatetime)
    {
        if(empty($inputdatetime)) 
            return null;
        $datetime = explode('/',trim($inputdatetime));
        if(count($datetime) > 1)
            $inputdatetime = str_replace ("/", "-", $inputdatetime);
        $datetime = explode(' ',trim($inputdatetime));
        $return = null;
        if(strlen($datetime[0]) > 9){
            $date = explode('-',trim($datetime[0]));
            if(strlen($date[1]) > 2) 
                if(strlen($date[0])>3)//ex:2014-Jan-15
                    $return = $date[2]." ".self::getMonthUser($date[1])." ".$date[0].(isset($datetime[1]) ? " ".$datetime[1]:"");
                else//ex:15-Jan-2014
                    $return = $date[0]." ".self::getMonthUser($date[1])." ".$date[2].(isset($datetime[1]) ? " ".$datetime[1]:"");
            else{ 
                if(strlen($date[0])>3)//ex:2014-01-15
                    $return = $date[2]." ".self::getMonthUser($date[1])." ".$date[0].(isset($datetime[1]) ? " ".$datetime[1]:"");
                else//ex:15-01-2014
                    $return = $date[0]." ".self::getMonthUser($date[1])." ".$date[2].(isset($datetime[1]) ? " ".$datetime[1]:"");
            }
        }else{
            if(strlen($datetime[0]) > 3){ //ex: 2014 Jan 15 | 2014 01 15
                $return = $datetime[2]." ".self::getMonthUser($datetime[1])." ".$datetime[0].(isset($datetime[3]) ? " ".$datetime[3]:"");
            }else{ //ex: 15 Jan 2014 | 15 01 2014
                $return = $datetime[0]." ".self::getMonthUser($datetime[1])." ".$datetime[2].(isset($datetime[3]) ? " ".$datetime[3]:"");
            }
        }
        return $return;
    }
    
    /**
     * merubah format bulan untuk user (tanpa hari)
     * @param type $inputmonth = "m-Y" | "M-Y" | "m Y" | "M Y" | "m/Y" | "M/Y" | "Y-m" | ...
     * @return type 'Jan 2012'
     */
    public static function formatMonthForUser($inputmonth)
    {
        if(empty($inputmonth)) 
            return null;
        $return = null;
        $month = explode("/",$inputmonth);
        if(count($month) > 1)
            $inputmonth = str_replace ("/", "-", $inputmonth);
        $month = explode(' ', trim($inputmonth));
        if (count($month) == 1){
            $month = explode("-",$inputmonth);
        }
        if (count($month) > 1){
            if(strlen($month[0]) == 4){
                $return = self::getMonthUser($month[1])." ".$month[0];
            }else{
                $return = self::getMonthUser($month[0])." ".$month[1];
            }
        }
        return $return;
    }
    
    /**
     * untuk format user (indonesia)
     * @param type $inputdatetime = date or datetime
     * 1) d-M-Y | '15-Jan-2014'
     * 2) d-m-Y | '15-01-2014'
     * 3) Y-M-d | '2014-Jan-15'
     * 4) Y-m-d | '2014-01-15'
     * 5) d/M/Y | '15/Jan/2014'
     * 6) d/m/Y | '15/01/2014'
     * 7) Y/M/d | '2014/Jan/15'
     * 8) Y/m/d | '2014/01/15'
     * 9) d M Y | '15 Jan 2014'
     * 10) d m Y | '15 01 2014'
     * 11) Y M d | '2014 Jan 15'
     * 12) Y m d | '2014 01 15'
     * M = Jan = January = Januari
     * @return type $return '15 Januari 2014' (Indonesia)
     */
    public static function formatDateTimeId($inputdatetime)
    {
        if(empty($inputdatetime)) 
            return null;
        $datetime = explode('/',trim($inputdatetime));
        if(count($datetime) > 1)
            $inputdatetime = str_replace ("/", "-", $inputdatetime);
        $datetime = explode(' ',trim($inputdatetime));
        $return = null;
        if(strlen($datetime[0]) > 9){
            $date = explode('-',trim($datetime[0]));
            if(strlen($date[1]) > 2) 
                if(strlen($date[0])>3)//ex:2014-Jan-15
                    $return = $date[2]." ".self::getMonthId($date[1])." ".$date[0].(isset($datetime[1]) ? " ".$datetime[1]:"");
                else//ex:15-Jan-2014
                    $return = $date[0]." ".self::getMonthId($date[1])." ".$date[2].(isset($datetime[1]) ? " ".$datetime[1]:"");
            else{ 
                if(strlen($date[0])>3)//ex:2014-01-15
                    $return = $date[2]." ".self::getMonthId($date[1])." ".$date[0].(isset($datetime[1]) ? " ".$datetime[1]:"");
                else//ex:15-01-2014
                    $return = $date[0]." ".self::getMonthId($date[1])." ".$date[2].(isset($datetime[1]) ? " ".$datetime[1]:"");
            }
        }else{
            if(strlen($datetime[0]) > 3){ //ex: 2014 Jan 15 | 2014 01 15
                $return = $datetime[2]." ".self::getMonthId($datetime[1])." ".$datetime[0].(isset($datetime[3]) ? " ".$datetime[3]:"");
            }else{ //ex: 15 Jan 2014 | 15 01 2014
                $return = $datetime[0]." ".self::getMonthId($datetime[1])." ".$datetime[2].(isset($datetime[3]) ? " ".$datetime[3]:"");
            }
        }
        return $return;
    }
    
    /**
     * untuk format user (english)
     * @param type $inputdatetime = date or datetime
     * 1) d-M-Y | '15-Jan-2014'
     * 2) d-m-Y | '15-01-2014'
     * 3) Y-M-d | '2014-Jan-15'
     * 4) Y-m-d | '2014-01-15'
     * 5) d/M/Y | '15/Jan/2014'
     * 6) d/m/Y | '15/01/2014'
     * 7) Y/M/d | '2014/Jan/15'
     * 8) Y/m/d | '2014/01/15'
     * 9) d M Y | '15 Jan 2014'
     * 10) d m Y | '15 01 2014'
     * 11) Y M d | '2014 Jan 15'
     * 12) Y m d | '2014 01 15'
     * M = Jan = January = Januari
     * @return type $return '15 January 2014' (English)
     */
    public static function formatDateTimeEn($inputdatetime)
    {
        if(empty($inputdatetime)) 
            return null;
        $datetime = explode('/',trim($inputdatetime));
        if(count($datetime) > 1)
            $inputdatetime = str_replace ("/", "-", $inputdatetime);
        $datetime = explode(' ',trim($inputdatetime));
        $return = null;
        if(strlen($datetime[0]) > 9){
            $date = explode('-',trim($datetime[0]));
            if(strlen($date[1]) > 2) 
                if(strlen($date[0])>3)//ex:2014-Jan-15
                    $return = $date[2]." ".self::getMonthEn($date[1])." ".$date[0].(isset($datetime[1]) ? " ".$datetime[1]:"");
                else//ex:15-Jan-2014
                    $return = $date[0]." ".self::getMonthEn($date[1])." ".$date[2].(isset($datetime[1]) ? " ".$datetime[1]:"");
            else{ 
                if(strlen($date[0])>3)//ex:2014-01-15
                    $return = $date[2]." ".self::getMonthEn($date[1])." ".$date[0].(isset($datetime[1]) ? " ".$datetime[1]:"");
                else//ex:15-01-2014
                    $return = $date[0]." ".self::getMonthEn($date[1])." ".$date[2].(isset($datetime[1]) ? " ".$datetime[1]:"");
            }
        }else{
            if(strlen($datetime[0]) > 3){ //ex: 2014 Jan 15 | 2014 01 15
                $return = $datetime[2]." ".self::getMonthEn($datetime[1])." ".$datetime[0].(isset($datetime[3]) ? " ".$datetime[3]:"");
            }else{ //ex: 15 Jan 2014 | 15 01 2014
                $return = $datetime[0]." ".self::getMonthEn($datetime[1])." ".$datetime[2].(isset($datetime[3]) ? " ".$datetime[3]:"");
            }
        }
        return $return;
    }
    
    /**
     * @param type $month M = 1 | 01 | Jan | Januari | January
     * @return string m = 01
     */
    public static function getMonthDb($inputmonth)
    {
        if(empty($inputmonth)) 
            return null;
        $return = null;
        $month = strtolower(trim($inputmonth));
        switch($month){
            case '1' : $return = '01'; break;
            case 'jan' : $return = '01'; break;
            case 'januari' : $return = '01'; break;
            case 'january' : $return = '01'; break;
            case '2' : $return = '02'; break;
            case 'feb' : $return = '02'; break;
            case 'februari' : $return = '02'; break;
            case 'february' : $return = '02'; break;
            case '3' : $return = '03'; break;
            case 'mar' : $return = '03'; break;
            case 'maret' : $return = '03'; break;
            case 'march' : $return = '03'; break;
            case '4' : $return = '04'; break;
            case 'apr' : $return = '04'; break;
            case 'april' : $return = '04'; break;
            case '5' : $return = '05'; break;
            case 'mei' : $return = '05'; break;
            case 'may' : $return = '05'; break;
            case '6' : $return = '06'; break;
            case 'jun' : $return = '06'; break;
            case 'juni' : $return = '06'; break;
            case 'june' : $return = '06'; break;
            case '7' : $return = '07'; break;
            case 'jul' : $return = '07'; break;
            case 'juli' : $return = '07'; break;
            case 'july' : $return = '07'; break;
            case '8' : $return = '08'; break;
            case 'aug' : $return = '08'; break;
            case 'agt' : $return = '08'; break;
            case 'ags' : $return = '08'; break;
            case 'agu' : $return = '08'; break;
            case 'agus' : $return = '08'; break;
            case 'agustus' : $return = '08'; break;
            case 'august' : $return = '08'; break;
            case '9' : $return = '09'; break;
            case 'sep' : $return = '09'; break;
            case 'september' : $return = '09'; break;
            case 'okt' : $return = '10'; break;
            case 'oct' : $return = '10'; break;
            case 'oktober' : $return = '10'; break;
            case 'october' : $return = '10'; break;
            case 'nop' : $return = '11'; break;
            case 'nov' : $return = '11'; break;
            case 'nopember' : $return = '11'; break;
            case 'november' : $return = '11'; break;
            case 'des' : $return = '12'; break;
            case 'dec' : $return = '12'; break;
            case 'desember' : $return = '12'; break;
            case 'december' : $return = '12'; break;
            default : $return = $inputmonth; break;
        }
        return $return;
    }
    
    /**
     * Untuk menampilkan hari ini dalam bahasa indonesia
     * @param type $day w = 0 - 6
     * @return string D = Senin
     */
    public static function getDayUser($hari)
    {
        switch ($hari){
            case 0 : $hari="Minggu";
                Break;
            case 1 : $hari="Senin";
                Break;
            case 2 : $hari="Selasa";
                Break;
            case 3 : $hari="Rabu";
                Break;
            case 4 : $hari="Kamis";
                Break;
            case 5 : $hari="Jumat";
                Break;
            case 6 : $hari="Sabtu";
                Break;
        }
        return $hari;
    }

    /**
     * @param type $month m = 01 | 1 | Jan | Januari | January
     * @return string M = Jan
     */
    public static function getMonthUser($inputmonth)
    {
        if(empty($inputmonth)) 
            return null;
        $return = null;
        $month = strtolower(trim($inputmonth));
        switch($month){
            case '1' : $return = 'Jan'; break;
            case '01' : $return = 'Jan'; break;
            case 'januari' : $return = 'Jan'; break;
            case 'january' : $return = 'Jan'; break;
            case '2' : $return = 'Feb'; break;
            case '02' : $return = 'Feb'; break;
            case 'februari' : $return = 'Feb'; break;
            case 'february' : $return = 'Feb'; break;
            case '3' : $return = 'Mar'; break;
            case '03' : $return = 'Mar'; break;
            case 'maret' : $return = 'Mar'; break;
            case 'march' : $return = 'Mar'; break;
            case '4' : $return = 'Apr'; break;
            case '04' : $return = 'Apr'; break;
            case 'april' : $return = 'Apr'; break;
            case '5' : $return = 'Mei'; break;
            case '05' : $return = 'Mei'; break;
            case 'may' : $return = 'Mei'; break;
            case '6' : $return = 'Jun'; break;
            case '06' : $return = 'Jun'; break;
            case 'juni' : $return = 'Jun'; break;
            case 'june' : $return = 'Jun'; break;
            case '7' : $return = 'Jul'; break;
            case '07' : $return = 'Jul'; break;
            case 'juli' : $return = 'Jul'; break;
            case 'july' : $return = 'Jul'; break;
            case '8' : $return = 'Agus'; break;
            case '08' : $return = 'Agus'; break;
            case 'agt' : $return = 'Agus'; break;
            case 'agu' : $return = 'Agus'; break;
            case 'aug' : $return = 'Agus'; break;
            case 'agustus' : $return = 'Agus'; break;
            case 'august' : $return = 'Agus'; break;
            case '9' : $return = 'Sep'; break;
            case '09' : $return = 'Sep'; break;
            case 'september' : $return = 'Sep'; break;
            case '10' : $return = 'Okt'; break;
            case 'oct' : $return = 'Okt'; break;
            case 'oktober' : $return = 'Okt'; break;
            case 'october' : $return = 'Okt'; break;
            case '11' : $return = 'Nop'; break;
            case 'nov' : $return = 'Nop'; break;
            case 'nopember' : $return = 'Nop'; break;
            case 'november' : $return = 'Nop'; break;
            case '12' : $return = 'Des'; break;
            case 'dec' : $return = 'Des'; break;
            case 'desember' : $return = 'Des'; break;
            case 'december' : $return = 'Des'; break;
            default : $return = $inputmonth; break;
        }
        return $return;
    }

    /**
     * Format bulan Indonesia
     * @param type $month m = 01 | 1 | Jan | Januari | January
     * @return string M = Januari
     */
    public static function getMonthId($inputmonth)
    {
        if(empty($inputmonth)) 
            return null;
        $return = null;
        $month = strtolower(trim($inputmonth));
        switch($month){
            case '1' : $return = 'Januari'; break;
            case '01' : $return = 'Januari'; break;
            case 'januari' : $return = 'Januari'; break;
            case 'january' : $return = 'Januari'; break;
            case '2' : $return = 'Februari'; break;
            case '02' : $return = 'Februari'; break;
            case 'februari' : $return = 'Februari'; break;
            case 'february' : $return = 'Februari'; break;
            case '3' : $return = 'Maret'; break;
            case '03' : $return = 'Maret'; break;
            case 'maret' : $return = 'Maret'; break;
            case 'march' : $return = 'Maret'; break;
            case '4' : $return = 'April'; break;
            case '04' : $return = 'April'; break;
            case 'april' : $return = 'April'; break;
            case '5' : $return = 'Mei'; break;
            case '05' : $return = 'Mei'; break;
            case 'may' : $return = 'Mei'; break;
            case '6' : $return = 'Juni'; break;
            case '06' : $return = 'Juni'; break;
            case 'juni' : $return = 'Juni'; break;
            case 'june' : $return = 'Juni'; break;
            case '7' : $return = 'Juli'; break;
            case '07' : $return = 'Juli'; break;
            case 'juli' : $return = 'Juli'; break;
            case 'july' : $return = 'Juli'; break;
            case '8' : $return = 'Agustus'; break;
            case '08' : $return = 'Agustus'; break;
            case 'agt' : $return = 'Agustus'; break;
            case 'agu' : $return = 'Agustus'; break;
            case 'aug' : $return = 'Agustus'; break;
            case 'agustus' : $return = 'Agustus'; break;
            case 'august' : $return = 'Agustus'; break;
            case '9' : $return = 'September'; break;
            case '09' : $return = 'September'; break;
            case 'september' : $return = 'September'; break;
            case '10' : $return = 'Oktober'; break;
            case 'oct' : $return = 'Oktober'; break;
            case 'oktober' : $return = 'Oktober'; break;
            case 'october' : $return = 'Oktober'; break;
            case '11' : $return = 'Nopember'; break;
            case 'nov' : $return = 'Nopember'; break;
            case 'nopember' : $return = 'Nopember'; break;
            case 'november' : $return = 'Nopember'; break;
            case '12' : $return = 'Desember'; break;
            case 'dec' : $return = 'Desember'; break;
            case 'desember' : $return = 'Desember'; break;
            case 'december' : $return = 'Desember'; break;
            default : $return = $inputmonth; break;
        }
        return $return;
    }
    
    /**
     * English long format month
     * @param type $month m = 01 | 1 | Jan | Januari | January
     * @return string M = January
     */
    public static function getMonthEn($inputmonth)
    {
        if(empty($inputmonth)) 
            return null;
        $return = null;
        $month = strtolower(trim($inputmonth));
        switch($month){
            case '1' : $return = 'January'; break;
            case '01' : $return = 'January'; break;
            case 'januari' : $return = 'January'; break;
            case 'january' : $return = 'January'; break;
            case '2' : $return = 'February'; break;
            case '02' : $return = 'February'; break;
            case 'februari' : $return = 'February'; break;
            case 'february' : $return = 'February'; break;
            case '3' : $return = 'March'; break;
            case '03' : $return = 'March'; break;
            case 'maret' : $return = 'March'; break;
            case 'march' : $return = 'March'; break;
            case '4' : $return = 'April'; break;
            case '04' : $return = 'April'; break;
            case 'april' : $return = 'April'; break;
            case '5' : $return = 'May'; break;
            case '05' : $return = 'May'; break;
            case 'may' : $return = 'May'; break;
            case '6' : $return = 'June'; break;
            case '06' : $return = 'June'; break;
            case 'juni' : $return = 'June'; break;
            case 'june' : $return = 'June'; break;
            case '7' : $return = 'July'; break;
            case '07' : $return = 'July'; break;
            case 'juli' : $return = 'July'; break;
            case 'july' : $return = 'July'; break;
            case '8' : $return = 'August'; break;
            case '08' : $return = 'August'; break;
            case 'agt' : $return = 'August'; break;
            case 'agu' : $return = 'August'; break;
            case 'aug' : $return = 'August'; break;
            case 'agustus' : $return = 'August'; break;
            case 'august' : $return = 'August'; break;
            case '9' : $return = 'September'; break;
            case '09' : $return = 'September'; break;
            case 'september' : $return = 'September'; break;
            case '10' : $return = 'October'; break;
            case 'oct' : $return = 'October'; break;
            case 'oktober' : $return = 'October'; break;
            case 'october' : $return = 'October'; break;
            case '11' : $return = 'November'; break;
            case 'nov' : $return = 'November'; break;
            case 'nopember' : $return = 'November'; break;
            case 'november' : $return = 'November'; break;
            case '12' : $return = 'December'; break;
            case 'dec' : $return = 'December'; break;
            case 'desember' : $return = 'December'; break;
            case 'december' : $return = 'December'; break;
            default : $return = $inputmonth; break;
        }
        return $return;
    }
    
    /**
     * set number ke 2 digit
     * @param type $input_number
     * @return string
     */
    public static function getTwoDigit($input_number){
        $return = "00";
        if(strlen(trim($input_number)) == 1){
            $return = "0".$input_number;
        }else{
            $return = substr($input_number, 0, 2);
        }
        return $return;
    }
    
    /**
     * merubah format number untuk database
     * @param type $input_number
     * 1) 1234567
     * 2) 1234567.89
     * 3) 1234567,89
     * 4) 1,234,567.89
     * 5) 1.234.567,89
     * @return 
     * 1) integer = 1234567
     * 2) double/float = 1234567.89
     */
    public static function formatNumberForDb($input_number){
        $return = null;
        $input_number = trim($input_number);
        $number_1 = explode(',',$input_number);
        $number_2 = explode('.',$input_number);
        if(count($number_1) == 2){ //ex: 1.253.432,76 | 12,569
            $number_1_1 = explode('.',$number_1[0]);
            $number_1_2 = explode('.',$number_1[1]);
            if(count($number_1_1) > 1)
                $return = str_replace ('.', '', $number_1[0]).".".str_replace ('.', '', $number_1[1]);
            else{
                if(count($number_1_2) > 1)
                    $return = str_replace (',', '', $input_number);
                else
                    $return = str_replace (',', '.', $input_number);
            }
        }else{
            if(count($number_2) == 2){ //ex: 1,253,432.76 | 12.679 | 125679
                $number_2_1 = explode(',',$number_2[0]);
                $number_2_2 = explode(',',$number_2[1]);
                if(count($number_2_1) > 1)
                    $return = str_replace (',', '', $number_2[0]).".".str_replace (',', '', $number_2[1]);
                else{
                    if(count($number_2_2) > 1)
                        $return = str_replace ('.', '', $input_number);
                    else
                        $return = str_replace (',', '.', $input_number);
                }
            }else{ //ex: 1234567
                if(count($number_1) < count($number_2))
                    $return = str_replace (',', '.', str_replace('.','',$input_number));
                else
                    $return = str_replace (',', '', $input_number);
            }
        }
        return floatval($return);
    }
    /**
     * Merubah format nomor untuk User
     * @param type $input_number
     * @return 12,345,678.91345 | 12,345,678
     */
    public static function formatNumberForUser($input_number, $decimals = 0){
        $return = number_format(str_replace(",","",trim($input_number)), (int)$decimals, '.', ',');
        return $return;
    }
    /**
     * Merubah format number untuk print
     * @param type $input_number
     * @return Rp. 12.000
     */
    public static function formatNumberForPrint($input_number, $decimals = 0){
        $return = number_format(str_replace(",","",trim($input_number)), (int)$decimals, ',', '.');
        return $return;
    }
    /**
     * Merubah format uang untuk print
     * @param type $input_number
     * @return Rp. 12.000
     */
    public static function formatUang($input_number, $mata_uang = "Rp.", $decimals = 0){
        $return = number_format(str_replace(",","",trim($input_number)), (int)$decimals, ',', '.');
        return $mata_uang." ".$return;
    }
    
    
    /**
     * Nilai Terbilang dari angka
     * @param type $input_number
     * @param type $style : 1=upper | 2=lower | 3=uppercase on first letter for each word | default=uppercase on first letter
     * @param type $strcomma
     * @return string
     */
    public static function formatNumberTerbilang($input_number, $style=4){
        $input_number = self::formatNumberForDb($input_number);
        if ($input_number < 0){
            $return = "minus " . trim(self::kataTerbilang($input_number));
        } else {
            $arrnum = explode('.', $input_number);
            $arrcount = count($arrnum);
            if ($arrcount == 1) {
                $return = trim(self::kataTerbilang($input_number));
            } else if ($arrcount > 1) {
                $return = trim(self::kataTerbilang($arrnum[0])) . " koma " . trim(self::kataTerbilang($arrnum[1]));
            }
        }
        
        switch ($style){
            case 1: //1=uppercase  dan
                $return = strtoupper($return);
                break;
            case 2: //2= lowercase
                $return = strtolower($return);
                break;
            case 3: //3= uppercase on first letter for each word
                $return = ucwords($return);
                break;
            default: //4= uppercase on first letter
                $return = ucfirst($return);
                break;
        }
        
        return $return;
    }

    public static function kataTerbilang($input_number){
        $input_number = abs($input_number);
        $number = array("", "satu", "dua", "tiga", "empat", "lima",
            "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";

        if ($input_number < 12) {
            $temp = " " . $number[$input_number];
        } else if ($input_number < 20) {
            $temp = self::kataTerbilang($input_number - 10) . " belas";
        } else if ($input_number < 100) {
            $temp = self::kataTerbilang($input_number / 10) . " puluh" . self::kataTerbilang($input_number % 10);
        } else if ($input_number < 200) {
            $temp = " seratus" . self::kataTerbilang($input_number - 100);
        } else if ($input_number < 1000) {
            $temp = self::kataTerbilang($input_number / 100) . " ratus" . self::kataTerbilang($input_number % 100);
        } else if ($input_number < 2000) {
            $temp = " seribu" . self::kataTerbilang($input_number - 1000);
        } else if ($input_number < 1000000) {
            $temp = self::kataTerbilang($input_number / 1000) . " ribu" . self::kataTerbilang($input_number % 1000);
        } else if ($input_number < 1000000000) {
            $temp = self::kataTerbilang($input_number / 1000000) . " juta" . self::kataTerbilang($input_number % 1000000);
        } else if ($input_number < 1000000000000) {
            $temp = self::kataTerbilang($input_number / 1000000000) . " milyar" . self::kataTerbilang(fmod($input_number, 1000000000));
        } else if ($input_number < 1000000000000000) {
            $temp = self::kataTerbilang($input_number / 1000000000000) . " trilyun" . self::kataTerbilang(fmod($input_number, 1000000000000));
        }
        return $temp;
    }
    
    /**
     * menampilkan urutan (text) dari number
     * @param type $input_number
     * @return string | ex: "Ketiga"
     */
    public static function formatNumberForUrutanText($input_number){
        $text_number = self::kataTerbilang($input_number);
        return "Ke".$text_number;
    }
    
    /**
     * menampilkan sparator number
     * @param  type $input_number
     * @return integer
     */
    public static function formatNumberForCurrency($input_number){
        return str_replace(",",".",number_format($input_number));
    }

    /**
     * memberikan nama hari berdasarkan tanggal
     * @param type $date
     * @return string() | ex: "Senin"
     */
    public static function getDayName($date){
        $dayName = date('l',strtotime($date));
        $namaHari = '';
        $namaHari = ($dayName=='Sunday')?'Minggu':$namaHari;
        $namaHari = ($dayName=='Monday')?'Senin':$namaHari;
        $namaHari = ($dayName=='Tuesday')?'Selasa':$namaHari;
        $namaHari = ($dayName=='Wednesday')?'Rabu':$namaHari;
        $namaHari = ($dayName=='Thursday')?'Kamis':$namaHari;
        $namaHari = ($dayName=='Friday')?'Jumat':$namaHari;
        $namaHari = ($dayName=='Saturday')?'Sabtu':$namaHari;
        return $namaHari;
    }
    
    
}
?>
