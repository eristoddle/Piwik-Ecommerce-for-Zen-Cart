Name
====
Piwik Ecommerce for ZenCart version 1.3.9 and lower

Version Date
============
v 1.0.0 08.07.2012

Author
======
Stephan Miller http://www.StephanMiller.com

Description
============
A plugin that adds Piwik ecommerce tracking to Zen Cart as well as access to Piwik reports in the ZenCart reports menu. This plugin was written by [Stephan Miller](http://www.stephanmiller.com) for [a book on Piwik Analytics](http://www.packtpub.com/piwik-web-analytics-essentials/book) published by Packt Publishing.

Support forum
=============
Will be adding

Affected files
==============
Changed files
-------------
tpl_footer.php in your current template
tpl_shopping_cart_default.php in your current template
tpl_checkout_success_default.php in your current template

New files
---------
- /includes/templates/YOUR_TEMPLATE/common/tpl_footer_piwik.php
- /includes/templates/YOUR_TEMPLATE/templates/tpl_shopping_cart_default.php
- /includes/templates/YOUR_TEMPLATE/templates/tpl_checkout_success_default.php
- /admin/includes/boxes/extra_boxes/piwikecommerce_tools_dhtml.php
- /functions/includes/piwikecommerce.php
- /admin/includes/piwikecommerce.php
- /admin/includes/extra_datafiles/piwikecommerce.php
- /admin/includes/languages/english/extra_definitions/piwikecommerce.php

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

1. Go to Admin->Tools->Install SQL Patches and install install.sql by copy and pasting the contents of the file into the form there.

2. Upload catalog/includes/functions/extra_functions/piwikecommerce.php to the /includes/functions/extra_functions/ folder of your ZenCart installation.

3. Upload the contents of the catalog/admin folder to the admin folder of your ZenCart installation. Note that if you renamed your admin folder for security reasons, it will not be named "admin" now.

4. If you are using a default footer file for your current template, you can upload catalog/includes/templates/YOUR_TEMPLATE/common/tpl_footer.php to the folder of your current template to replace the tpl_footer.php file in your template's common folder. If you are using a modified tpl_footer.php file in your template, you must copy the code between <!-- Piwik with E-Commerce Tracking--> and <!-- End Piwik with E-Commerce Tracking--> at the bottom of the catalog/includes/templates/YOUR_TEMPLATE/common/tpl_footer.php file to the bottom of your current tpl_footer.php file.

5. If you are using a default tpl_shopping_cart_default.php template file for your current template, you can upload catalog/includes/templates/YOUR_TEMPLATE/templates/tpl_shopping_cart_default.php to the folder of your current template to replace the tpl_shopping_cart_default.php file in your template's common folder. If you are using a modified tpl_shopping_cart_default.php file in your template, you must copy the code between <!-- Piwik with E-Commerce Tracking--> and <!-- End Piwik with E-Commerce Tracking--> at the top of the catalog/includes/templates/YOUR_TEMPLATE/templates/tpl_shopping_cart_default.php file to the top of your current tpl_shopping_cart_default.php file, right after the set of comments at the top of the file.

6. If you are using a default tpl_checkout_success_default.php template file for your current template, you can upload catalog/includes/templates/YOUR_TEMPLATE/templates/tpl_checkout_success_default.php to the folder of your current template to replace the tpl_checkout_success_default.php file in your template's common folder. If you are using a modified tpl_shopping_cart_default.php file in your template, you must copy the code between <!-- Piwik with E-Commerce Tracking--> and <!-- End Piwik with E-Commerce Tracking--> at the top of the catalog/includes/templates/YOUR_TEMPLATE/templates/checkout_success_default.php file to the top of your current tpl_shopping_cart_default.php file, right after the set of comments at the top of the file.

7. Add your Piwik credentials at Admin->Configuration->Piwik Analytics Configuration

8. View your Piwik reports dashboard at Admin->Reports->Piwik Analytics Reports

Issues
======
Because of the embedded widget and cross domain issues, there may be two vertical scroll bars. I thought of creating a shim page to fix it, but this is still an ugly fix.