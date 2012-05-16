Piwik-Ecommerce-for-Zen-Cart
============================

A plugin that adds Piwik ecommerce tracking to Zen Cart. This plugin was written by [Stephan Miller](http://www.stephanmiller.com) for a book on Piwik Analytics by Packt Publishing. It is does not currently have an admin interface.

To Do
====
- Add Admin Interface
- Add More Piwik tracking functions

Instructions
============

1. Upload zenpiwik.php to /includes/functions/extra_functions.


2. Find /templates/Your_Template/common/tpl_shopping_cart_default.php and add this to the top of the page:

    `/* PIWIK E-Commerce Tracking */
      $_SESSION['log_cart'] = log_cart($products,$_SESSION['cart']->total,$_SESSION['languages_id']);`
  
3. - Replace [PIWIKURL] with your Piwik base url in the footer_tracking_code.php file three times.
   - Replace [SITEID] with your Piwik site id in the footer_tracking_code.php file twice.
   - Find /templates/Your_Template/common/tpl_footer.php and add the edited code in the footer_tracking_code.php file to the bottom of the page.

4. Find /templates/Your_Template/common/tpl_checkout_success_default.php and insert at the top of the page:

	`// PIWIK E-Commerce Tracker
	<? $_SESSION['log_order'] = log_order($zv_orders_id,$orders,$notificationsArray,$_SESSION['languages_id']); ?>`

