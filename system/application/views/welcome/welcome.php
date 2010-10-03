<?
	$this->config->load('boxt');
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
		<script src="<?=base_url()?>js/colorhash.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('input:password').chromaHash({bars: 3});
			});
		</script>
	</head>
	<body>
		<div class="content">
			<?
			if ($this->session->flashdata('result')) {
				echo '<div class="notice">'.$this->session->flashdata('result').'</div>';
				?>
					<script type="text/javascript" charset="utf-8">
					$(document).ready(function() {
						setTimeout("$('.notice').slideUp('fast')",5000);
					});
					</script>
				<?
			}
			?>
		
			<div id="topbar">
				<div id="instituion_logo">
					<a href="<?=$this->config->item('institution_link');?>">
						<img src="<?=base_url().$this->config->item('institution_logo');?>" border="0"/>
					</a>
				</div>
			</div>		
			
			<div id="main_image">
				<div id="logo">
					<img src="<?=base_url();?>images/ui/boxt-new.jpg" width="200" style="margin-top:10px;" alt="Boxt" />
					<p class="welcome">
						Boxt is an <span class="hilite">open source</span> widget framework for universities, organisations, schools and<br/>other institutions.
					</p>
					<?$this->load->view('user/login_form');?>
				</div>
				<div id="screenshot">
					<img src="<?=base_url()?>images/ui/boxt_screenie.jpg"/>
				</div>
			</div>
			
			<div class="features">
				<?
					if ($this->config->item('self_register')==true) {
						echo 'Not got an account? <a href="'.base_url().'index.php/homepage/signup">Register here.</a>';
					}else{
						echo 'Having trouble logging in? Contact <a href="mailto:'.$this->config->item('support_contact').'">'.$this->config->item('support_contact').'</a>';
					}
				?>
				
			</div>
			
			<div class="features" style="text-align:right;">
				A project by <a href="mailto:siu06al@reading.ac.uk">Alasdair Monk</a>.
			</div>
			
		</div>
	</body>
</html>
			