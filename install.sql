SET @configuration_group_id=0;
SELECT (@configuration_group_id:=configuration_group_id) FROM configuration_group WHERE configuration_group_title= 'Piwik Analytics Configuration' LIMIT 1;
DELETE FROM configuration WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;
DELETE FROM configuration_group WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;

INSERT INTO configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (NULL, 'Piwik Analytics Configuration', 'Set Piwik Analytics Options', '1', '1');
SET @configuration_group_id=last_insert_id();
UPDATE configuration_group SET sort_order = @configuration_group_id WHERE configuration_group_id = @configuration_group_id;

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Analytics Account', 'PIWIK_ANALYTICS_UACCT', 'UA-XXXXXX-X', 'Enter your Piwik Analytics account number', @configuration_group_id, 1, NOW(), NULL, NULL);
-- (NULL, 'Use sku/code', 'PIWIK_ANALYTICS_SKUCODE', 'products_id', 'Using as Product SKU code', @configuration_group_id, 4, NOW(), NULL, 'zen_cfg_select_option(array(\'products_id\', \'products_model\'),'),
-- (NULL, 'Tracking Outbound', 'PIWIK_ANALYTICS_TRACKING_OUTBOUND', 'false', '', @configuration_group_id, 21, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
-- (NULL, 'Tracking Outbound Links Prefix', 'PIWIK_ANALYTICS_TRACKING_OUTBOUND_LINKS_PREFIX', '/outgoing/', '', @configuration_group_id, 22, NOW(), NULL, NULL);