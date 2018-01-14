<script type="text/javascript">
var neonLogin = neonLogin || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		neonLogin.$container = $("#form_login_user");
		
		// Login Form & Validation
		neonLogin.$container.validate({
			rules: {
				username: {
					required: true	
				},
				
				password: {
					required: true
				},
				
			},
			
			highlight: function(element){
				$(element).closest('.input-group').addClass('validate-has-error');
			},
			
			
			unhighlight: function(element)
			{
				$(element).closest('.input-group').removeClass('validate-has-error');
			},
			
			submitHandler: function(ev)
			{
				/* 
					Demo Purpose Only 
					
					Here you can handle the page login, currently it does not process anything, just fills the loader.
				*/
				
				$(".login-page").addClass('logging-in'); // This will hide the login form and init the progress bar

				// We will wait till the transition ends				
				setTimeout(function()
				{
					var random_pct = 25 + Math.round(Math.random() * 30);
					
					neonLogin.setPercentage(random_pct, function()
					{
						// Just an example, this is phase 1
						// Do some stuff...
						
						// After 0.77s second we will execute the next phase
						setTimeout(function()
						{
							neonLogin.setPercentage(100, function()
							{
								// Just an example, this is phase 2
								// Do some other stuff...
								
								// Redirect to the page
								ev.submit();
//								setTimeout("window.location.href = '<?php //echo Yii::app()->createUrl('site/login'); ?>'", 600);
							}, 100);
							
						}, 820);
					});
					
				}, 650);
			}
		});
				
		// Login Form Setup
		neonLogin.$body = $(".login-page");
		neonLogin.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonLogin.$login_progressbar = neonLogin.$body.find(".login-progressbar div");
		
		neonLogin.$login_progressbar_indicator.html('0%');
		
		if(neonLogin.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;
			
			setTimeout(function(){ 
				neonLogin.$body.addClass('login-form-fall-init')
				
				setTimeout(function()
				{
					if( !focus_set)
					{
						neonLogin.$container.find('input:first').focus();
						focus_set = true;
					}
					
				}, 550);
				
			}, 0);
		}
		else
		{
			neonLogin.$container.find('input:first').focus();
		}
		
	});
	
})(jQuery, window);	
</script>