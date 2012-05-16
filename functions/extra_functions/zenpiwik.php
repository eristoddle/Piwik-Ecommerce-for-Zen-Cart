<?php  

/*
  zenpiwik.php
  @author     Stephan Miller <stephanmil@gmail.com>
  @link       http://www.stephanmiller.com

  Zen Cart - The Art of Ecommerce
  http://www.zen-cart.com/

  Copyright (c) 2012 Zen Cart

  Released under the GNU General Public License

*/

	function log_category($categories_id,$language_id) {
		global $db;

		$categories_query = "select categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " where categories_id = " . (int)$categories_id . " and language_id = " . (int)$language_id;
		$categories = $db->Execute($categories_query);

		if ($categories->RecordCount() > 0) {    
			return 'piwikTracker.setEcommerceView(productSku = false,productName = false,category = "'.$categories->fields['categories_name'].'");' . "\n";
		}
		
	} 

	function log_product($products_id,$language_id) {
		global $db;      
				
		$products_query = "select p.products_model, pd.products_name, cd.categories_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, ". TABLE_CATEGORIES_DESCRIPTION ." cd WHERE p.products_id = pd.products_id and p2c.categories_id = cd.categories_id and p.products_id = " . (int)$products_id . " and pd.language_id =".(int)$language_id." and cd.language_id =".(int)$language_id;
		$products = $db->Execute($products_query);

		if ($products->RecordCount() > 0) {
			return 'piwikTracker.setEcommerceView("'.$products->fields['products_model'].'","'.$products->fields['products_name'].'","'.$products->fields['categories_name'].'");' . "\n";
		}
	
	}   

	function log_cart($products,$total,$language_id) {
		global $db;                 

		for ($i=0, $n=sizeof($products); $i<$n; $i++) {

			if (!is_null($products[$i]['model'])) {    
				$categories_query = "select cd.categories_name from " . TABLE_CATEGORIES_DESCRIPTION ." cd, ". TABLE_PRODUCTS_TO_CATEGORIES . " p2c WHERE cd.categories_id = p2c.categories_id and p2c.products_id = " . (int)$products[$i]['id'] . " and cd.language_id =".(int)$language_id;

				$categories = $db->Execute($categories_query);    
				$string .= 'piwikTracker.addEcommerceItem("'.$products[$i]['model'].'","'.$products[$i]['name'].'","'.$categories->fields['categories_name'].'",'.$products[$i]['final_price'].','.$products[$i]['quantity'].');' . "\n";

			}
			
		}

		$string .= 'piwikTracker.trackEcommerceCartUpdate('.$total.');' . "\n";

		return $string;
	} 

	function log_order($insert_id,$order,$products,$language_id) {
		global $db;      
		
		foreach ($products as $p) {

			if (!is_null($p['products_id'])) {    
				$categories_query = "select cd.categories_name from " . TABLE_CATEGORIES_DESCRIPTION ." cd, ". TABLE_PRODUCTS_TO_CATEGORIES . " p2c WHERE cd.categories_id = p2c.categories_id and p2c.products_id = " . (int)$p['products_id'] . " and cd.language_id =".(int)$language_id;
				$categories = $db->Execute($categories_query);

				$order_product_query = "select products_model, products_tax,                        products_quantity, final_price from " . TABLE_ORDERS_PRODUCTS . "                     where orders_id = " . (int)$insert_id . " and products_id = " . (int)$p['products_id'];
				$order_product = $db->Execute($order_product_query);
			
				$string .= 'piwikTracker.addEcommerceItem("'.$order_product->fields['products_model'].'","'.$p['products_name'].'","'.$categories->fields['categories_name'].'",'.(float)$order_product->fields['final_price'].','.$order_product->fields['products_quantity'].');' . "\n";
			}
			
		}
		
		$st_result = $db->Execute("SELECT ROUND(value, 2) subtotal FROM ". TABLE_ORDERS_TOTAL ." WHERE class='ot_subtotal' AND orders_id = ". $order->fields['orders_id']);
		$subtotal = $st_result->fields['subtotal'];
		$shipping = (float)$order->fields['order_total'] - (float)$order->fields['order_tax'] - (float)$st_result->fields['subtotal'];

		$string .= 'piwikTracker.trackEcommerceOrder("'.$insert_id.'",'.$order->fields['order_total'].','.$subtotal.','.$order->fields['order_tax'].','.$shipping.',false);' . "\n";

		return $string;
	
	} 

	function log_custom_variable($index,$key,$value) {

		return 'piwikTracker.setCustomVariable('.$index.',"'.$key.'","'.$value.'","visit");' . "\n";
	
	} 
?>
