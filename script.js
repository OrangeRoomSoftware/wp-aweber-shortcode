// Placeholders for IE
$(document).ready(function() {
  var name_placeholder = $('#aweber-signup-form-name').attr('placeholder');
  var email_placeholder = $('#aweber-signup-form-email').attr('placeholder');

  if ($('body.ie').length) {
    $('#aweber-signup-form-name')
      .val(name_placeholder)
      .focus(function(){if($(this).val() == name_placeholder) $(this).val('');})
      .blur(function(){if($(this).val() == '') $(this).val(name_placeholder)});
    $('#aweber-signup-form-email')
      .val(email_placeholder)
      .focus(function(){if($(this).val() == name_placeholder) $(this).val('');})
      .blur(function(){if($(this).val() == '') $(this).val(name_placeholder)});
  }
});
