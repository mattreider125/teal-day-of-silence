<?php
get_header(); 
?>

<form id="ajaxlogin" action="login" method="post"><h3 class="h1"><!?php _e('Login To', 'blueleaf') ?></h3>

		<label for="username"><?php _e('Email', 'blueleaf'); ?></label> <input id="username" name="username" type="text" >
		<label for="password"><?php _e('Password', 'blueleaf'); ?></label> <input id="password" name="password" type="password" >

		<button name="submit" type="submit" value="<?php _e('Login', 'blueleaf') ?>"><?php _e('Login', 'blueleaf') ?></button>
		
		<a class="register small" href="<?php bloginfo('url'); ?>/register/"><?php _e('Register...', 'blueleaf'); ?></a><br>
		<a class="lost small" href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost your password?' , 'blueleaf'); ?></a>
		
		<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
		
	</form>

	<script type="text/javascript">
		
		jQuery(document).ready(function($) {

    // Perform AJAX login on form submit
    $('form#login').on('submit', function(e){
        $('form#login p.status').show().html(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#login #username').val(), 
                'password': $('form#login #password').val(), 
                'security': $('form#login #security').val() },
            success: function(data){
                $('form#login p.status').html(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_login_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });

});
	</script>