#
# Table structure for table 'tx_waconcookiemanagement_domain_model_cookie'
#
CREATE TABLE tx_waconcookiemanagement_domain_model_cookie (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kategorie varchar(255) DEFAULT '' NOT NULL,
	anbieter varchar(255) DEFAULT '' NOT NULL,
	zweck text,
	cookiename varchar(255) DEFAULT '' NOT NULL,
	laufzeit varchar(255) DEFAULT '' NOT NULL,
	datenschutzlink varchar(255) DEFAULT '' NOT NULL,
	host varchar(255) DEFAULT '' NOT NULL,
	nocookietext text,
	nocookieimage int(11) unsigned NOT NULL default '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_waconcookiemanagement_nutzer_cookie_mm'
#
CREATE TABLE tx_waconcookiemanagement_nutzer_cookie_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
