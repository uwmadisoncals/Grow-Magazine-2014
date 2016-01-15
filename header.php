<?php global $current_issue;?>
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 * @package WordPress
 * @subpackage CALSv2
 * @since CALS 2.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>

<meta name="viewport" content="width=320.1, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
 <!-- iOS Device Startup Images -->

<!-- iPhone -->
<!--<link rel="apple-touch-startup-image"
      media="(device-width: 320px)"
      href="<?php echo get_template_directory_uri(); ?>/images/startup-iphone.png">-->
<!-- iPhone (Retina) -->
<!--<link rel="apple-touch-startup-image"
      media="(device-width: 320px)
         and (-webkit-device-pixel-ratio: 2)"
      href="<?php echo get_template_directory_uri(); ?>/images/startup-iphone4.png">-->

<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo@2x.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo@2x.png" />




<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/master.css" />

<!--[if IE]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie.css" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie8.css" />
<![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>





<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/styles/vallenato.css" type="text/css" media="screen">

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<?php $options = twentyeleven_get_theme_options();
$current_colorscheme = $options['link_color'];


?>

<body <?php body_class(); ?> id="<?php echo $current_colorscheme; ?>">
<?php $current_issue_header = get_option('current_issue'); ?>
<div id="mobile-menu">
	<div id="mobile-menu-inner">
	<!--<div class="mobile-search"><input type="search" placeholder="Search" /></div>-->
	<!--<a href="/" class="mobileHome">Home</a>-->
	<div id="mobile-menu-container" aria-hidden="true">
		<?php if( !is_home() ) {
			 get_template_part('nav_menu-mobile', 'explore');
		 } ?>
		<ul>


			<li><a href="<?php echo home_url(); ?>">Home</a></li>

		</ul>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div>


	</div>
	<div class="sheet"></div>
	<div class="sheetbg"></div>
	<div class="blurredBodyCopy" aria-hidden="true">
		<div class="top">

			


					<?php 
query_posts(array('category__and' => array(26,$current_issue_header), "showposts" => '1') );
while (have_posts()) : the_post();?>
	<img src="<?php echo get_post_meta($post->ID, "image_featured_article", $single = true); ?>" alt=" "/>
            
<?php endwhile; ?>


		</div>
		<div class="middle"></div>
		<div class="bottom"></div>
	</div>
</div>
<div id="mobile-filter">
	<div id="mobile-filter-inner">
	</div>
</div>

<div class="mobileScroll">

<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>
<a href="#" class="mobileNavTrigger" aria-hidden="true">Navigation</a>
<div class="ieWarning" style="display: none;">
	<h1>It appears you have adjusted your browser to force compatibility mode.  You will have a less than optimal experience when viewing this site as it was designed with modern web standards in mind.</h1>
	<p>To allow this site to behave normally, turn this off by pressing <strong>alt</strong> then click <strong>Tools</strong> and then <strong>Compatibility View Settings</strong>.  If you uncheck <strong>Display all websites in compatibility view</strong> your browser will be restored to its default behavior for compatibility mode.</p>
	<a href="#" class="button ieWarningDismissOnce">Dismiss</a> or <a href="#" class="button ieWarningDismiss">Dismiss and don't bother me again</a>
</div>
<div id="page" class="hfeed">

	<header id="branding" role="banner">
		<div class="headerCentered">
			<hgroup class="heading">
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>

			<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( $header_image ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						// We need to figure out what the minimum width should be for our featured image.
						// This result would be the suggested width if the theme were to implement flexible widths.
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}
					?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					/*if ( is_singular() && has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ /*$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
							$image[1] >= $header_image_width ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else :*/
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
						?>
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
				<?php /*endif;*/ // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>

			<div class="utilityMenu clearfix">
				
			
			
			<div class="globalSearch clearfix">
				<?php get_search_form(); ?>
				<div class="filtered" style="display: none;">
					<ul>
					<li class="subheading" style="display: block;">Results <span id="filter-count"></span></li>
					<?php


$args = array( 'posts_per_page' => 100 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>
<?php endforeach;
wp_reset_postdata();

$pages = get_pages();
  foreach ( $pages as $page ) {
  	echo '<li>';
  	echo '<a href="' . get_page_link( $page->ID ) . '">';
	echo $page->post_title;
	echo '</a>';
	echo '</li>';

  }


  //cals_uw_directory_search($small=true, $add_class = 'search_results');

  ?>

						<!-- Hard code any additional search terms here -->
						<!--<li><a href="#">Search Item 1</a></li>-->

					</ul>

					<div class="directory"></div>
				</div>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
</div>

			</hgroup>



			<nav id="access" role="navigation">
				<div class="headeroverlay">


				<div class="mobileScrollTop"></div>
				<div class="centerfix relative">
				<a href="#" class="totop" title="Go to the top of the page">Go to the top of the page</a>
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<div class="navWrapper clearfix">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

				</div>
				<!-- The markup of the navigation if it is hard coded -->
				<!--<ul class="clearfix">
			  		<li><a href="#">Students</a></li>
			  		<li><a href="#">Alumni</a></li>
			  		<li><a href="#">Faculty &amp; Staff</a></li>
			  		<li><a href="#">Industry &amp; Community</a></li>
			  		<li><a href="#">Research</a></li>
			  		<li><a href="#">Outreach</a></li>
  				</ul>-->

<div class="pdfDownload">




<?php 
query_posts(array('category__and' => array(1080,$current_issue_header), "showposts" => '1') );
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
</svg> Download/View


</a>

<div class="downloadMenu">
	<a href="<?php the_field('pdf_issue'); ?>" target="_blank">Download PDF</a>
	<a href="http://issuu.com/growcals">View using ISSUU</a>
</div>      
<?php endwhile; ?>
<?php wp_reset_query(); ?>
				</div>
  				
				

				
			
				</div>


				</div>
			</nav><!-- #access -->


<div class="headingbg clearfix"></div>
		</div>
	</header><!-- #branding -->



<div class="headerPhotoBg">
<div class="headertransition"></div>
<div class="contrastmask1"></div>

<div class="collegeFeature">
<ul class="slides">


					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>



					<?php 
query_posts(array('category__and' => array(26,$current_issue_header), "showposts" => '1') );
$loopcount = 0;
while (have_posts()) : the_post();
$loopcount = $loopcount + 1;
					$slideclass = "slideImage".$loopcount;
					$slideblurclass = "slideBlur".$loopcount;

?>
<li class="flipin">
	
 	
 	<div class="slideImage <?php echo $slideclass ?>">
    								<div class="headerBgContainer"><div class="headerbgBlur"><div class="headerbgBlurImage"></div></div></div>
    								<div class="slideImageSeperate <?php echo $slideclass ?>" style="background: url('<?php 


    									if( function_exists('get_field') && get_field('feature_image') ) {
											$attachment_id = get_field('feature_image'); $size = "large"; 
											$image = wp_get_attachment_image_src($attachment_id, $size); 
											
											$backgroundImg = $image[0];
											echo $backgroundImg;
											//$slide = '<li class="headerImage headerImagePara" data-imgH="' . $image[1] . '" data-imgW="' . $image[2] . '" style="' . $backgroundImg . '">';
										} else {
						    					echo get_post_meta($post->ID, "image_featured_article", $single = true); 

										} 

    									


    									?>') no-repeat; background-size: 100% auto;"></div>

				    				
				    				<div class="slideBlurImage"><div class="slideBlurImageInner"></div></div>


				    				<div class="slideBlur <?php echo $slideblurclass ?>"></div>
				    				<div class="contrastmask2"></div>
    					</div>








  			<div class="featureCaption">
  				<div class="centered">
  				<div class="featureCS">Cover Story</div>
  				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	  				<div class="featuresubtitle">
	  				<?php the_excerpt(); ?>
	  				</div>
  				</div>
  			</div>

 </li>    
<?php endwhile; ?>

					

					





				</ul>

  	<a href="#" class="next">Next</a>
  	<a href="#" class="previous">Previous</a>

  	<div class="timer">
  		<a href="#">Pause Slide Rotation</a>
	  	<div class="timerLeft">
	  	<div class="timer1"></div>
	  	</div>
	  	<div class="timerRight">
	  	<div class="timer2"></div>
	  	</div>

  	</div>
  </div>
  <div class='fluidHeight' style="display: none;">

			<div class = 'sliderContainer'>

				<div class = 'iosSlider'>

					<div class = 'slider'>





					</div>

				</div>



				<div class = 'scrollbarContainer'></div>

			</div>


		</div>
		<div class="headershade"></div>
		<!-- end of feature slider -->

</div><?php wp_reset_query(); ?>
