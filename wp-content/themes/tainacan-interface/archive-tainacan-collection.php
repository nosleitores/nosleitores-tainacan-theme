<?php get_header(); ?>

<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>

<main role="main" class="max-large margin-one-column">
	<div class="row">
		<div class="col col-sm mx-sm-auto">
			<div class="form-inline mt-4 tainacan-collection-list--simple-search justify-content-between">
				
				<div class="dropdown dropdown-sorting">
					<button class="btn bg-white dropdown-toggle text-black" type="button" id="dropdownMenuSorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php _e( 'Sorting', 'tainacan-interface' ); ?>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuSorting">
						<a class="dropdown-item text-black <?php tainacan_active( get_query_var( 'orderby' ), 'date' ); ?>" href="<?php echo add_query_arg( 'orderby', 'date' ); ?>"><?php _e( 'Creation date', 'tainacan-interface' ); ?></a>
						<a class="dropdown-item text-black <?php tainacan_active( get_query_var( 'orderby' ), 'title' ); ?>" href="<?php echo add_query_arg( 'orderby', 'title' ); ?>"><?php _e( 'Title', 'tainacan-interface' ); ?></a>
					</div>
				</div>
					
				<a class="btn btn-white bg-white <?php tainacan_active( get_query_var( 'order' ), 'ASC' ); ?>" href="<?php echo add_query_arg( 'order', 'ASC' ); ?>">
					<i class="tainacan-icon tainacan-icon-18px tainacan-icon-sortascending"></i>
				</a>
				<a class="btn btn-white bg-white <?php tainacan_active( get_query_var( 'order' ), 'DESC' ); ?>" href="<?php echo add_query_arg( 'order', 'DESC' ); ?>">
					<i class="tainacan-icon tainacan-icon-18px tainacan-icon-sortdescending"></i>
				</a>
				
				<div class="dropdown margin-one-column-left dropdown-viewMode">
					<button class="btn bg-white dropdown-toggle text-black" type="button" id="dropdownMenuViewMode" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="tainacan-icon tainacan-icon-18px tainacan-icon-viewtable text-oslo-gray"></i>
						<span class="d-none d-md-inline"><?php _e( 'View Mode', 'tainacan-interface' ); ?></span>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuViewMode">
						<a class="dropdown-item text-black <?php tainacan_active( get_query_var( 'tainacan_collections_viewmode' ), 'cards' ); ?>" href="<?php echo add_query_arg( 'tainacan_collections_viewmode', 'cards' ); ?>"><?php _e( 'Cards', 'tainacan-interface' ); ?></a>
						<a class="dropdown-item text-black <?php tainacan_active( get_query_var( 'tainacan_collections_viewmode' ), 'grid' ); ?>" href="<?php echo add_query_arg( 'tainacan_collections_viewmode', 'grid' ); ?>"><?php _e( 'Thumbnails', 'tainacan-interface' ); ?></a>
						<a class="dropdown-item text-black <?php tainacan_active( get_query_var( 'tainacan_collections_viewmode' ), 'table' ); ?>" href="<?php echo add_query_arg( 'tainacan_collections_viewmode', 'table' ); ?>"><?php _e( 'Table', 'tainacan-interface' ); ?></a>
					</div>
				</div>
				
				<form role="search" class="ml-auto" method="get" id="tainacan-collection-search">
					<input type="hidden" name="orderby" value="<?php echo get_query_var( 'orderby' ); ?>" />
					<input type="hidden" name="order" value="<?php echo get_query_var( 'order' ); ?>" />
					<input type="hidden" name="tainacan_collections_viewmode" value="<?php echo get_query_var( 'tainacan_collections_viewmode' ); ?>" />
					<div class="input-group">
						<input class="form-control rounded-0" type="search" name="s" value="<?php echo get_query_var( 's' ); ?>" placeholder="<?php esc_attr_e( 'Search collections', 'tainacan-interface' ); ?>" />
						<span class="input-group-append">
							<button class="btn border border-left-0 rounded-0 bg-white text-midnight-blue" type="submit">
								<i class="tainacan-icon tainacan-icon-20px tainacan-icon-search" style="line-height: inherit;"></i>
							</button>
						</span>
					</div>
				</form>
			</div>

			<?php get_template_part( 'template-parts/loop-tainacan-collection', get_query_var( 'tainacan_collections_viewmode' ) ); ?>
		</div>
	</div><!-- /.row -->
</main>
<?php get_footer(); ?>
