(function($){
    
    'use strict';

	/**
	 *
	 * Create New User Ajax Call
	 *
	 */

	$('#wp_fundraising_register_form').on( 'submit', function(e) {
        e.preventDefault();

        var user_name 			= $("#xs_register_name").val();
        var user_email_address 	= $("#xs_register_email").val();
        var user_password 		= $("#xs_register_password").val();
        var required = 0;

        $(".fundpress-required", this).each(function() {
            if ($(this).val() == '')
            {
                $(this).addClass('reqError');
                required += 1;
            }
            else
            {
                if ($(this).hasClass('reqError'))
                {
                    $(this).removeClass('reqError');
                    if (required > 0)
                    {
                        required -= 1;
                    }
                }
            }
        });

        if (required === 0){
            $.ajax({
                url : wp_fundraising_check_obj.ajaxurl,
                type : 'post',
                dataType : 'Json',
                data : {
                    action : 'wp_fundraising_create_user',
                    user_name : user_name,
                    user_email_address : user_email_address,
                    user_password : user_password,
                    wp_fundraising_security : wp_fundraising_check_obj.ajax_nonce
                },
                success : function( response ) {
                    var response = JSON.parse(JSON.stringify(response));
                    console.log(response);
                    if(response.status == 'success'){
                       $('#wp_fundraising_msg').show().text(response.msg);
                       $('#wp_fundraising_register_form')[0].reset();
                    }else{
                        $('#wp_fundraising_msg').show().text(response.msg);
                    }
                }
            });
        }
    });
	
    /**
     *
     * Check user login
     *
     */

    $('#wp_fundraising_login_form').on( 'submit', function(e) {
        e.preventDefault();

        var user_name           = $("#login_user_name").val();
        var user_password       = $("#login_user_pass").val();
        var required = 0;
        
        $(".fundpress-required", this).each(function() {
            if ($(this).val() == '')
            {
                $(this).addClass('reqError');
                required += 1;
            }
            else
            {
                if ($(this).hasClass('reqError'))
                {
                    $(this).removeClass('reqError');
                    if (required > 0)
                    {
                        required -= 1;
                    }
                }
            }
        });

        if (required === 0){
            $.ajax({
                url : wp_fundraising_check_obj.ajaxurl,
                type : 'post',
                dataType : 'Json',
                data : {
                    action : 'wp_fundraising_login',
                    user_name : user_name,
                    user_password : user_password,
                    wp_fundraising_security : wp_fundraising_check_obj.ajax_nonce
                },
                success : function( response ) {
                    var response = JSON.parse(JSON.stringify(response));
                     console.log(response);
                    if(response.status == 'success'){
                        location.reload();
                    }else{
                        $('#wp_fundraising_msg').show().text(response.msg);
                    }
                }
            });
        }
    });

    /**
     *
     * Reset Password
     *
     */

    $('#ps_reset_password').on( 'submit', function(e) {
        e.preventDefault();

        var reset_username = $("#reset_username").val();
        var required = 0;
        
        $(".ps-required", this).each(function() {
            if ($(this).val() == '')
            {
                $(this).addClass('reqError');
                required += 1;
            }
            else
            {
                if ($(this).hasClass('reqError'))
                {
                    $(this).removeClass('reqError');
                    if (required > 0)
                    {
                        required -= 1;
                    }
                }
            }
        });
        if (required === 0){
            $("#ps_reset_submit").val('Processsing...');
            $.ajax({
                url : ps_check_obj.ajaxurl,
                type : 'post',
                dataType : 'Json',
                data : {
                    action : 'ps_resetpassword',
                    user_name : reset_username,
                    ps_security : ps_check_obj.ajax_nonce
                },
                success : function( response ) {
                    if(response.status == 'success'){
                        $("#ps_reset_submit").val('Reset');
                            $('#ps_reset_msg').show().text(response.msg).css('color','green');
                            $('#ps_reset_password')[0].reset();
                    }else{
                        $('#ps_reset_msg').show().text(response.msg).css('color','red');
                        $("#ps_reset_submit").val('Reset');
                    }
                },
                error : function (jqXHR, textStatus, errorThrown) {
                       console.log(errorThrown);
                }
            });
        }
    });

})(jQuery);