<?php 
/* Template Name: Issues - Single
*/
?>
<?php //get issue id, otherwise, default to current issue

	if ($_REQUEST["issue_id"]!=""){
		$current_issue = $_GET["issue_id"];
	} else {
		$current_issue = get_option('current_issue');
	}
	
	$is_issue_page =1;
	
	//echo $current_issue;
	get_header(); 
	?>
	
    <?php //echo $current_issue; ?>

	<style>
		.box_content .issues .left {
			float: left;
			width: 32%;
			margin-right: 1%;
			margin-bottom: 4%;

		}
		
		.issue_pic {
			height: 220px;
			width: 160px;
		}
	
	</style>


   <div id="main">

		<div id="primary"> 
	    
<div id="content" role="main">


            <h2 class="issueTitle">List of Issues</h2>
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
						<a href="<?php echo bloginfo('template_url'); echo $issue_download_path; ?>" rel="bookmark">    
							<div class="issue_pic" style="background: #FFF url(<?php echo $issue_image_path; ?>) no-repeat top left; background-size: cover;">
                           </div></a>
		                       
		                       <?php if ($issue_download_path!=""){ ?>
		                       <div class="issue_title"><?php echo $issue->name?></div>
		                       <a href="<?php echo $issue_download_path; ?>" class="issue_download">Download</a>
		                       
		                       <?php } else { ?>

		                       <span class="issue_download"></span>
		                       <?php } ?>

    						

                	</div>
                <?php }
				} ?>

                
                </div>
               
        </div><!--//Previous Issues-->




	

	 
    
    </div>

<?php //get_sidebar(); ?>

<div class="clear"></div>
			
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>