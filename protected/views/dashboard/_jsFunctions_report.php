<script type="text/javascript">
    function print(caraPrint)
    {
        window.open("<?php echo $this->createUrl('print'); ?>/"+$('#search-form').serialize()+"&caraPrint="+caraPrint,"",'location=_new, width=1100px, scrollbars=yes');
    }  
</script>