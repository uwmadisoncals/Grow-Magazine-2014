<?php 
/* Template Name: Home - Grow
*/
?>
<?php 
//exit();
//check whether this is a test. If not, load current_issue
global $current_user;

$current_issue = get_option('current_issue');

if (current_user_can('admin') && $_GET['tci']!="") {
	$current_issue = $_GET['tci'];
} 
?>
<?php


get_header(); ?>




	<div id="main">

		<div id="primary">
			<div id="content" class="fullWidth" role="main">

			<div class="row clearfix">
			<div class="span-25">
				<div class="toc">
					<h3 class="issueTitle">Summer 2014 Issue</h3>

					<div class="tocContent">
						<ul>
						<?php query_posts(array('category__and' => array($current_issue), "showposts" => '20', 'orderby'=>'date', 'order'=> 'desc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li>
														
							  		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
														
								





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
			
											<h3 class="spotlight_title"><?php the_title(); ?></h3>
											<p><?php the_excerpt(); ?></p>
                                             
                            				</a> 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						</ul>
					</div>

				</div>
			</div>
			
			<div class="span-75">

				<!-- CALS News Content Box -->
				<div class="row clearfix">


<?php query_posts(array('cat'=>'-26', 'category__and' => array(17, $current_issue), "showposts" => '2', 'orderby'=>'date', 'order'=> 'desc')); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

					<div class="span-50 box dropin">

							<h2>Featured</h2>

							
	





  <?php	if ( has_post_thumbnail() ) {

		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'medium');

		    				} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							 //echo '<img src="';
							 //echo catch_that_news_image();
							// echo '" alt="" />';

		    					 
							//get article image from flickr
							grow_get_article_image($size='medium');
		

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>








							<a href="http://news.cals.wisc.edu" class="moreButton">More Featured</a>


						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>

					</div>

	  <?php endwhile; ?>
<?php endif; ?>

					

				</div>

				<div class="row clearfix">

					<div class="span-33 box dropin3">
							<h2>AROUND THE COLLEGE</h2>

							
<?php query_posts(array('category__and' => array(25,$current_issue), "showposts" => '1', "orderby" => "date", "order" => "des")); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

  <?php	if ( has_post_thumbnail() ) {

		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'medium');

		    				} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							 //echo '<img src="';
							 //echo catch_that_news_image();
							// echo '" alt="" />';

		    					 
							//get article image from flickr
							grow_get_article_image($size='medium');
		

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>






  <?php endwhile; ?>
<?php endif; ?>

							<a href="http://ecals.cals.wisc.edu" class="moreButton">More from the College</a>
						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>
					</div>

					<div class="span-33 box dropin3">
							<h2>AROUND THE COLLEGE</h2>

							
<?php query_posts(array('category__and' => array(20,$current_issue), "showposts" => '1', "orderby" => "date", "order" => "des")); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

  <?php	if ( has_post_thumbnail() ) {

		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'medium');

		    				} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							 //echo '<img src="';
							 //echo catch_that_news_image();
							// echo '" alt="" />';

		    					 
							//get article image from flickr
							grow_get_article_image($size='medium');
		

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>






  <?php endwhile; ?>
<?php endif; ?>

							<a href="http://ecals.cals.wisc.edu" class="moreButton">More from the College</a>
						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>
					</div>

					<div class="span-33 box dropin3">
							<h2>AROUND THE COLLEGE</h2>

							
<?php query_posts(array('category__and' => array(27,$current_issue), "showposts" => '1', "orderby" => "post_date", "order" => "asc")); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

  <?php	if ( has_post_thumbnail() ) {

		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'medium');

		    				} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							 //echo '<img src="';
							 //echo catch_that_news_image();
							// echo '" alt="" />';

		    					 
							//get article image from flickr
							grow_get_article_image($size='medium');
		

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>






  <?php endwhile; ?>
<?php endif; ?>

							<a href="http://ecals.cals.wisc.edu" class="moreButton">More from the College</a>
						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>
					</div>

				</div>

				</div> <!-- span-75 -->

				</div> <!-- main row -->

			</div><!-- #content -->

			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>
