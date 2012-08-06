<?php
/**
 * tpl_footer_piwik.php
 *
 * @package piwik ecommerce for zen cart
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
?>
<!-- Piwik with E-Commerce Tracking-->
<script type="text/javascript">
	var pkBaseURL = (("https:" == document.location.protocol) ? "https://[PIWIKURL]" : "http://[PIWIKURL]");
	document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", [SITEID]);
		<?php
 			if (($current_page_base == FILENAME_DEFAULT) && zen_not_null($current_category_id)) {
				if ($log_category = log_category((int)$current_category_id,$_SESSION['languages_id'])) {
					echo $log_category;
				}
			}
			if ($current_page_base == FILENAME_PRODUCT_INFO) {
				if ($log_product = log_product((int)$_GET['products_id'],$_SESSION['languages_id'])) {
					echo $log_product;
				}
			}
			if ($current_page_base == FILENAME_SHOPPING_CART) {
				if (isset($_SESSION['log_cart'])) {
					echo $_SESSION['log_cart'];
					unset($_SESSION['log_cart']);
				}
			}
			if ($current_page_base == FILENAME_CHECKOUT_SUCCESS) {
				if (isset($_SESSION['log_order'])) {
					echo $_SESSION['log_order'];
					unset($_SESSION['log_order']);
				}
			}
		?>
		piwikTracker.trackPageView();
		piwikTracker.enableLinkTracking();
		piwikTracker.setConversionAttributionFirstReferrer();
	} catch( err ) {}
</script>
<noscript><p><img src="http://[PIWIKURL]/piwik.php?idsite=[SITEID]" style="border:0" alt="" /></p></noscript>
<!-- End Piwik E-Commerce Tracking Tracking Code -->