Name
====
Piwik Ecommerce for ZenCart

Version Date
============
v 1.0.0 08.07.2012

Author
======
Stephan Miller http://www.StephanMiller.com

Description
============
A plugin that adds Piwik ecommerce tracking to Zen Cart as well as access to Piwik reports in the ZenCart reports menu. This plugin was written by [Stephan Miller](http://www.stephanmiller.com) for a book on Piwik Analytics by Packt Publishing.

Support forum
=============
Will be adding

Affected files
==============
Changed files
-------------
tpl_footer.php in your current template

New files
---------
/includes/templates/YOUR_TEMPLATE/common/tpl_footer_piwik.php
/functions/includes/PiwikEcommerce.php
/admin/includes/PiwikEcommerce.php
/admin/includes/extra_boxes/PiwikEcommerce.php
/admin/includes/extra_datafiles/PiwikEcommerce.php
/admin/includes/languages/english/extra_definitions/PiwikEcommerce.php

Affects DB
==========
Yes (creates new records into configuration_group and configuration tables)

DISCLAIMER
==========
Installation of this contribution is done at your own risk.
Backup your ZenCart database and any and all applicable files before proceeding.

Features:
=========
- supports e-commerce tracking
- admin menu to enter Piwik details
- admin|reports menu to view Piwik stats

Install:
============
These are the current instructions, but files are changing.

1. Upload PiwikEcommerce.php to /includes/functions/extra_functions.

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