

$(function() {
  
	
if (+Cookies.get('tabs') > 0) 
{
	if(confirm("Ya tiene abierto el programa en otra pestaña."))
	{
		location.href = "https://www.google.com";
	}
	else
	{
		location.href = "https://www.google.com";
	}
}
else 
{
		Cookies.set('tabs', 0); 
		Cookies.set('tabs', +Cookies.get('tabs') + 1); 
		window.onunload = function () { 
		Cookies.set('tabs', +Cookies.get('tabs') - 1); 
	}; 
}
  
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