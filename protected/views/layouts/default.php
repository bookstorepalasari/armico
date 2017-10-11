<!DOCTYPE html>
<html lang="en">
<head>
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
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body">
<div class="page-container">	
	<div class="sidebar-menu">
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/data/images/logo/logo.jpeg" width="140" alt="" />
				</a>
					
			</div>
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>			
		</header>
		<ul id="main-menu">
			<?php
				$idModul = ((!empty($this->module->id)) ? $this->module->id : null);
				$idUser = ((!empty(Yii::app()->user->id)) ? Yii::app()->user->id : null);
				$menu = Params::menu();
				foreach ($menu as $index => $arrMenu){
			?>
				<li class="<?php echo ($index==$this->menuIndex)?'active opened':''; ?>">
					<a href="<?php echo ($arrMenu['label'] == 'Dashboard') ? $this->createUrl($arrMenu['url']) : "#"; ?>">
                                            <i class="<?php echo $arrMenu['icon']; ?>"></i>							
                                            <span><?php echo $arrMenu['label']; ?></span>
					</a>
					<?php if(isset($arrMenu['sub'])){ ?>
					<ul>
						<?php foreach ($arrMenu['sub'] as $i => $arr) { ?>
							<li class="<?php echo ($i==$this->accordionIndex)?'active':''; ?>">
								<a href="<?php echo $this->createUrl($arr['url']); ?>">
									<span><?php echo $arr['label']; ?></span>
								</a>
							</li>
						<?php } ?>
					</ul>
                                        <?php } ?>
				</li>
			<?php } ?>
		</ul>
	</div>	
	<div class="main-content">
<div class="row">
<!-- Profile Info and Notifications -->
<div class="col-md-6 col-sm-8 clearfix">
<ul class="user-info pull-left pull-none-xsm">
    <!-- Profile Info -->
    <li class="profile-info dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
            if (Yii::app()->user->getState('gambar_pemakai')!=""){
                if (file_exists('data/images/pemakai/'.Yii::app()->user->getState('gambar_pemakai'))){
                  $src = Params::urlPemakaiGambar().Yii::app()->user->getState('gambar_pemakai');
                } else{
                  $src = Yii::app()->getBaseUrl('webroot')."/data/images/no_photo.jpeg";
                }
            }else{
                  $src = "/data/images/no-photo.jpg";
            }
            ?>
            <img src="<?php echo Yii::app()->request->baseUrl.$src; ?>" alt="" class="img-circle" width="44" />
            <?php echo ucwords(Yii::app()->user->name); ?>
        </a>
    </li>
</ul>
</div>
<!-- Raw Links -->
<div class="col-md-6 col-sm-4 clearfix hidden-xs">
	<ul class="list-inline links-list pull-right">
		<li>
			<a href="<?php echo $this->createUrl('/site/logout'); ?>">
				Log Out <i class="entypo-logout right"></i>
			</a>
		</li>
	</ul>
</div>	
</div>
<hr />
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo $this->createUrl('/dashboard'); ?>"><i class="entypo-home"></i>Dashboard</a>
	</li>
	<?php if($this->menu_head != ''){ ?>
		<li>
                    <a href="<?php echo isset($this->menu_action)? Yii::app()->request->baseUrl."/index.php?r=/". strtolower($this->menu_head) :'#'; ?>"><?php echo ucwords($this->menu_head); ?></a>
		</li>
		<?php if($this->menu_action != ''){ ?>
		<li>
			<a href="#"><?php echo ucwords($this->menu_action); ?></a>
		</li>
		<?php } ?>
	<?php } ?>
</ol>
<?php echo $content; ?>
<!-- Footer -->
<footer class="main">
	<center><strong>ARMICO - PALASARI </strong>&copy; 2017 </center>
</footer>	

	<script type="text/javascript">
		// TOAST SETTING
		var opts = {
			"closeButton": false,
			"debug": false,
			"positionClass": "toast-top-right",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "3000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		function toastSuccess(msg){
			toastr.success(msg, opts);
		}
		function toastError(msg){
			toastr.error(msg, opts);
		}
		function toastWarning(msg){
			toastr.warning(msg, opts);
		}
		function toastInfo(msg){
			toastr.info(msg, opts);
		}

		function showToast(tst){
			switch(tst) {
				case '1':
					msg = 'Data Berhasil di Simpan';
					toastSuccess(msg);
					break;
				case '2':
					msg = 'Data Gagal di Simpan';
					toastError(msg);
					break;
				case '3':
					toastWarning(msg);
					break;
				case '4':
					toastInfo(msg);
					break;
			}
		}
	// END TOAST SETTING
	</script>

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/rickshaw/rickshaw.min.css">
	<!-- Bottom Scripts -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/gsap/main-gsap.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/joinable.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/resizeable.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-api.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/raphael-min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/morris.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/toastr.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-chat.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-custom.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/neon-demo.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/neon/assets/js/custom.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/form.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.maskedinput.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.maskMoney.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ba-bbq.js"></script>
</body>
</html>