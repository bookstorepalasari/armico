<?php
$this->breadcrumbs=array(
            'MBarang'=>array('index'),
            'Manage',
    );

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('#pencarian').submit(function(){
        $.fn.yiiGridView.update('mbarang-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<!--<h2>Master Barang</h2>-->

<?php if(Yii::app()->user->hasFlash('success')) { ?>
<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i> Sukses! <?php echo Yii::app()->user->getFlash('success'); ?>
</div><?php } ?>
<div class="row">
    <div class="col-md-5" style="float:right;">
        <?php $this->renderPartial('_search',array('model'=>$model,'search'=>$search)); ?>
    </div>
    <div class="col-md-7">
        <?php echo Chtml::link('<i class="glyphicon glyphicon-export"></i> Export Excel',$this->createUrl('/barang/ExportExcel'), array('class'=>'btn btn-blue disabled','type'=>'button', 'style' => 'width: 120px; margin-left:10px;')); ?>
    </div> 
</div>
<div class="row">
    <div class="col-md-12" style="overflow: scroll;">
        <table>
            <tr>
                <td>Pilih Semua<input type="checkbox" id="checkAll"> </td>
                <td>
                    <select id="row1">
                        <?php foreach ($listRow as $a => $setRow): ?>
                            <option value='<?php echo $a; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row2">
                        <?php foreach ($listRow as $b => $setRow): ?>
                            <option value='<?php echo $b; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row3">
                        <?php foreach ($listRow as $c => $setRow): ?>
                            <option value='<?php echo $c; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row4">
                        <?php foreach ($listRow as $d => $setRow): ?>
                            <option value='<?php echo $d; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row5">
                        <?php foreach ($listRow as $e => $setRow): ?>
                            <option value='<?php echo $e; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row6">
                        <?php foreach ($listRow as $f => $setRow): ?>
                            <option value='<?php echo $f; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row7">
                        <?php foreach ($listRow as $g => $setRow): ?>
                            <option value='<?php echo $g; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row8">
                        <?php foreach ($listRow as $h => $setRow): ?>
                            <option value='<?php echo $h; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row9">
                        <?php foreach ($listRow as $i => $setRow): ?>
                            <option value='<?php echo $i; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row10">
                        <?php foreach ($listRow as $j => $setRow): ?>
                            <option value='<?php echo $j; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row11">
                        <?php foreach ($listRow as $k => $setRow): ?>
                            <option value='<?php echo $k; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row12">
                        <?php foreach ($listRow as $l => $setRow): ?>
                            <option value='<?php echo $l; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row13">
                        <?php foreach ($listRow as $m => $setRow): ?>
                            <option value='<?php echo $m; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row14">
                        <?php foreach ($listRow as $n => $setRow): ?>
                            <option value='<?php echo $n; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row15">
                        <?php foreach ($listRow as $o => $setRow): ?>
                            <option value='<?php echo $o; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="row16">
                        <?php foreach ($listRow as $p => $setRow): ?>
                            <option value='<?php echo $p; ?>'><?php echo $setRow; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
</div>