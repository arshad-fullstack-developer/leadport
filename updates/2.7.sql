-- 2.7.1
-- Create table "imaplog"
--
DROP TABLE IF EXISTS `imaplog`;
CREATE TABLE `imaplog` (
  `imaplog_id` int(11) NOT NULL AUTO_INCREMENT,
  `imaplog_created` datetime NOT NULL,
  `imaplog_updated` datetime NOT NULL,
  `imaplog_categoryid` int(11) NOT NULL,
  `imaplog_to_email` text NOT NULL,
  `imaplog_from_email` text DEFAULT NULL,
  `imaplog_from_name` text DEFAULT NULL,
  `imaplog_subject` text DEFAULT NULL,
  `imaplog_email_uid` text DEFAULT NULL,
  `imaplog_mailbox_id` int(11) DEFAULT NULL,
  `imaplog_body` text DEFAULT NULL,
  `imaplog_attachments_count` int(11) DEFAULT NULL,
  `imaplog_header_in_reply_to` text DEFAULT NULL,
  `imaplog_payload_header` text DEFAULT NULL,
  PRIMARY KEY (`imaplog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Alter table "categories"
--
ALTER TABLE categories
  ADD COLUMN category_meta_1 INT(11) DEFAULT NULL COMMENT 'optional custom data' AFTER category_slug,
  ADD COLUMN category_meta_2 DATETIME DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_1,
  ADD COLUMN category_meta_3 DATETIME DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_2,
  ADD COLUMN category_meta_4 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_3,
  ADD COLUMN category_meta_5 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_4,
  ADD COLUMN category_meta_6 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_5,
  ADD COLUMN category_meta_7 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_6,
  ADD COLUMN category_meta_8 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_7,
  ADD COLUMN category_meta_9 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_8,
  ADD COLUMN category_meta_10 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_9,
  ADD COLUMN category_meta_11 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_10,
  ADD COLUMN category_meta_12 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_11,
  ADD COLUMN category_meta_13 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_12,
  ADD COLUMN category_meta_14 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_13,
  ADD COLUMN category_meta_15 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_14,
  ADD COLUMN category_meta_16 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_15,
  ADD COLUMN category_meta_17 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_16,
  ADD COLUMN category_meta_18 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_17,
  ADD COLUMN category_meta_19 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_18,
  ADD COLUMN category_meta_20 TEXT DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_19,
  ADD COLUMN category_meta_22 TIMESTAMP NULL DEFAULT NULL COMMENT 'optional custom data' AFTER category_meta_20;

--
-- Alter table "email_queue"
--
ALTER TABLE email_queue
  CHANGE COLUMN emailqueue_resourcetype emailqueue_resourcetype VARCHAR(50) DEFAULT NULL COMMENT 'e.g. invoice. Used mainly for deleting records, when resource has been deleted';

--
-- Alter table "tickets"
--
ALTER TABLE tickets
  ADD COLUMN ticket_source VARCHAR(10) NOT NULL DEFAULT 'web' COMMENT 'web|email' AFTER ticket_status,
  ADD COLUMN ticket_user_type VARCHAR(10) DEFAULT 'user' COMMENT 'user|contact' AFTER ticket_active_state,
  ADD COLUMN ticket_imap_sender_email_address TEXT DEFAULT NULL AFTER ticket_user_type,
  ADD COLUMN ticket_imap_sender_email_id TEXT DEFAULT NULL AFTER ticket_imap_sender_email_address,
  ADD COLUMN ticket_imap_email_payload TEXT DEFAULT NULL AFTER ticket_imap_sender_email_id;

--
-- Alter table "ticket_replies"
--
ALTER TABLE ticket_replies
  ADD COLUMN ticketreply_source VARCHAR(10) NOT NULL DEFAULT 'web' COMMENT 'web|email' AFTER ticketreply_text,
  ADD COLUMN ticketreply_imap_sender_email_id TEXT NOT NULL COMMENT 'for ticket replies created via email' AFTER ticketreply_source;

ALTER TABLE `email_queue`
ADD `emailqueue_attempts` int NULL DEFAULT '0';

ALTER TABLE `settings2`
ADD `settings2_tweak_imap_tickets_import_limit` int NULL DEFAULT '5';

ALTER TABLE `settings2`
ADD `settings2_tweak_imap_connection_timeout` int NULL DEFAULT '60';

ALTER TABLE `categories`
ADD `category_meta_23` int NULL DEFAULT '0',
ADD `category_meta_24` int NULL DEFAULT '0' AFTER `category_meta_23`,
ADD `category_meta_25` int NULL DEFAULT '0' AFTER `category_meta_24`,
ADD `category_meta_26` int NULL DEFAULT '0' AFTER `category_meta_25`;

ALTER TABLE `categories`
ADD `category_meta_21` timestamp NULL AFTER `category_meta_22`;


-- 2.7
-- LEAD WEB FORMS
ALTER TABLE `webforms`
ADD `webform_lead_status` int NULL DEFAULT '1' COMMENT 'default stage for the new lead' AFTER `webform_lead_title`;

ALTER TABLE `webforms`
ADD `webform_style_css` text NULL AFTER `webform_lead_status`;

ALTER TABLE `settings2`
ADD `settings2_theme_css` text COLLATE 'utf8_general_ci' NULL AFTER `settings2_tap_status`;

ALTER TABLE `webforms`
ADD `webform_recaptcha` varchar(15) COLLATE 'utf8_general_ci' NULL DEFAULT 'disabled' COMMENT 'enabled|disabled' AFTER `webform_style_css`;

-- PINNING CONTENT
DROP TABLE IF EXISTS `pinned`;
CREATE TABLE `pinned` (
  `pinned_id` int(11) NOT NULL AUTO_INCREMENT,
  `pinned_created` int(11) NOT NULL,
  `pinned_updated` int(11) NOT NULL,
  `pinned_userid` int(11) DEFAULT NULL,
  `pinned_status` varchar(50) DEFAULT 'pinned' COMMENT 'just pinned, does not have other value',
  `pinnedresource_type` varchar(50) DEFAULT NULL COMMENT '[polymorph] project | ticket | task | lead',
  `pinnedresource_id` int(11) DEFAULT NULL COMMENT '[polymorph] e.g project_id',
  PRIMARY KEY (`pinned_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Alter table "email_queue"
--
ALTER TABLE email_queue
  ADD COLUMN emailqueue_notes TEXT DEFAULT NULL AFTER emailqueue_attempts;


--
-- Alter table "settings2"
--
ALTER TABLE settings2
  CHANGE COLUMN settings2_tweak_imap_connection_timeout settings2_tweak_imap_connection_timeout INT(11) DEFAULT 30;
  

--
-- update version number
--
UPDATE settings SET settings_system_javascript_versioning = now() Where settings_id = 1;
update settings set settings_version = '2.7';

UPDATE settings SET settings_type = 'saas';