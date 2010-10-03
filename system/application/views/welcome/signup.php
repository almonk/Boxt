<?
	$this->config->load('boxt');
	if ($this->config->item('self_register')==false) {
		break;
	};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="initial-scale = 1.0, user-scalable = no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="white" />
		<title>Boxt &mdash; <?=$this->config->item('institution_name');?></title>
		<link rel="stylesheet" href="<?=base_url()?>css/boxt.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<link media="only screen and (max-device-width: 480px)" href="<?=base_url()?>css/iphone.css" type="text/css" rel="stylesheet" />
		<link rel="apple-touch-startup-image" href="<?=base_url()?>images/iphone/start.png"/>
		<link rel="apple-touch-icon" href="<?=base_url()?>images/iphone/icon.png"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url()?>js/jquery.ketchup.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url()?>js/jquery.ketchup.messages.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url()?>js/jquery.ketchup.validations.basic.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('.register_form').ketchup({
				  initialPositionContainer: function(errorContainer, field) {
				    //errorContainer = the error-container with all childs
				    //field = the field that needs to get validated
				  },
				  positionContainer: function(errorContainer, field) {},
				  showContainer: function(errorContainer) {
				    errorContainer.slideDown('fast');
				  },
				  hideContainer: function(errorContainer) {
				    errorContainer.slideUp('fast');
				  }
				});
			});
		</script>
	</head>
	<body>
		<div class="content">
			<div id="topbar">
				<div id="instituion_logo">
					<a href="<?=$this->config->item('institution_link');?>">
						<img src="<?=base_url().$this->config->item('institution_logo');?>" border="0"/>
					</a>
				</div>
			</div>		
			
			<div id="main_image">
				<div id="logo">
					<p class="welcome" style="margin-top:0px">
						Signing up is really easy. Just fill in the forms on the right and your new account will be activated instantly.
					</p>
				</div>
				<div id="screenshot" style="padding-top:5px;">
					<?
					$this->load->view('user/register_form');
					?>
				</div>
			</div>
			
			<div class="features">
				&nbsp;
			</div>
			
			<div class="features" style="text-align:right;">
				A project by <a href="mailto:siu06al@reading.ac.uk">Alasdair Monk</a>.
			</div>
			
		</div>
	</body>
</html>
