$(function() {
	

 $('form[name=F1]').find('input[type=text],input[type=password],select').each(function(n,el){
   console.log(el)
		let value = localStorage.getItem($(this).prop('id'));
		if(value){
			$(this).val(value)
            let $field = $(this).closest('.form-group');
            $field.addClass('field--not-empty');
		}
 })

  $('#rememberme').on('change', function(){
  	let check = $(this).prop('checked');
    
    if(check){

      $('form[name=F1]').find('input[type=text],input[type=password],select').each(function(n,el){
		localStorage.setItem($(this).prop('id'), $(this).val());
      })
    }
  })
  
  
  
  $('.form-control').on('input', function() {
	  var $field = $(this).closest('.form-group');
	  if (this.value) {
	    $field.addClass('field--not-empty');
	  } else {
	    $field.removeClass('field--not-empty');
	  }
	});
	
  $('input[type=button]').on('click', function() {
	  console.log('onsubmit')
      let check = $('#rememberme').prop('checked');

      if(check){

        $('form[name=F1]').find('input[type=text],input[type=password],select').each(function(n,el){
          localStorage.setItem($(this).prop('id'), $(this).val());
        })
      }
	});

});