<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Book Store Palasari" />
	<meta name="author" content="" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/neon.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/css/custom.css">

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery-1.10.2.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
</head>
<body class="page-body login-page login-form-fall" data-url="<?php echo $this->createUrl('site/login'); ?>">
<div class="login-container">	
	<div class="login-header login-caret">		
		<div class="login-content">			
			<a href="#" class="logo">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/data/images/logo/logo-armico.png" width="140" alt="" />
			</a>			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>		
	</div>
	<div class="login-progressbar">
		<div></div>
	</div>
	<div class="login-form">
		<div class="login-content">
		<?php echo $content; ?>
			<div class="login-bottom-links">				
			</div>			
		</div>		
	</div>	
</div>
	<!-- Bottom Scripts -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/gsap/main-gsap.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/joinable.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/resizeable.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-api.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-login.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-custom.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-demo.js"></script>
</body>
</html>