<?php 

 
//exit();
//check whether this is a test. If not, load current_issue
global $current_user;

$current_issue = get_option('current_issue');

if (current_user_can('admin') && $_GET['tci']!="") {
	$current_issue = $_GET['tci'];
} 



/** Outputs a full page navigation menu 
 *
 *
 *
 * @param $post obj 
 * @param $parent_before string custom html code to be printed before parent page link is printed
 * @param $parent_after string custom html code to be printed after parent page link is printed
 * @param $current_page_ancestors array
 * @param $top_ancestor int id of top-most parent page
 * @depth_count int internal counter used by function to keep track of depth level of current iteration
*/

function cals_page_navigation_menu($post, $parent_before = '', $parent_after= '', $current_page_ancestors, $top_ancestor = '', $depth_count = 0){
	
	//Temporarily assign $post as the new  global $post
	//(needed to keep wordpress from overriding the $post variable within the function)
	$GLOBALS['post'] = $post; 
					
	//Check whether $post item has children only if $post is:
	  	// - The top ancestor
		// - The current page
		// - One of the current page's ancestors
		
	//This condition keeps the nav bar from printing every single child page
	if($top_ancestor == $post->ID || is_page($post->ID) || in_array($post->ID, $current_page_ancestors)){
		$children = get_pages('child_of='.$post->ID.'&parent='.$post->ID.'&hierarchical=0&post_type=page&sort_column=menu_order&sort_order=ASC');
	}
	
	//Is the current item the top ancestor?
	if($top_ancestor == $post->ID){
		$is_top_ancestor = true;
	}
	
	//If the current item is top_ancestor, print opening custom html specified by $parent_before param (if available).
	//Otherwise, print generic li element
	if($is_top_ancestor) {
		echo $parent_before;
	} else {
		echo '<li class="page_item page-item-'.$post->ID.'">';
	}
	
	//print menu element link
	?>
				
	<a href="<?php the_permalink(); ?>" <?php if (is_page($post->ID)){ echo 'class="current_link"';}?> title="<?php the_title();?>"><span class="white"><?php the_title();?></span><span class="arrow"></span></a>
	
	<?php 
	//If the current item is top_ancestor is top_ancestor, print closing custom html for it 
	//(if available)
	if($is_top_ancestor){
		echo $parent_after;
	}
	
	//if there are children, print them
	if(count($children)>0){
		
		//since there are children, we are going in deeper, so increase depth 
		//counter to keep track of how deep we are in the hierarchy
		$depth_count++;
		
		//Wrap children with <ul>, but only assign class "children if $depth_count>1,
		//to be consistent with WP
		
		?>
		<ul <?php if($depth_count>1) { echo 'class="children"'; }?>>
					
		<?php
		//get current item's children
		foreach($children as $child){
			cals_page_navigation_menu($child, '', '', $current_page_ancestors, '', $depth_count);
		}
		
		?>
	   
		
		</ul>
	
	<?php 
	} else {
		//The current item has no children, so we are going back one level
		$depth_count--;
	}
	
	if(!$is_top_ancestor){
		echo '</li>';
	}
				
} //EOF cals_page_navigation_menu
?>

<div class="toc sidebarRow">
<div class="row clearfix">
			<div>
				<div class="toc clearfix">
					<h3 class="issueTitle"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 471.8 351.1" enable-background="new 0 0 471.8 351.1" xml:space="preserve">
<path d="M456.4,81.5H130.7c-6.6,0-12-5.4-12-12V13c0-6.6,5.4-12,12-12h325.7c6.6,0,12,5.4,12,12v56.5
	C468.4,76.1,463,81.5,456.4,81.5z"/>
<path d="M456.4,209.1H130.7c-6.6,0-12-5.4-12-12v-56.5c0-6.6,5.4-12,12-12h325.7c6.6,0,12,5.4,12,12v56.5
	C468.4,203.7,463,209.1,456.4,209.1z"/>
<path d="M374.4,346.4H130.7c-6.6,0-12-5.4-12-12v-56.5c0-6.6,5.4-12,12-12h243.7c6.6,0,12,5.4,12,12v56.5
	C386.4,341,381,346.4,374.4,346.4z"/>
<circle cx="40.6" cy="41.3" r="38.6"/>
<circle cx="40.6" cy="168.8" r="38.6"/>
<circle cx="40.6" cy="306.1" r="38.6"/>
</svg> <span>Spring 2015 Issue</span></h3>

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
						
						
						<?php query_posts(array('cat' => '27', 'category__and' => array($current_issue), "showposts" => '3', 'orderby'=>'title', 'order'=> 'asc')); ?>

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
						
						<?php query_posts(array('cat' => '15', 'category__and' => array($current_issue), "showposts" => '5', 'orderby'=>'title', 'order'=> 'asc')); ?>

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
						
						<?php query_posts(array('cat' => '165', 'category__and' => array($current_issue), "showposts" => '1', 'orderby'=>'title', 'order'=> 'asc')); ?>

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
						
						<?php query_posts(array('cat' => '22', 'category__and' => array($current_issue), "showposts" => '5', 'orderby'=>'title', 'order'=> 'asc')); ?>

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
						
						<?php query_posts(array('cat' => '24', 'category__and' => array($current_issue), "showposts" => '1', 'orderby'=>'title', 'order'=> 'asc')); ?>

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
						<?php endif; ?>						</ul>
					</div>

				</div>
			</div>
</div>

<ul id="nav_sidebar">
	<?php
	
	//setup parameters
		//current page's title
		$the_title = get_the_title();

		//select main level pages except the current one, so they are excluded 
		$current_page_ancestors = get_post_ancestors($post);
		
		
		//get top ancestor information
			$top_ancestor = $current_page_ancestors[count($current_page_ancestors)-1];	
			
			//define class for top ancestor
			if($top_ancestor==""){
				//this is a top-level page
				$top_ancestor = $post->ID;
				$css_class = "current_page_item";
			} else {
				//this is a child-level page
				$css_class = "current_page_ancestor";
			}

			$top_ancestor_post = get_posts('include='.$top_ancestor.'&posts_per_page=1&post_type=page');
			
		//define custom html parameters for $top_ancestor
		$parent_before = '<h3 class="page_item page-item-'.$top_ancestor.' '.$css_class.'">';
		$parent_after = '</h3>';
	
		//Run the stuff
		//hold original $post
		$tmp_post = $post;
	
		//print li.pagenav element, which wraps all elements in hierarchical menus in WP
		echo '<li class="pagenav">';
	
		//populate list
		foreach($top_ancestor_post as $post){
			setup_postdata($post);		
			//call function to start printing out navigation list
			cals_page_navigation_menu($post, $parent_before, $parent_after, $current_page_ancestors, $top_ancestor, $depth_count);
		}
	
		//close  li.pagenav element
		echo '</li>';

	// Done. restore original $post
	$post = $tmp_post;
?>
</ul>


	
