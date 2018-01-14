<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.3.2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-barcode.js"></script>

      <table style="width:<?php echo $model->panjang.'cm'; ?>; height: <?php echo $model->lebar.'cm'; ?>;">
          <tr>
                <td style="float:left; font-size: 70%;"><?php echo $model->nama_toko; ?></td>
                <td style="float:right; font-size: 70%;">ISBN : <?php echo $model->no_isbn; ?></td>
          </tr>
          <tr>
                <td>
                    <div id="barcodeTarget" class="barcodeTarget" style='margin-top: 5px; margin-bottom:5px;'></div>
                </td>
          </tr>
          <tr>
                <td style="float:left; font-size: 70%;"><?php echo $model->penerbit->penerbit; ?></td>
                <td style="float:right; font-size: 70%;"><?php echo $model->harga_jual; ?></td>
          </tr>
          <tr>
                <td style="text-align: center; font-size: 70%;"><?php echo $model->judul_buku; ?></td>
          </tr>
          <tr>
                <td style="float:left; font-size: 70%;">Edisi : <?php echo $model->edisi; ?></td>
                <td style="float:right; font-size: 70%;">Tahun :  <?php echo $model->tahun; ?></td>
          </tr>
      </table>
    
    
<script type="text/javascript">
    $(function(){
        var value = '<?php echo $model->barcode; ?>';
        var btype = 'code39';

        var settings = {
          bgColor: '#FFFFFF',
          color: '#000000',
          barWidth: 1,
          barHeight: 50,
          moduleSize: 5,
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: 1
        };
            $("#canvasTarget").hide();
            $("#barcodeTarget").html("").show().barcode(value, btype, settings);
    });
</script>