<?php
/**
 * The Template for displaying posts with Aside(ie. In the field) Post Formats.
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */

get_header(); ?>

<?php $current_issue = get_option('current_issue');?>


	<div id="main">

		<div id="primary">
		
			<div id="content" role="main">

			<?php 
			$args = array(
				'posts_per_page'=>'-1',
				'orderby'=>'title',
				'order'=>'desc',
				'category__and' => array(470,$current_issue)
				);

			$inTheField_query = new WP_Query($args);

			 ?>
	
	<div class="featuredImage">
		<div class="staticImage">
			<?php echo get_the_post_thumbnail($post->ID,'large'); ?>
		</div>
	</div>

	<header class="entry-header inTheField">
		<h1 class="entry-title"><?php single_post_title(); ?></h1>

		<?php 
		logit($post,'$post: ');
		logit($post->ID,'$post->ID: ');
		?>
	<strong class="entry-meta">By <?php the_author(); ?></strong>
	</header><!-- .entry-header -->

	<div class="itf_content"> <?php the_content(); ?> </div>

	<?php if(!$post->post_content=="") : ?>

	<hr>

	<?php endif; ?>
	

			<?php if ($inTheField_query->have_posts()) : ?>
			 	<?php while ($inTheField_query->have_posts()) : $inTheField_query->the_post();  ?>

					<?php $thisID = get_the_ID(); ?>
					
					<?php get_template_part( 'content', 'aside' ); ?>

			 	<?php endwhile; ?>
			<?php endif; ?>	
				
			</div><!-- #content -->
			<?php get_sidebar(); ?>
			
			<div class="clear"></div>
			
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>