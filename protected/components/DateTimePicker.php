<?php
Yii::import('ext.CJuiDateTimePicker.CJuiDateTimePicker');
class DateTimePicker extends CJuiDateTimePicker
{
    public function run()
    {
            $this->options['timeText'] = 'Waktu';
            $this->options['hourText'] = 'Jam';
            $this->options['minuteText'] = 'Menit';
            $this->options['secondText'] = 'Detik';
            $this->options['showSecond'] = true;
            $this->options['timeOnlyTitle'] = 'Pilih Waktu';
            $this->options['timeFormat'] = 'hh:mm:ss';
            $this->options['changeYear'] = true;
            $this->options['changeMonth'] = true;
            $this->options['showAnim'] = 'fold';
            $this->options['yearRange'] = '-80y:+20y';
        
            list($name,$id)=$this->resolveNameID();

            if(isset($this->htmlOptions['id']))
                    $id=$this->htmlOptions['id'];
            else
                    $this->htmlOptions['id']=$id;
            if(isset($this->htmlOptions['name']))
                    $name=$this->htmlOptions['name'];
            else
                    $this->htmlOptions['name']=$name;

            if($this->hasModel())
                    $this->textFieldAppend(CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions));
            else 
                    $this->textFieldAppend(CHtml::textField($name,$this->value,$this->htmlOptions));

            $options=CJavaScript::encode($this->options);

            $id_date = $id . '_date';
            $js = "jQuery('#{$id}').{$this->mode}picker($options);";
            $js_date = "jQuery('#{$id_date}').on('click', function(){jQuery('#{$id}').datepicker('show');});";
            
            if (isset($this->language)){
                    $this->registerScriptFile($this->i18nScriptFile);
                    $js = "jQuery('#{$id}').{$this->mode}picker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['{$this->language}'], {$options}));";
            }

            $cs = Yii::app()->getClientScript();

            $assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');
            $cs->registerCssFile($assets.self::ASSETS_NAME.'.css');
            $cs->registerScriptFile($assets.self::ASSETS_NAME.'.js',CClientScript::POS_END);

            $cs->registerScript(__CLASS__, 	$this->defaultOptions?'jQuery.{$this->mode}picker.setDefaults('.CJavaScript::encode($this->defaultOptions).');':'');
            $cs->registerScript(__CLASS__.'#'.$id, $js);
            $cs->registerScript(__CLASS__.'#'.$id_date, $js_date);           

    }
    
    private function textFieldAppend($dateTimeInput)
    {
        switch($this->mode){
            case 'date' : $span = '<span id ="'. $this->htmlOptions['id'] . '_date' .'" class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>';break;
            case 'time' : $span = '<span id ="'. $this->htmlOptions['id'] . '_date' .'" class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>';break;
            case 'datetime' : $span = '<span id ="'. $this->htmlOptions['id'] . '_date' .'" class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i><i class="glyphicon glyphicon-time"></i></span>';break;
            default : $span = '';
        }
        
        if (isset($this->htmlOptions['append']))
            if ($this->htmlOptions['append'] == 'hide')
                $span = '';
            
        
        if (!isset($this->htmlOptions['hide'])){
            echo '<div class="input-group">';            
            echo $dateTimeInput;            
            echo $span;
            echo '</div>';
        }
    }
}
?>