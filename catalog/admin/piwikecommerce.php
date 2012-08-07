<?php
/**
 * @package piwik ecommerce
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piwikecommerce.php eristoddle $
 */

  require('includes/application_top.php');

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<style type="text/css">
        html, body { 
            margin: 0; 
            padding: 0; 
            height: 100%; 
        }
        iframe {
            position: absolute;  
            height: 100%;
            width: 99%;
            border: none;
            box-sizing: border-box; 
            -moz-box-sizing: border-box; 
            -webkit-box-sizing: border-box;
        }        
</style>
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<?php   if ($action == 'edit' || $action == 'update') { ?>
<script language="javascript"><!--
function check_form() {
  var error = 0;
  var error_message = "<?php echo JS_ERROR; ?>";

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
//--></script>
<?php  } ?>

<script type="text/javascript">
  <!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
  }
  // -->
</script>
</head>
<body onLoad="init()">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="99%" cellspacing="2" cellpadding="2">
    <tr>
        <td colspan="7">
        <h1><?php echo HEADING_TITLE_PIWIKECOMMERCE; ?></h1>
        </td>
    </tr>
    <tr>
        <td><iframe src="<?php echo PIWIK_URL; ?>index.php?module=Widgetize&action=iframe&moduleToWidgetize=Dashboard&actionToWidgetize=index&idSite=<?php echo PIWIK_ID; ?>&period=<?php echo PIWIK_REPORT_PERIOD; ?>&date=<?php echo PIWIK_REPORT_DATE; ?>&token_auth=<?php echo PIWIK_TOKEN_AUTH; ?>" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%"></iframe></td>
    </tr>
</table>
<!-- body_eof //-->
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>