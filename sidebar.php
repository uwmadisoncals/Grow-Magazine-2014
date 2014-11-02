<?php
/**
 * The Sidebar containing the main widget area.
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

global $current_user;
$current_issue = get_option('current_issue');

if (current_user_can('admin') && $_GET['tci']!="") {
	$current_issue = $_GET['tci'];
}

global $is_issue_page;

if ($is_issue_page==1){?>
        <div class="box sidebarRow issueList">
        	<div class="row">
        		<div class="toc">
            <h3 class="issueTitle">List of Issues</h3>
                <div class="box_content">
          		<div class="issues"><?php 
				
				$issues = get_categories('child_of=10&hide_empty=true');
	
					
				//order issues by season
				$season_order = array('spring' => 'mar', 'summer' => 'jul', 'fall' => 'sept', 'winter' => 'nov');
				foreach ($issues as $issue){
					$season_info = explode(" ", $issue->name);
					$m =  strtolower($season_info[0]);
					$y =  $season_info[1];
					
					//create a timestamp array to be used to order issues
					$key = time() - strtotime($season_order[$m].' '.$season_info[1]);
					
					//store in new array
					$ordered_issues[$key] = $issue;
					
					 
				}

				ksort($ordered_issues);
				$issues = $ordered_issues;
	
				//display issues 
				$issue_images = get_option("issue_images");
				$issue_pdf = get_option("issue_pdf");
				foreach ($issues as $issue){
					$name = str_replace(" ", "_", $issue->name); 
					$issue_image_path = $issue_images[$name];
					$issue_download_path = $issue_pdf[$name];
					//echo $issue_image_path;
					if ($issue_image_path!=""){
					?>
                    <div class="left clearfix">
						<a href="<?php echo get_permalink('4'); ?>/?issue_id=<?php echo $issue->term_id;?>" rel="bookmark">    
							<div class="issue_pic" style="background: #FFF url(<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $issue_image_path; ?>&h=100&w=76&zc=1&q=90) no-repeat top left;">
                           </div></a>
		                       
		                       <?php if ($issue_download_path!=""){ ?>
		                       <div class="issue_title"><?php echo $issue->name?></div>
		                       <a href="<?php echo bloginfo('template_url'); echo $issue_download_path; ?>" class="issue_download">Download</a>
		                       
		                       <?php } else { ?>

		                       <span class="issue_download"></span>
		                       <?php } ?>

    						

                	</div>
                <?php }
				} ?>

                
                </div>
                </div>
                </div>
                </div>
        </div><!--//Previous Issues-->
		<?php } ?>



<?php if ( 'content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area" role="complementary">
		
			<?php if ( !is_home()) { get_template_part('nav_menu', 'sidebar');  } ?>
			
			<?php //get_template_part('nav_side', 'promo'); ?>
			
			
		
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
<?php endif; ?>

<?php if ( 'content' == $current_layout ) : if ( !is_home() ) {
    // This is not the homepage
 ?>
	
	<?php if(is_search()) { ?>
		
	<div class="searchSidebar">
		<?php
		cals_uw_directory_search($small=true, $add_class = 'search_results_side'); ?>
		
		
		<!-- SEARCH FORM -->
<div class="googleSearch">
<h4>Google Found</h4>
<form action="http://www.google.com/search" method="get">
<!-- HTML5 SEARCH BOX!  -->
<input type="search" id="search-box" name="q" results="5" autocomplete="on" />
<!-- SEARCH BUTTON -->
<input id="search-submit" type="submit" value="Search" />
<div id="search-area" style="position:relative;">
<div id="search-results">
<div id="search-results-pointer"></div>
<div id="search-results-content"></div>
</div>
</div>
 
</form>
</div>

</div>

<script type="text/javascript">
google.load("search","1");
//google.load("jquery", 1.7.2);
 
function googlesearch() {
//console.log("hi");
    if(typeof(searchLoaded) == "undefined") {
        var searchLoaded = true; // set searchLoaded to "true"; no more loading!
 
        var searchBox = $("input#search-box");
 
        // google interaction
        var search = new google.search.WebSearch(),
        control = new google.search.SearchControl(),
        options = new google.search.DrawOptions();
 
        // set google options
        options.setDrawMode(google.search.SearchControl.DRAW_MODE_TABBED);
        options.setInput(searchBox);
        search.setSiteRestriction("http://www.cals.wisc.edu");
		//options.as_sitesearch("http://www.cals.wisc.edu");
        // set search options
        search.setLinkTarget(google.search.Search.LINK_TARGET_SELF);
 
        // set search controls
        control.addSearcher(search);
        control.draw(document.getElementById("search-results-content"),options);
        control.setNoResultsString("No results were found.");
 
        // add listeners to search box
        searchBox.bind("keydown", function() {
        	//console.log("hi");
            var value = searchBox.val();
            if(value) {
                control.execute(value);
            }
        });
        
        
        var searchBox2 = $("#s");
			//var control = new google.search.SearchControl();
			var value2 = searchBox2.val();
			
            if(value2) {
            	searchBox.val(value2);
            	//console.log("searching");
                control.execute(value2);
            }	
            
            
    }
}
google.setOnLoadCallback(googlesearch);
</script>
		
	 <?php } else {  ?>
			<?php if($is_issue_page!=1 ) { ?>
	 <?php get_template_part('nav_menu', 'sidebar');  ?>
	 <?php } ?>
	 <?php get_template_part('nav_side', 'promo'); ?>
	 <?php } ?>
	
	
	
	<!--<div id="secondary" class="widget-area" role="complementary">
			
			
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
				
				
				
				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div>--><!-- #secondary .widget-area -->

<?php } endif; ?>