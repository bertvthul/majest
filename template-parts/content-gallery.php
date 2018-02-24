<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<h2>CONTENT-GALLERY</h2>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( is_single() ) :
	//the_post_thumbnail(); 
	endif;
	?>
	
	
	<?php 
	if ( is_single() ) :
	$medias = get_attached_media( 'image' );
	//echo "<pre>";print_r($medias);echo "</pre>";
	
	$galleries = get_post_galleries( get_the_ID(),false);
	echo "<pre>";print_r($galleries);echo "</pre>";
	
	if(!empty($medias)){
	?>
	<div id="teaser">
	
		<div id="owl-example" class="fgOwlTeaser owl-carousel text-center">
			<?php
			foreach($medias as $mediaid=>$media){
				?>
				<div class="item" style="background-image:url('<?php echo $media->guid; ?>');">
					
					<div class="fgOwlTeaserOverlay">
						
						<div class="fgOwlTeaserOverlayInner centered">
							<div class="fgOwlTeaserOverlayData">
								<h3 class="fgOwlTeaserTitle">
								<?php echo $media->post_content;?>
								</h3>
								<div class="fgOwlTeaserDescription">
								
									<?php //echo $attachment->post_content;?>
								</div>
																	
							</div>
						</div>
					
					</div>
					
				</div><!-- item -->
				<?php
			}
			?>
		</div><!-- owl-carousel -->
	</div><!--#teaser -->
	
	<?php
	} //if media
	endif;
	?>
	
	
	
	<header class="entry-header">
		<?php 

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<span class="post-format">
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>"><?php echo get_post_format_string( 'gallery' ); ?></a>
			</span>

			<?php //twentyfourteen_posted_on(); ?>

			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
