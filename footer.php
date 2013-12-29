
		<footer style="background:#e0e3e6;padding:20px 0 15px;">
			<div class="text-center">
				<p><a href="<?php echo bloginfo('url'); ?>/?page_id=66">关于我们</a> I <a href="<?php echo bloginfo('url'); ?>/?page_id=20" target="_blank">联系我们</a></p>
				<p>版权所有 Copyright(C)2012-2020 您的科技有限公司</p>
			</div>
			<div class="hide">
				<?php echo get_option('51la'); ?>
			</div>
		</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- //code.jquery.com/jquery.js -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/fn.js"></script>
    <?php wp_footer();?>
  </body>
</html>