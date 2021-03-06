<?php
/**
 * The Template for displaying all single posts.
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
get_header(); ?>

<?php

/* If post is using aside/inTheField post format, use: includes/content-inthefield.php */
if(has_post_format('aside')):

	get_template_part( 'includes/content', 'inthefield' );

else: ?>

 	<!--do the default loop for single.php-->

	<div id="main">
	
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					
					<?php get_template_part( 'content', 'single' ); ?>

					

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>

		</div><!-- #primary -->

	</div>
	<?php get_footer(); ?>

	</div>

<?php endif; ?>