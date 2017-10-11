<?php
Yii::import('ext.EJuiMonthPicker.EJuiMonthPicker');
class MyMonthPicker extends EJuiMonthPicker
{
    /**
     * Run this widget.
     * This method registers necessary javascript and renders the needed HTML code.
     */
    public function run()
    {
        $this->options['changeYear'] = true;
        $this->options['changeMonth'] = true;
        $this->options['showAnim'] = 'fold';
        $this->options['yearRange'] = '-80y:+20y';
        
        list($name, $id) = $this->resolveNameId();

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
        $id_input = $id . '_month';
        $joptions=CJavaScript::encode($this->options);
        $jscode = "jQuery('#{$id}').monthpicker({$joptions});";
        $js_input = "jQuery('#{$id_input}').on('click', function(){jQuery('#{$id}').monthpicker('show');});";
        $cs = Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__ . '#' . $id, $jscode);
        $cs->registerScript(__CLASS__ . '#' . $id_input, $js_input);
    }
       
    private function textFieldAppend($input)
    {
        $span = '<span id ="'. $this->htmlOptions['id'] . '_month' .'" class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>';
        if (isset($this->htmlOptions['append']))
            if ($this->htmlOptions['append'] == 'hide')
                $span = '';
        if (!isset($this->htmlOptions['hide'])){
            echo '<div class="input-group">';
            echo $input;
            echo $span;
            echo '</div>';
        }
    }
}
?>