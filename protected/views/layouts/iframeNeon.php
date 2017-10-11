<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl;?>/images/icon/favicon.png"/>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/image/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/neon.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/rickshaw/rickshaw.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/alertjs/css/jQuery.alert.css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/my-style.css" />
        
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/neon/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/neon/assets/js/neon-custom.js'); ?>
        
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.maskMoney.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.maskedinput.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/realtimeClock.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/accounting.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/formNeon.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/webcam.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/alertjs/js/jQuery.alert.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/alertjs/js/jquery.ui.draggable.js'); ?>
        
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body">
<div class="main-content">		
<hr />
<div class="panel-primary">
<?php echo $content; ?>
</div>	
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    <?php if (isset($_GET["status"])) { ?>
        showToast('<?php echo $_GET["status"]; ?>');
    <?php } ?>
    $('.search-form span.required').hide();
});
// END TOAST SETTING
</script>

<!-- Bottom Scripts SCRIPT INI HARUS TETAP BERADA DI BAWAH -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/gsap/main-gsap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/joinable.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/resizeable.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-api.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/raphael-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/morris.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery.peity.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/toastr.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-chat.js"></script>	
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-demo.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/custom.js"></script>
<!-- End Bottom Scripts -->
