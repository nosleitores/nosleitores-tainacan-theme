<?php
echo '<style>
nav.menu-belowheader #menubelowHeader ul.dropdown-menu {
	min-width: 10rem !important;
}';

$background_color = esc_attr( get_post_meta( tainacan_get_collection_id(), 'tainacan_theme_collection_background_color', true ) );
$text_color = esc_attr( get_post_meta( tainacan_get_collection_id(), 'tainacan_theme_collection_color', true ) );
if ( $background_color ) {
	echo ".t-bg-collection {
		background-color: " . esc_attr($background_color) . " !important;
	}";
	echo ".t-bg-collection h2, .t-bg-collection .t-collection--info-description-text {
		color: " . esc_attr($text_color) . " !important;
	}";

	echo ".t-bg-collection a {
		color: " . esc_attr($text_color) . " !important;
		opacity: 1;
	}";
}

echo '</style>';
?>

<?php if ( get_header_image() ) : ?>
	<div class="page-header header-filter page-height page-header--image-full">
		<img class="page-header__image" src="<?php header_image(); ?>" alt="Imagem">
<?php else : ?>
	<div class="page-header header-filter page-collection page-header--image-full">
		<img class="page-header__image" src="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/images/capa.png" alt="Imagem">
<?php endif; ?>
	<div class="container-fluid px-0 t-bg-collection" style="<!-- z-index: 0; -->">
		<div class="collection-header position-relative max-large" style="">
			<?php do_action( 'tainacan-interface-collection-header' ); ?>
			<?php if ( has_post_thumbnail( tainacan_get_collection_id() ) ) : 
				$thumbnail_id = get_post_thumbnail_id( $post->ID );
				$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
				<img src="<?php echo get_the_post_thumbnail_url( tainacan_get_collection_id() ); ?>" class="t-collection--info-img rounded-circle img-fluid border border-white position-absolute text-left" alt="<?php echo esc_attr($alt); ?>">
			<?php else : ?>
				<div class="image-placeholder rounded-circle border border-white position-absolute">
					<h4 class="text-center">
					<?php
						echo esc_html( tainacan_get_initials( tainacan_get_the_collection_name() ) );
					?>
					</h4>
				</div>
			<?php endif;
			global $wp; ?>
			<div class="collection-header--share">
				<div class="btn trigger">
					<span class="tainacan-icon tainacan-icon-share"></span>
				</div>
				<div class="icons">
					<?php if ( true == get_theme_mod( 'tainacan_facebook_share', true ) ) : ?> 
						<div class="rotater">
							<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( home_url( $wp->request ) ); ?>" target="_blank">
								<div class="btn btn-icon">
									<i class="tainacan-icon tainacan-icon-facebook"></i>
								</div>
							</a>
						</div>
					<?php endif; ?>
					<?php if ( true == get_theme_mod( 'tainacan_twitter_share', true ) && get_theme_mod( 'tainacan_twitter_user' ) ) : ?> 
						<div class="rotater">
							<a href="http://twitter.com/share?url=<?php echo esc_url( home_url( $wp->request ) ); ?>&amp;text=<?php the_title_attribute(); ?>&amp;via=<?php echo esc_attr( get_theme_mod( 'tainacan_twitter_user', '' ) ); ?>" target="_blank">
								<div class="btn btn-icon">
									<i class="tainacan-icon tainacan-icon-twitter"></i>
								</div>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row t-collection--info max-large margin-one-column" style="overflow-x: inherit;">
			<div class="col-md-2 col-3 px-0">
				
			</div>
			<div class="col-md-10 col-9 pl-0 t-collection--col-9" style="z-index: 2">
				<h2 class="t-collection--info-title text-white">
					<?php tainacan_the_collection_name(); ?>
				</h2>
				<?php $tainacan_collection_description = tainacan_get_the_collection_description(); ?>
				<?php if ( ! empty( $tainacan_collection_description ) || has_action( 'tainacan-interface-collection-description' ) ) : ?>
					<div class="text-white t-collection--info-description-text tainacan-interface-truncate">
						<?php tainacan_the_collection_description(); ?>
						<?php do_action( 'tainacan-interface-collection-description' ); ?>
					</div>
				<?php endif; ?>
			</div>
			<?php do_action( 'tainacan-interface-collection-header-bottom' ); ?>
		</div>
	</div>
</div>
