<?php
/**
 * @package piwik ecommerce
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php eristoddle $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));
?>

<?php
if (!isset($flag_disable_footer) || !$flag_disable_footer) {
?>

<!--bof-navigation display -->
<div id="navSuppWrapper">
<div id="navSupp">
<ul>
<li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
<?php if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<li><?php require($template->get_template_dir('tpl_ezpages_bar_footer.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_footer.php'); ?></li>
<?php } ?>
</ul>
</div>
</div>
<!--eof-navigation display -->

<!--bof-ip address display -->
<?php
if (SHOW_FOOTER_IP == '1') {
?>
<div id="siteinfoIP"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></div>
<?php
}
?>
<!--eof-ip address display -->

<!--bof-banner #5 display -->
<?php
  if (SHOW_BANNERS_GROUP_SET5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET5)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerFive" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
<!--eof-banner #5 display -->

<!--bof- site copyright display -->
<div id="siteinfoLegal" class="legalCopyright"><?php echo FOOTER_TEXT_BODY; ?></div>
<!--eof- site copyright display -->

<?php
} // flag_disable_footer
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
<!-- End Piwik E-Commerce Tracking Code -->