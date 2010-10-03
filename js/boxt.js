var baseurl = "http://localhost/boxt/";

function show_loading(){
	$('#boxtLoading').show();
}

function hide_loading(){
	$('#boxtLoading').hide();
}

function load_widget(name,column_id){
	show_loading();
	var i = Math.round(10000*Math.random()); 
	$('#'+column_id).append('<div class="box" id="'+name+'"><h1>Loading...</h1></div>');
	$.ajax({
	    type: "GET",
		url: baseurl+'widgets/'+name+'/'+name+'.xml',
		dataType: "xml",
		error: function(){
	        //boxtError('Error loading XML document');
	    },
		success: function(xml) {
			$(xml).find('Module').each(function(){
				$('#'+name).html('<h1>'+$(this).find('ModulePrefs').attr('title')+'</h1>'+$(this).find('Content').text());
				$('#'+name).fadeIn('fast');
				bind_context_menu(name);
				hide_loading();
			});
		}
	});
}

function bind_context_menu(name){
	$('h1').contextMenu('contextMenuWidget', {
		bindings: {
			'settings': function(t) {
				if ( $(t).siblings('.settings').length ) {
					$(t).siblings('.settings').slideToggle('fast');
				}else{
					alert('There are no settings for this widget.')
				}
			},
			'delete': function(t) {
				$(t).parent().hide('fast', function() {
					$(t).parent().remove();
				});
			}	
		}
    });
}

function flash_widgets_library(){
	$('#fancy_outer').fadeTo('fast', 0, function() {
		show_loading();
		setTimeout(function(){$('#fancy_outer').fadeTo('fast', 1);hide_loading();}, 1000);
	});
}

function halo_widget(widget_id){
	$(widget_id).addClass('halo');
	setTimeout(function(){$(widget_id).removeClass('halo');}, 2000);
}

$(function() {
	$("#left").sortable({ items: '.box',cursorAt: 'top', connectWith: ["#left","#mid","#right"], handle: 'h1', opacity: 1, scroll:true });
	$("#mid").sortable({ items: '.box',cursorAt: 'top', connectWith: ["#left","#mid","#right"], handle: 'h1', opacity: 1, scroll:true });
	$("#right").sortable({ items: '.box',cursorAt: 'top', connectWith: ["#left","#mid","#right"], handle: 'h1', opacity: 1, scroll:true });
	$(".widgets").disableSelection();
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
	
	$('a.add_widget_link').fancybox({
		'padding':		0, 
		'frameHeight':	500, 
		'frameWidth':	660,
		'overlayColor': '#fff',
		'overlayOpacity': 0.7,
		'hideOnContentClick': false
	});
	
	// $(window).bind('resize', function() {
	// 	if ($(window).width() < 960) {
	// 		$('body').addClass('mobile');
	// 	}else{
	// 		$('body').removeClass('mobile');
	// 	}
	// });
});