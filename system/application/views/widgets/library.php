<div class="utility_page">
	<div class="sidebar">
		<input type="text" id="searchbar" class="search" value="Search Widgets"/>
		<ul class="categories">
			<li class="header">Categories</li>
			<li><a href="#">Most Popular</a></li>
			<li><a href="#">Most Recent</a></li>
			<li><a href="#">University Specific</a></li>
		</ul>
	</div>
	<div class="results">
		
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	$('.results').load('<?=site_url()?>/widgets/library');
	$('#searchbar').bind('keydown', function(e) {
		var string = $('#searchbar').val();
		$.post('<?=site_url()?>/widgets/library', { search: string },
			function(data){
			$('.results').html(data);
		});
	});
	$('input[type=text]').focus(function(){ 
		if($(this).val() == $(this).attr('defaultValue'))
		{
			$(this).val('');
			$(this).select();
		}
		});

		$('input[type=text]').blur(function(){
			if($(this).val() == '')
		{
			$(this).val($(this).attr('defaultValue'));
		} 
	});
</script>