<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="initial-scale = 1.0, user-scalable = no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="white" />
		<title>Boxt</title>
		<link rel="stylesheet" href="<?=base_url()?>css/boxt.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<link rel="apple-touch-startup-image" href="<?=base_url()?>images/iphone/start.png"/>
		<link rel="apple-touch-icon" href="<?=base_url()?>images/iphone/icon.png"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url()?>js/jquery.rightclick.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url()?>js/jquery.jfeed.pack.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url();?>js/jquery.blockui.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url();?>js/jquery.fancybox.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?=base_url();?>js/boxt.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div id="boxtLoading" style="display:none;">Loading...</div>
		<div class="content">			
			<div class="nav">
				<ul>
					<li><a class="add_widget_link" href="<?=site_url()?>/widgets">Add stuff</a></li>
				</ul>
			</div>
			
			<div class="secondary_nav">
				<ul>	
					<li><a href="<?=site_url()?>/settings" class="gray_text"><?=$this->session->userdata('email')?></a></li>
					<li><a href="<?=site_url()?>/users/logout">Log out</a></li>
				</ul>
			</div>
		