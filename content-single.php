<?php
/**
 * The template for displaying content in the single.php template
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		 <div class="featuredImage">	
    <?php 
	
	//FLICKR BOX or IMAGE BOX
	global $current_user;

		

$image_ids = get_field('featured_gallery', false, false);

	if($image_ids) {

$shortcode = '[gallery ids="' . implode(',', $image_ids) . '" link="file" size="large"]';

echo do_shortcode( $shortcode );?>
	
	<?php } else {

	if ( has_post_thumbnail() ) {  ?>
		<div class="staticImage"><?php echo get_the_post_thumbnail($page->ID, 'large'); ?></div>
	<?php } else {


		if (get_post_meta($post->ID, 'flickr_slideshow_url', true)!="") {
			include ("functions/grow_flickr_box.php");
		} else 	if (get_post_meta($post->ID, 'flickr_image_url', true)!="") {
			include ("functions/grow_flickr_image.php");
		}
	}
	}
	
	 ?>
	</div>
	
		
	<?php if($image_ids) { ?>
		<a href="#" class="galleryShortcut"><svg height="20px" version="1.1" viewBox="0 0 22 20" width="22px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><defs><path d="M0.140487671,4 C0.0628984728,4 0,4.05793571 0,4.12879109 L0,19.8712089 C0,19.9423383 0.0631103513,20 0.140487671,20 L21.8595124,20 C21.9371015,20 22,19.9420643 22,19.8712089 L22,4.12879109 C22,4.05766174 21.9368896,4 21.8595124,4 L0.140487671,4 Z M1,5 L1,19 L21,19 L21,5 L1,5 Z M8.31146755,7.96557279 L11.5680228,13.5896033 C11.6080958,13.658809 11.694647,13.6768875 11.7588871,13.6317082 L14.5213939,11.6888683 C14.6506985,11.5979298 14.8228868,11.6296547 14.9092326,11.7648075 L19.9298551,17.6233415 C20.0147479,17.75622 19.9533678,17.8639394 19.8034742,17.8639394 L2.14722686,17.8639394 C1.99212294,17.8639394 1.92473319,17.7514312 1.99797568,17.6102003 L8.03502924,7.96915944 C8.107704,7.82902321 8.23291348,7.82991093 8.31146755,7.96557279 Z M17.5,9 C18.3284271,9 19,8.32842715 19,7.5 C19,6.67157284 18.3284271,6 17.5,6 C16.6715729,6 16,6.67157284 16,7.5 C16,8.32842715 16.6715729,9 17.5,9 Z M2,0 L2,1 L20,1 L20,0 L2,0 Z M1,2 L1,3 L21,3 L21,2 L1,2 Z" id="path-1"/></defs><g fill="none" fill-rule="evenodd" id="miu" stroke="none" stroke-width="1"><g id="editor_images_pictures_photos_collection_outline_stroke"><use fill="#000000" fill-rule="evenodd" xlink:href="#path-1"/><use fill="none" xlink:href="#path-1"/></g></g></svg> View the Gallery</a>
	<?php } ?>

		    				
		 					
						
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-excerpt"><?php the_excerpt(); ?></div>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //twentyeleven_posted_on(); ?>
			<strong>
			<?php
                    $written_by = get_post_meta($post->ID, 'Author', true);
                    if ($written_by!="") {
                        echo 'By '.$written_by;
                    }?>
			</strong>
                    <div><?php the_time('l, F jS, Y'); ?></div>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta singleEntryMeta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyeleven' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #author-info -->
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
