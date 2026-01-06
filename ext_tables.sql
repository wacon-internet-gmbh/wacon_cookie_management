#
# Table structure for table 'tx_waconcookiemanagement_domain_model_cookie'
#
CREATE TABLE tx_waconcookiemanagement_domain_model_cookie (

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
