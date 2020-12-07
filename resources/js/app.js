require('./bootstrap');

require('./jquery');


$('.user_change_password').on('click',function() {
    if($(this).prev().val() == 0){
        $('#user_password_field').attr('disabled', false);
    }else{
        $('#user_password_field').attr('disabled', true);
    }
});

