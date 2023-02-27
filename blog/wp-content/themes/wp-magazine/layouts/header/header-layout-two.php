<?php $header_text_color = get_header_textcolor(); ?>
<?php
$header_bg = "";
if( has_header_image() ) {
	$header_bg = ' style=background-image:url('. esc_url( get_header_image() ) .')';
}
?>
<header>
	
	<section class="top-info pri-bg-color">
		<div class="container">
			<div class="row">
				<!-- Brand and toggle get grouped for better mobile display -->	

				


				<div class="col-xs-5">

					<?php wp_magazine_social_links(); ?>

			</div>

			<?php if( get_theme_mod( 'header_search_display_option', true ) ) : ?>
				<div class="col-xs-7 text-right"><div class="search-top"><?php get_search_form( $echo = true ); ?></div></div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="top-bar"<?php echo esc_attr( $header_bg ); ?>>
	<div class="container">
		<div class="row top-head-2">
			<div class="col-sm-4 logo text-left">
				
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				}
				if( display_header_text() ) : ?>
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></div>
					<div class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></div>

				<?php endif; ?>
				<?php if( get_theme_mod( 'header_date_display_option', true ) ) { ?>
					<div class="date-time">
						<?php echo date( get_option( 'date_format' ) ); ?>
						
					</div>
				<?php } ?>
			</div>

			<?php wp_magazine_header_ad(); ?>
		</div>
	</div> <!-- /.end of container -->
</section> <!-- /.end of section -->





<section  class="main-nav nav-two <?php if( $menu_sticky ) echo ' sticky-header'; ?>">
	<div class="container">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><!-- <?php esc_html_e( 'Primary Menu', 'wp-magazine' ); ?> -->
				<div id="nav-icon">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div>
</section>

</header>