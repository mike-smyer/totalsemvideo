<?php
$videos = scandir("videos");
function startsWith($haystack, $needle){
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle){
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

$current_video = htmlspecialchars($_GET["video"]);
?>

<?php include 'includes/core/document_head.php'?>
	<div id="pjax">
		<div id="wrapper" data-adminica-nav-top="1" data-adminica-side-top="1">
			<?php include 'includes/components/topbar.php'?>
			<?php include 'includes/components/sidebar.php'?>
			<?php include 'includes/components/stackbar.php'?></div><!-- Closing Div for Stack Nav, you can boxes under the stack before this -->

			<div id="main_container" class="main_container container_16 clearfix">
				<?php include 'includes/components/navigation.php'?>
				<div class="box grid_16">
					<h2 class="box_head">
					<?php print $current_video ?>
					</h2>
					<video width="100%"s controls="controls">
					  <source src="videos/<? print $current_video ?>" type="video/mp4" />
					  Your browser does not support the video tag.
					</video>
				</div>
				<div class="box grid_8">
					<h2 class="box_head">Videos</h2>
					<div class="controls">
						<a href="#" class="grabber"></a>
						<a href="#" class="toggle"></a>
					</div>
					<div class="toggle_container">
						<div class="block">
							<div class="section">
								<h2>License to Tech</h2>
								<ol>
								<?php 
								foreach($videos as &$video) { 
									if(!endsWith($video, ".mp4")) continue;	
									?>
									<li>
										<a href="video.php?video=<? print $video ?>"> <? print $video ?> </a>					
									</li>
								<?php } ?>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
				
<script type="text/javascript">
$(document).ready(function() {
	//$("#dialog_welcome").dialog("open");
});
</script>
<?php include 'includes/core/document_foot.php'?>