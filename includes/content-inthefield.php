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
				//'posts_per_page'=>'-1',
				//'orderby'=>'title',
				//'order'=>'desc',
				//'category__and' => array(470,$current_issue)
				'posts_per_page'=>'-1',
				'orderby'=>'meta_value_num',
				'meta_key'=>'cheesemaster_order',
				'order'=>'asc',
				'category__and' => array(470,$current_issue)
				);

			$inTheField_query = new WP_Query($args);

			 ?>
	
	<!--<div class="featuredImage">
		<div class="staticImage"> -->
			<?php /* echo get_the_post_thumbnail($post->ID,'large'); */ ?>
		<!-- </div>
	</div> -->

	<header class="entry-header inTheField">
		<h1 class="entry-title"><?php single_post_title(); ?></h1>

		<?php 
		//logit($post,'$post: ');
		//logit($post->ID,'$post->ID: ');
		?>
		<div class="summary"><?php the_content(); ?></div>
	
	</header><!-- .entry-header -->

	

	<?php if(!$post->post_content=="") : ?>

	<hr>

	<?php endif; ?>
	
	
	<?php query_posts(array('cat' => '470', 'category__and' => array($current_issue), "showposts" => '45', 'orderby'=>'title', 'order'=> 'asc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<div class="row clearfix">
														
							  		
														
								




							  	<div class="span-25 alt">
							  		<div class="tocPhoto">
							  <?php	if ( has_post_thumbnail() ) {

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
							</div>
						</div>
										<div class="tocItem span-75">
											<h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											
											</div>
                                             
                            				 

										</div>




									

							  <?php endwhile; ?>
						<?php endif; ?>
	

			<?php if ($inTheField_query->have_posts()) : ?>
			 	<?php while ($inTheField_query->have_posts()) : $inTheField_query->the_post();  ?>

					<?php $thisID = get_the_ID(); ?>
					
					<?php get_template_part( 'content', 'aside' ); ?>

			 	<?php endwhile; ?>
			<?php endif; ?>	
				
			</div><!-- #content -->

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('cheesemaker_sidebar') ) : 
 
			endif; ?>
					
			<?php get_sidebar(); ?>


			
			<div class="clear"></div>
			
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>