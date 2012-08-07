<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: PiwikEcommerce_reports.dhtml.php eristoddle $
 */
 /*
 * PiwikEcommerce for Zen-Cart
 * version 1.0, Stephan Miller, V1.0, StephanMiller.com
 *
 */
  require('includes/application_top.php');

  $error = false;
  $processed = false;

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
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

<?php
//HERE YOUR CODE
?>

<table border="0" width="99%" cellspacing="2" cellpadding="2">
    <tr>
        <td colspan="7">
        <h1><?php echo HEADING_TITLE_MYZENMODULE; ?></h1>
        </td>
    </tr>
    <tr>
    <td>
    HERE YOUR DATA
    </td>
    <!-- body_text_eof //-->
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
?>
