SET @configuration_group_id=0;
SELECT (@configuration_group_id:=configuration_group_id) FROM configuration_group WHERE configuration_group_title= 'Piwik Analytics Configuration' LIMIT 1;
DELETE FROM configuration WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;
DELETE FROM configuration_group WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;

INSERT INTO configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (NULL, 'Piwik Analytics Configuration', 'Set Piwik Analytics Options', '1', '1');
SET @configuration_group_id=last_insert_id();
UPDATE configuration_group SET sort_order = @configuration_group_id WHERE configuration_group_id = @configuration_group_id;

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Piwik Location', 'PIWIK_URL', '', 'Enter your Piwik Analytics account number', @configuration_group_id, 1, NOW(), NULL, NULL),
(NULL, 'Piwik Site ID', 'PIWIK_ID', 1, 'Enter your Piwik Analytics account number', @configuration_group_id, 1, NOW(), NULL, NULL),
(NULL, 'Piwik Token Auth', 'PIWIK_TOKEN_AUTH', '', 'Enter your Piwik Analytics account number', @configuration_group_id, 1, NOW(), NULL, NULL);