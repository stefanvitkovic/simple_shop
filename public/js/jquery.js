$(document).ready(function(){

	$('#buy').click(function(event){
	  event.preventDefault();

	var product_id = $("#product_id").attr('data-id');
	var product_quantity = $("#sel").val();
	var product_price = $('#product_price').attr('data-price');

	if(product_id.length && product_quantity.length && product_price.length > 0 ){

	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$.ajax({
	  type: 'post',
	  url: "buy",
	  data: {products_id:product_id,quantity:product_quantity,price:product_price},
	  success: function(data){
	  	$('#buy').hide().text('Success').addClass('btn-lg').slideDown('slow');

	    console.log('success');
	  },error:function(){
	    console.log('error');
	  }
	  });
	}else{
	console.log('error');
  	}
	});

});