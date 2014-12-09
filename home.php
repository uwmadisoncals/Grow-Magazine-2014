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
				<div class="toc clearfix">
					<h3 class="issueTitle">



<?php 
query_posts(array('category__and' => array(1080,$current_issue), "showposts" => '1') );
while (have_posts()) : the_post();?>
	<a href="<?php the_field('pdf_issue'); ?>"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
<path d="M25,47.4l-5.7-5.7c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l4.3,4.3l4.3-4.3c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4L25,47.4z"/>
<g>
	<path d="M41.1,36H32c-0.6,0-1-0.4-1-1s0.4-1,1-1h9.1c3.8,0,6.9-3.1,6.9-6.9s-3.1-6.9-6.9-6.9c-0.3,0-0.6-0.1-0.8-0.3
		c-0.2-0.2-0.3-0.5-0.3-0.8c0.1-0.5,0.1-1,0.1-1.4c0-6.1-5-11.1-11.1-11.1c-4.6,0-8.8,2.9-10.4,7.3c-0.1,0.3-0.4,0.6-0.7,0.6
		c-0.3,0.1-0.7,0-0.9-0.3c-0.9-0.9-2.2-1.5-3.5-1.5c-2.8,0-5,2.2-5,5l0,0.2c0,0.5-0.3,0.9-0.7,1c-3.3,0.9-5.6,4-5.6,7.4
		C2,30.6,5.4,34,9.7,34H18c0.6,0,1,0.4,1,1s-0.4,1-1,1H9.7C4.3,36,0,31.7,0,26.3c0-4.1,2.6-7.7,6.4-9.1c0.2-3.6,3.3-6.5,7-6.5
		c1.4,0,2.7,0.4,3.9,1.2C19.4,7.4,24,4.5,29,4.5c7.3,0,13.1,5.9,13.1,13.1c0,0.2,0,0.4,0,0.6c4.4,0.5,7.9,4.3,7.9,8.8
		C50,32,46,36,41.1,36z"/>
	<path d="M25,46.7c-0.6,0-1-0.4-1-1V26c0-0.6,0.4-1,1-1s1,0.4,1,1v19.7C26,46.2,25.6,46.7,25,46.7z"/>
</g>
</svg>      
<?php endwhile; ?>
<?php wp_reset_query(); ?>
				 <span>Fall 2014 Issue</span></a></h3>

					<div class="tocContent">
						<ul>
						<?php query_posts(array('cat' => '26,-1080', 'category__and' => array($current_issue), "showposts" => '1', 'orderby'=>'title', 'order'=> 'asc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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
                                             
                            				 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						<?php query_posts(array('cat' => '17,-470,-26,-1080', 'category__and' => array($current_issue), "showposts" => '3', 'orderby'=>'title', 'order'=> 'desc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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
                                             
                            				 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						<?php query_posts(array('cat' => '18', 'category__and' => array($current_issue), "showposts" => '1', 'orderby'=>'title', 'order'=> 'desc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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
                                             
                            				 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						<?php query_posts(array('cat' => '19', 'category__and' => array($current_issue), "showposts" => '10', 'orderby'=>'title', 'order'=> 'asc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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
                                             
                            				 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						
						
						<?php query_posts(array('cat' => '27', 'category__and' => array($current_issue), "showposts" => '1', 'orderby'=>'title', 'order'=> 'asc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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
                                             
                            				 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						
						<?php query_posts(array('cat' => '15', 'category__and' => array($current_issue), "showposts" => '1', 'orderby'=>'title', 'order'=> 'asc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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
                                             
                            				 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						
						<?php query_posts(array('cat' => '22', 'category__and' => array($current_issue), "showposts" => '10', 'orderby'=>'title', 'order'=> 'asc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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
                                             
                            				 

										</li>




									

							  <?php endwhile; ?>
						<?php endif; ?>
						
						<?php query_posts(array('cat' => '24', 'category__and' => array($current_issue), "showposts" => '10', 'orderby'=>'title', 'order'=> 'asc')); ?>

							<?php if (have_posts()) : ?>
							  <?php while (have_posts()) : the_post();  ?>

												
							  	<li class="row clearfix">
														
							  		
														
								




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


<?php query_posts(array('category__and' => array(26, $current_issue), "showposts" => '1', 'orderby'=>'date', 'order'=> 'desc')); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

					<div class="span-50 box dropin">

							<h2>Feature</h2>

							
	





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
											<p><?php the_excerpt(); ?></p>
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

<?php query_posts(array('category__and' => array(17, $current_issue), "showposts" => '1', 'offset' => '1', 'orderby'=>'date', 'order'=> 'desc')); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

					<div class="span-50 box dropin">

							<h2>Feature</h2>

							
	





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
											<p><?php the_excerpt(); ?></p>
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
					<div class="span-33 box doubleheight">
						
							
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
											<p><?php the_excerpt(); ?></p>
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

					<div class="span-66">
						
						<div class="box span-100 dropin">

							<h2>Feature</h2>
<?php query_posts(array('category__and' => array(17,$current_issue), "cat" => "-26", "showposts" => '1', "offset" => "1", "orderby" => "date", "order" => "des")); ?>
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
											<p><?php if ($post->post_excerpt != "" ) {
echo "<p><b>".$post->post_excerpt."</b></p>";
}
?></p>
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

						<div class="box span-100 dropin2">

							<h2>Field Notes</h2>
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
											<p><?php if ($post->post_excerpt != "" ) {
echo "<p><b>".$post->post_excerpt."</b></p>";
}
?></p>
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


					<div class="row clearfix">
					<div class="span-50 box doubleheight">
						
							
<?php query_posts(array('category__and' => array($current_issue), "cat"=>"-255,-1080,-20,-24,-470","offset" => '1', "showposts" => '1', "orderby" => "date", "order" => "des")); ?>
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
											<p><?php if ($post->post_excerpt != "" ) {
echo "<p><b>".$post->post_excerpt."</b></p>";
}
?></p>
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

					<div class="span-50 box doubleheight">
						
						

							
<?php query_posts(array('category__and' => array(165,$current_issue), "cat"=>"-255,-1080,-20,-24,-470", "showposts" => '1', "orderby" => "date", "order" => "des")); ?>
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
											<p><?php if ($post->post_excerpt != "" ) {
echo "<p><b>".$post->post_excerpt."</b></p>";
}
?></p>
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



				</div>

				</div> <!-- span-75 -->

				</div> <!-- main row -->

			</div><!-- #content -->

			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>
