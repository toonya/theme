<?php
/**
 * Template Name: 内部公告
 */

$register_error = '';
$login_error    = '';
$update_error  = '';
$user;

// ! user logined, make $user usable.
if(is_user_logged_in())
	$user = wp_get_current_user();

// ! user login.
if(isset($_POST['userLogin']) && isset($_REQUEST['employeenonce']) && !is_user_logged_in()){

		$user = wp_signon();
		if ( is_wp_error($user) )
		 	$login_error = '<span class="text-danger">Error: 账户名或密码错误，请联系管理员修改</span>';
		else
			wp_redirect( get_permalink() );
}

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="container employee">
			<?php  if ( !is_user_logged_in() ) :;?>
				<div class="login col-md-offset-3 col-md-6">
					<h3 class="text-center">员工登录</h3>
					<div class="error_area"><?php echo _e($login_error); ?></div>
					<form class="form-horizontal" role="form" id="employee-login" method="POST" action="">
					  <div class="form-group">
					    <label for="log" class="col-sm-2 control-label">ID</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="log" name="log" placeholder="ID">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="pwd" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					        <?php wp_create_nonce('employee-nonce'); ?>
							<?php wp_nonce_field('employee-nonce', 'employeenonce'); ?>
							<input type="hidden" name="userLogin" id="userLogin" value="true" />
							<button type="submit" class="btn btn-default">登录</button>
					    </div>
					  </div>
					</form>
				</div> <!-- login area -->


			<?php else:; ?>
<!--
				<?php while ( have_posts() ) : the_post(); ?>
					<h3>紧急通知</h3>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
-->

					<a class="btn btn-primary btn-sm pull-right" href="<?php echo wp_logout_url( get_permalink() ); ?>">退出登录</a>
					<?php
						$args = array(
						        'posts_per_page'  => 10,
						        'numberposts'     => 10,
						        'offset'          => 0,
						        'category'        => '',
						        'orderby'         => 'post_date',
						        'order'           => 'DESC',
						        'include'         => '',
						        'exclude'         => '',
						        'meta_key'        => '',
						        'meta_value'      => '',
						        'post_type'       => 'employee_news',
						        'post_mime_type'  => '',
						        'post_parent'     => '',
						        'post_status'     => 'publish',
						        'suppress_filters' => true );

						// The Query
						$the_query = new WP_Query( $args );

						// The Loop
						echo '<dl class="dl-horizontal">';
						echo '<dt><h3>信息公告牌</h3></dt><dd></dd>';
						while ( $the_query->have_posts() ):
						$the_query->the_post();
						?>
							<dt><?php the_date(); ?></dt>
							<dd><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
						<?php
						endwhile;
						echo '</dl>';
						/* Restore original Post Data
						 * NB: Because we are using new WP_Query we aren't stomping on the
						 * original $wp_query and it does not need to be reset.
						*/
						wp_reset_postdata();
					?>

			<?php endif; ?>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->



<?php get_footer(); ?>