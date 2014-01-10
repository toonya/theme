
		<footerr>
			<div class="text-center">
				<p><?php echo get_option('copyright'); ?></p>
			</div>
			<div class="hide">
				<?php echo get_option('51la'); ?>
			</div>
		</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- //code.jquery.com/jquery.js -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/Bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/component.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fn.js"></script>
    <?php wp_footer();?>
  </body>
</html>