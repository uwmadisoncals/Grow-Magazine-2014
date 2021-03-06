<?php
/**
 * The template for displaying the Aside(ie. "In The Field") Post Format on index and archive pages.
 * The default template for the Aside Post Format has been overriden and saved as a backup file in /content-aside_backup.php.
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>

<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<div class="entry-content">

		<?php if ( has_post_thumbnail() ) { ?>

		<div class="itf_image_wrapper">
			<!-- the_post_thumbnail(); -->
			<a href="<?php echo get_post_permalink($thisID); ?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?></a>
		</div>
		

		<?php } else {
		//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
		 //echo '<img src="';
		 //echo catch_that_news_image();
		// echo '" alt="" />';

			 
		//get article image from flickr
		grow_get_article_image($size='thumbnail');


		} ?>

		<div class="itf_main_wrapper">

			<div class="itf_title_wrapper">
				<h2 class="itf_title"><a href="<?php echo get_post_permalink($thisID); ?>"><?php the_title(); ?></a></h2>
			</div><!-- .entry-header -->
			<div class="itf_excerpt">
			<?php the_excerpt(); ?>
			
			</div>
		</div><!-- END .itf_main_wrapper -->

		
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->