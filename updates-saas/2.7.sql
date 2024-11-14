-- END
UPDATE settings SET settings_system_javascript_versioning = now() Where settings_id = 1;
UPDATE settings SET settings_version = '2.7';