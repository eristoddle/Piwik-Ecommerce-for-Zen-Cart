Piwik-Ecommerce-for-Zen-Cart
============================

A plugin that adds Piwik ecommerce tracking to Zen Cart. This plugin was written by [Stephan Miller](http://www.stephanmiller.com) for a book on Piwik Analytics by Packt Publishing. It is does not currently have an admin interface.

To Do
====
- Add Admin Interface
- Add More Piwik tracking functions
- See if the orders function can be written with less database calls

Instructions
============

1. Upload zenpiwik.php to /includes/functions/extra_functions.


2. Find /includes/templates/Your_Template/templates/tpl_shopping_cart_default.php and add this near the top of the page or after the 1st ?>:

<?php    
   /* PIWIK E-Commerce Tracking */
   $_SESSION['log_cart'] = log_cart($products,$_SESSION['cart']->total,$_SESSION['languages_id']);
?>
  
3. Edit includes/footer_tracking_code.php 
   - Replace [PIWIKURL] with your Piwik base url in the  file three times. (Be sure to include the tailing / on the top 2 changes)
   - Replace [SITEID] with your Piwik site id in the footer_tracking_code.php file twice. (In your Piwik click on Settings -> Websites. The Id is the number of the site you have created to track.)
   - Find includes/templates/Your_Template/common/tpl_footer.php and add the edited code from includes/footer_tracking_code.php near the bottom of the page.

4. Find /includes/templates/Your_Template/templates/tpl_checkout_success_default.php and insert at the top of the page:

<?php
  // PIWIK E-Commerce Tracker
  $_SESSION['log_order'] = log_order($zv_orders_id,$orders,$notificationsArray,$_SESSION['languages_id']); 
?>