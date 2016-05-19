<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<br class="clear">

</section>

<div id="footer-container" class="clearfix">
	<footer id="footer">

    <a class="left footer-logo" href="<?php echo site_url(); ?>">
      <svg width="100" height="100">
        <path d="M28.7,81.5h18.9c14.3,0,24.2-6.1,24.2-17.4c0-10.2-9.4-14.5-16.8-17.6l-6.5-2.6c-6.7-2.8-11.1-5-11.1-10.6
          c0-6.6,6.1-9.2,14-9.2h8.8l1.5,9.5h4.6l1.8-11.7l-0.4-4.1H50.6c-12.4,0-22.4,5.5-22.4,16.8c0,7.8,5.3,12.7,14.1,16.4l8.7,3.7
          c6.5,2.6,11.5,5.1,11.5,10.6c0,6.3-5.4,10.2-15,10.2H36.2l-1.5-10.6h-4.6l-2,13.2L28.7,81.5z"/>
      </svg>
    </a>

    <?php do_action( 'foundationpress_before_footer' ); ?>
    <ul class="copyright inline-list right">
      <li>Supertemp © <?= date("Y"); ?></li>
    </ul>
    <?php // supertemp_footer(); ?>
		<?php do_action( 'foundationpress_after_footer' ); ?>
	</footer>
</div>

<?php do_action( 'foundationpress_layout_end' ); ?>
<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>


<?php if (!current_user_can('manage_options')) : ?>
  <!-- ANALYTICS -->
  <script>

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-70800565-1', 'auto');
    ga('send', 'pageview');

  </script>
<?php endif; ?>

</body>
</html>
