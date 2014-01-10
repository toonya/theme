<?php
$banner_list = get_option('bannerlist');
$banner_control = '';
$nav_animation = true;
if(isIE() || isMobile())
	$nav_animation = false;

if($banner_list) {
?>
<div id="banner" class="carousel slide" data-nav-animation=<?php echo $nav_animation; ?>>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    	<?php
        	foreach($banner_list as $key=>$item) {
            	if($key==0) {
            		echo '<a class="item active" href="'.$item['url'].'"><img src="'.$item['imgurl'].'" class="img-responsive" /></a>';
					$banner_control .= '<li data-target="#banner" data-slide-to="0" class="active">'.$item['title'].'</li>';
            	}
            	else {
            		echo '<a class="item" href="'.$item['url'].'"><img src="'.$item['imgurl'].'" class="img-responsive" /></a>';
					$banner_control .= '<li data-target="#banner" data-slide-to="'.$key.'">'.$item['title'].'</li>';
            	}
        	}
    	?>
    </div>

    <!-- Indicators -->
    <ol class="carousel-nav">
        <?php echo $banner_control; ?>
    </ol>

</div>
<!-- end banner -->
<?php }?>