$(function(){
	var url='http://localhost/establecimientos/establecimientos/';
	var id;
	$('a[data-borrar]').click(function(e){
		e.preventDefault();
		id=$(this).attr('data-borrar');
	});
	$('.borrar').click(function(e){
		$.ajax({
			url: url+'borrar',
			data: {id:id},
			type: 'POST',
		}).done(function(){
			location.reload();
		});		
	});
});