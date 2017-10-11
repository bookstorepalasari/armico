<?php
/**
 * Menampilkan exception message dengan dropdown
 */
class MyExceptionMessage
{
    public static function getMessage($exc,$return=false)
    {
        
        $code = $exc->getCode();
        $file = $exc->getFile();
        $line = $exc->getLine();
        $message = $exc->getMessage();
        $traceString = $exc->getTraceAsString();
        $trace = $exc->getTrace();
        
        $box = "
        <div class='hide well' id='exceptionMessage'>
            $message<br/>
            On Line : <b>$line</b>, $file<br>
            <pre>$traceString</pre>
        </div>";

        $tombol = '&nbsp;&nbsp;'.CHtml::link(Yii::t('mds', 'Error Message'),'#', array('onclick'=>'toggleException();return false;','class'=>'', 'data-title'=>'', 'data-content'=>'Klik untuk menampilkan/menyembunyikan pesan', 'rel'=>'popover')); 
        Yii::app()->clientScript->registerScript('exception_message','function toggleException(){$(\'#exceptionMessage\').toggle();}', CClientScript::POS_HEAD);        
        
        if($return)
            return $tombol.$box;
        else
            echo $tombol.$box;
    }
}
?>
