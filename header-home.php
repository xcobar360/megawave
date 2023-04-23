<?php
/**
 * The Header for multipage of theme
 *
 * Displays all of the <head> section and everything up till </header>
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $preloader_show = (function_exists('ot_get_option'))? ot_get_option( 'preloader_show', 'on' ) : 'on'; ?>
	<?php if($preloader_show == 'on'): ?>
    <div id="preloader">
        <div class="small1">
            <div class="small ball smallball1"></div>
            <div class="small ball smallball2"></div>
            <div class="small ball smallball3"></div>
            <div class="small ball smallball4"></div>
        </div>
        <div class="small2">
            <div class="small ball smallball5"></div>
            <div class="small ball smallball6"></div>
            <div class="small ball smallball7"></div>
            <div class="small ball smallball8"></div>
        </div>
        <div class="bigcon">
            <div class="big ball"></div>
        </div>
    </div>
    <?php endif; ?>
	<form id="login" action="login" method="post">
    	<a class="close" href=""><i class="fa fa-times" ></i></a>
    	<div class="user-login-content">
            <h1><?php echo esc_html__('Sign In','gocourier'); ?></h1>
            <p class="sign-in-details"><?php echo esc_html__('Sign in to Go for getting all details', 'gocourier'); ?></p>
            <p class="status"></p>
            <input id="username" type="text" name="username" class="form-control" placeholder="<?php echo esc_attr__('username', 'gocourier'); ?>">
            <input id="password" type="password" name="password" class="form-control" placeholder="<?php echo esc_attr__('*****', 'gocourier'); ?>">            
            <input class="submit_button button form-control" type="submit" value="<?php echo esc_attr__('Sign in now','gocourier'); ?>" name="submit">
            <a class="lost" href="<?php echo wp_lostpassword_url(); ?>"><?php echo esc_html__('Forgot password?','gocourier'); ?></a>
            
            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
        </div>
        <div class="login-form-boootom-content">
            <p><?php echo esc_html__('Do not have an account?','gocourier'); ?></p>
            <?php
            if(class_exists( 'woocommerce' )):
                $log_in_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
            else:
                $log_in_url = wp_login_url();
            endif;
            ?>
            <a href="<?php echo esc_url($log_in_url); ?>"><?php echo esc_html__('Create a free account','gocourier'); ?></a>
        </div>
    </form>
    <div id="wrapper">
    	<?php  $homepage_header_layout = get_post_meta( get_the_ID(), 'homepage_header_layout', true ); ?>
    	<header class="header-main <?php echo esc_attr($homepage_header_layout); ?>">
        	<div class="container-fluid padding-zero header-top">
            	<div class="col-md-6 padding-zero">
                <?php 
				$args = array(
				'theme_location'  => 'top-menu',
				'menu_class'      => 'header-top-menu navbar-left',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'fallback_cb'     => '',
				'container'       => '',
				'depth'			  => 1,
				);
				wp_nav_menu( $args ); ?>
                </div>
                <div class="col-md-6 padding-zero">
                	<div class="top-header-info">
                    <?php
                    $show_signin_option_in_header = (function_exists('ot_get_option'))? ot_get_option( 'show_signin_option_in_header', 'on' ) : 'on';
                    if($show_signin_option_in_header == 'on'):
                        if(is_user_logged_in()): ?>
                            <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>"><?php echo esc_html__('sign out', 'gocourier'); ?></a>
                        <?php
                        else:
                            ?>
                            <a href="" class="login_button" id="show_login"><?php echo esc_html__('sign in','gocourier'); ?></a>
                        <?php endif; 
                    endif;
                    ?>
                	<?php $header_top_contact_info = (function_exists('ot_get_option'))? ot_get_option( 'header_top_contact_info', '' ) : ''; ?>
                    <?php if($header_top_contact_info != ''): ?>
                    <p><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html__('Call Us Now: ', 'gocourier'); ?><span><?php echo esc_html($header_top_contact_info); ?></span></p>
                    <?php endif; ?>                  
                    </div>
                    
                </div>
            </div>
            <?php $sticky_menu_header = (function_exists('ot_get_option'))? ot_get_option( 'sticky_menu_header', 'on' ) : 'on';
			if($sticky_menu_header == 'on'):
				$class_sticky = ' header-sticky';
			else:
				$class_sticky = '';
			endif;
			?>
            <?php ?>
            <div class="header-style-default<?php echo esc_attr($class_sticky); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
						<?php
						if($homepage_header_layout == 'style_2'){
							$logo = (function_exists('ot_get_option'))? ot_get_option( 'main_logo_alter', GOCOURIERTHEMEURI. 'images/logo-2.png' ) : GOCOURIERTHEMEURI. 'images/logo-2.png';
						}else{
                        	$logo = (function_exists('ot_get_option'))? ot_get_option( 'main_logo', GOCOURIERTHEMEURI. 'images/logo.png' ) : GOCOURIERTHEMEURI. 'images/logo.png';
						}
						?>
                        <a class="visible-sec navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                        </a>
                    </div>
                    <div class="col-md-10">
                        <nav class="yamm navbar navbar-default">
                        
                            <div class="navbar-table">
                                <div class="navbar-cell tight">
                                    <div class="navbar-header">									
                                        <div class="hidden-sec slim-wrap" data-image="<?php echo esc_url($logo); ?>" data-homelink="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <?php
                                        $search_icon_in_menu = (function_exists('ot_get_option'))? ot_get_option( 'search_icon_in_menu', 'on' ) : 'on';
                                        $extra_menu = '';
                                        if($search_icon_in_menu == 'on'):
                                        $extra_menu .= '<li class="dropdown has-submenu searchmenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <i class="fa fa-search"></i></a>
                                                <ul class="dropdown-menu start-right" role="menu">
                                                    <li>
                                                        <form class="form-search form-horizontal">
                                                            <div class="input-append">
                                                                <input name="s" type="text" class="search-query form-control" placeholder="'.esc_attr__('Search', 'gocourier').'">
                                                            </div>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>';
                                        endif;
                                        
                                        $args_slim = array(
                                        'theme_location'  => 'header-menu',
                                        'menu_class'      => 'menu-items',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s '.$extra_menu.'</ul>',
                                        'fallback_cb'     => '',
                                        'container'       => '',
                                        );											
                                        wp_nav_menu( $args_slim );
                                        ?>
                                    	</div>
                                    </div><!-- end navbar-header -->
                                </div><!-- end navbar-cell -->
    
                                <div class="navbar-cell stretch visible-sec">
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                        <div class="navbar-cell">                                            	
                                            <?php 
                                            $args = array(
                                            'theme_location'  => 'header-menu',
                                            'menu_class'      => 'nav navbar-nav navbar-right',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s '.$extra_menu.'</ul>',
                                            'fallback_cb'     => '',
                                            'container'       => '',
                                            );
                                            wp_nav_menu( $args ); ?>             
                                        </div><!-- end navbar-cell -->
                                    </div><!-- /.navbar-collapse -->        
                                </div><!-- end navbar cell -->
                            </div><!-- end navbar-table -->                            
                		</nav><!-- end navbar -->
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
            </div>
        </header>