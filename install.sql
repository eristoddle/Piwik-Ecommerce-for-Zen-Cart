SET @configuration_group_id=0;
SELECT (@configuration_group_id:=configuration_group_id) FROM configuration_group WHERE configuration_group_title= 'Piwik Analytics Configuration' LIMIT 1;
DELETE FROM configuration WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;
DELETE FROM configuration_group WHERE configuration_group_id = @configuration_group_id AND configuration_group_id != 0;

INSERT INTO configuration_group (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (NULL, 'Piwik Analytics Configuration', 'Set Piwik Analytics Options', '1', '1');
SET @configuration_group_id=last_insert_id();
UPDATE configuration_group SET sort_order = @configuration_group_id WHERE configuration_group_id = @configuration_group_id;

INSERT INTO configuration (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES (NULL, 'Piwik Location', 'PIWIK_URL', '', 'Enter your Piwik Analytics base URL. Not the full path to piwik.php, only the folder it is in. If your ZenCart admin is secure, make sure to use "https://".', @configuration_group_id, 1, NOW(), NULL, NULL),
(NULL, 'Piwik Site ID', 'PIWIK_ID', 1, 'Enter your Piwik Analytics site id.', @configuration_group_id, 1, NOW(), NULL, NULL),
(NULL, 'Piwik Report Period', 'PIWIK_REPORT_PERIOD', 'day', 'Enter the desired report period for your report. Options:day,week,month,year', @configuration_group_id, 1, NOW(), NULL, NULL),
(NULL, 'Piwik Report Date', 'PIWIK_REPORT_DATE', 'yesterday', 'Enter the desired report day for your report. Options:today,yesterday', @configuration_group_id, 1, NOW(), NULL, NULL),
(NULL, 'Piwik Token Auth', 'PIWIK_TOKEN_AUTH', '', 'Enter your Piwik Analytics token_auth. You could create a new user that has view access to this site and use that token_auth.', @configuration_group_id, 1, NOW(), NULL, NULL);