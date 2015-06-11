<?php
/**
 * The Template for displaying all single posts.
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */

get_header(); ?>


	<div id="main">

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php

					if(has_post_format('aside')){

						get_template_part( 'content', get_post_format() );

					}else{
						
						 get_template_part( 'content', 'single' );
					}

					?>
					

					

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>

		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>