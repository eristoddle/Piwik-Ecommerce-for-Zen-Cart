<?php
/**
 * tpl_footer_piwik.php
 *
 * @package piwik ecommerce
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: PiwikEcommerce_reports.dhtml.php eristoddle $
 */

?>
<!-- Piwik with E-Commerce Tracking-->
<script type="text/javascript">
	var pkBaseURL = (("https:" == document.location.protocol) ? "https://<?php echo PIWIK_URL; ?>" : "http://<?php echo PIWIK_URL; ?>");
	document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", <?php echo PIWIK_ID; ?>);
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
<noscript><p><img src="http://<?php echo PIWIK_URL; ?>/piwik.php?idsite=<?php echo PIWIK_ID; ?>" style="border:0" alt="" /></p></noscript>
<!-- End Piwik E-Commerce Tracking Tracking Code -->