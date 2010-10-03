<?
	$this->config->load('boxt');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html class="admin" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Boxt Admin &mdash; <?=$this->config->item('institution_name');?></title>
		<link rel="stylesheet" href="<?=base_url()?>css/boxt.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url();?>js/jquery.remote.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
            $(function() {
                $('a.remote').remote('.admin_canvas', function() {
                    if (window.console && window.console.info) {
                        console.info('content loaded');
                    }
                });
				$('#admin_sidebar ul li a').click(function() {
					$('#admin_sidebar ul li a').removeClass('current');
					$(this).addClass('current');
				});
                $.ajaxHistory.initialize();
            });
        </script>
	</head>
	<body>
		<div class="content">
			<div id="admin_sidebar">
				<img src="<?=base_url();?>images/ui/boxt-logo-big.jpg" style="margin-bottom:10px" width="50" />
				<ul>
					<li><a class="current remote" href="<?=base_url();?>index.php/admin/general">General</a></li>
					<li><a class="remote" href="<?=base_url();?>index.php/admin/users">Users</a></li>
					<li><a class="remote" href="<?=base_url();?>index.php/admin/widgets">Widgets</a></li>
					<li><a class="remote" href="<?=base_url();?>index.php/admin/announcements">Announcement</a></li>
					<li><a href="<?=site_url()?>/users/logout">Log out</a></li>
				</ul>
			</div>
			
			<div class="admin_canvas">
				<?
					if ($this->session->flashdata('result')) {
						echo '<div class="notice">'.$this->session->flashdata('result').'</div>';
						?>
							<script type="text/javascript" charset="utf-8">
							$(document).ready(function() {
								setTimeout("$('.notice').hide('fast')",2000);
							});
							</script>
						<?
					}
					$this->load->view('admin/home');
				?>
			</div>
		</div>
	</body>
</html>
