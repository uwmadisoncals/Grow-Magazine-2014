<?php
/**
 * Template Name: In the Field
 */

get_header(); ?>

<?php //$current_issue = get_option('current_issue'); ?>


	<div id="main">

		<div id="primary">
		
			<div id="content" role="main">

			<?php query_posts(array('cat' => '470', 'category__and' => array($current_issue), "showposts" => '1', 'orderby'=>'title', 'order'=> 'desc')); ?>

			<?php if (have_posts()) : ?>
			 	<?php while (have_posts()) : the_post();  ?>
					
					<?php $thisID = get_the_ID(); ?>
			 		

					<?php if ( has_post_thumbnail() ) {

    				//the_post_thumbnail();
    				echo get_the_post_thumbnail($page->ID, 'thumbnail');

    				} else {
					//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
					 //echo '<img src="';
					 //echo catch_that_news_image();
					// echo '" alt="" />';

    					 
					//get article image from flickr
					grow_get_article_image($size='thumbnail');


					} ?>

					//todo
					<h1 class="entry-title"><a href="<?php echo get_post_permalink($thisID); ?>"><?php the_title(); ?></a></h1>

					<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					} 
					?>

					<p><?php the_excerpt(); ?> </p>

			 	<?php endwhile; ?>
			<?php endif; ?>	
				
			</div><!-- #content -->
			<?php get_sidebar(); ?>
			
			<div class="clear"></div>
			
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>






