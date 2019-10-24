<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="tainacan-title">
			<div class="border-bottom border-jelly-bean tainacan-title-page" style="border-width: 2px !important;">
				<ul class="list-inline mb-1">
					<li class="list-inline-item text-midnight-blue font-weight-bold title-page">
						<?php the_title(); ?>
					</li>
					<li class="list-inline-item float-right title-back"><a href="javascript:history.go(-1)"><?php _e( 'Back', 'tainacan-interface' ); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="mt-3 tainacan-single-post">
			<?php get_template_part( 'template-parts/single-post' ); ?>
		</div>
		<?php if ( ! is_singular( 'page' ) ) : ?>
			<div class="row justify-content-between">
				<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'tainacan-interface' ) ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'tainacan-interface' ) ); ?></span>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php _e( 'Nothing found', 'tainacan-interface' ); ?>
<?php endif; ?>
