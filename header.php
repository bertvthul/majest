<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package majest
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'majest' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			
		<?php if ( is_active_sidebar( 'logo' ) ) : ?>
			<div id="logo" class="logo widget-area">
				<?php dynamic_sidebar( 'logo' ); ?>
			</div><!-- #logo -->
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
			
		<?php endif; ?>
			
			
			
			
			
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'majest' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu full' ) ); ?>
		</nav><!-- #site-navigation -->
		
		
		
		
	</header><!-- #masthead -->
	
	<div id="teaser">
	<?php if ( get_header_image() ) : ?>
		<?php
			if ( is_front_page() && is_home() ) : ?>
		<?php 
		
		$headers = get_uploaded_header_images();
		
		?>
		<div id="owl-example" class="fgOwlTeaser owl-carousel text-center">
			<?php
			//print_r($headers);
			foreach($headers as $headerid=>$header){
				$attachment = get_post( $headerid );
				//print_r($attachment);
				?>
				<div class="item" style="background-image:url('<?php echo $header["thumbnail_url"]; ?>');">
					
					<div class="fgOwlTeaserOverlay">
						
						<div class="fgOwlTeaserOverlayInner centered">
							<div class="fgOwlTeaserOverlayData">
								<h3 class="fgOwlTeaserTitle">
								<?php echo $attachment->post_excerpt;?>
								</h3>
								<div class="fgOwlTeaserDescription">
								
									<?php echo $attachment->post_content;?>
								</div>
																	
							</div>
						</div>
					
					</div>
					
				</div>
				<?php
			}
			?>
		</div>
		<?php endif; // if home ?>
		<?php endif; // End header image check. ?>
	</div>
	
	
	
	<div id="content" class="site-content">
