<!-- 

    Hey there! You're viewing a website managed and designed by Heartbeat Websites! 
    https://www.heartbeatwebsites.com

-->
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<!--
<style>
form#login{
    display: none;
    background-color: #FFFFFF;
    position: fixed;
    top: 50%;
    padding: 40px 25px 25px 25px;
    width: 350px;
    z-index: 999;
    left: 50%;
    border-radius: 8px;
    transform: translate(-50%,-50%);
    max-width: 90%;
    box-shadow: 0 0px 10px rgba(0, 0, 0, 0.5);
}

form#login p.status{
    display: none;
    clear: both;
    padding: 10px;
    margin-bottom: 0;
}
    
    form#login button {
        border-radius: 8px;
padding: 10px 20px;
float: right;
border: none;
margin-left: 10px;
background: #99cc66;
text-decoration: none;
        margin-top: 15px;
    }
    
    form#login button a {
        text-decoration: none;
color: #FFF !important;
    }
    
    input.submit_button {
        padding: 0;
color: #FFF;
background: transparent;
border: 0;
    }

.login_overlay{
    height: 100%;
    width: 100%;
    background-color: #009AA6;
    opacity: 0.7;
    position: fixed;
    z-index: 998;
}
    
    input[type="text"], input[type="password"] {
        width: 100%;
    }
    
    .lost {
        float: right;
    }
    
    .btn-group {
        clear: both;
    }
    
    
</style>-->

</head>

<body <?php body_class(); ?>>

    

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ocdos' ); ?></a>



	<header id="masthead" class="site-header" role="banner">

	<div id="top-header">
<div id="top-buttons">



    <!--
    <?php 
    if ( is_user_logged_in() ) { ?>
    <p>Welcome, <?php global $current_user; get_currentuserinfo(); echo ($current_user->user_login); ?></p>
    <a class="login_button button" href="<?php echo wp_logout_url( home_url() ); ?>">LOGOUT</a>
    <a class="login_button button" href="<?php echo site_url('/members/') . $current_user->user_login ; ?>">PROFILE</a>
    
<?php } else { ?>
	
       <a class="button bp-signup" href="<?php echo esc_url( home_url( '/register/' ) ); ?>">REGISTER</a>
        <a class="login_button button" href="/login/">LOGIN</a>
    
<?php } ?>-->
<?php wp_nav_menu( array( 
                'theme_location'    => 'menu-top', 
                'menu_id'           => 'top-menu' 
            ) ); ?>
</div>
		
		
		
	</div>

		<div class="site-branding">
            <div class="container">
<?php if ( get_header_image() ) : ?>

	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">

	</a>

	<?php endif; // End header image check. ?>

			<?php

			if ( is_front_page() && is_home() ) : ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<?php else : ?>

				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

			<?php

			endif;



			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) : ?>

				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>

			<?php

			endif; ?>
            </div>
		</div><!-- .site-branding -->





	</header><!-- #masthead -->



	<div id="content" class="site-content">
			<nav id="site-navigation" class="main-navigation" role="navigation">

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <?php esc_html_e( 'Menu', 'ocdos' ); ?>
            </button>

			<?php wp_nav_menu( array( 
                'theme_location'    => 'menu-1', 
                'menu_id'           => 'primary-menu' 
            ) ); ?>

		</nav><!-- #site-navigation -->