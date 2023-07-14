<?php
// Table names 
define('CC_BIRDS_TABLE_NAME', 'cc_birds');

/**
 * Creates custom table for disk raw data - BIRDS
 */
add_action('after_setup_theme', 'cc_create_cc_birds_db_table');
function cc_create_cc_birds_db_table() {
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	global $wpdb;
	//$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . CC_BIRDS_TABLE_NAME;

    // Checks is there a data tabel with that name
	if (cc_custom_db_table_exist($table_name)) return false;

	// SQL query to create the table
	$sql = "
	CREATE TABLE IF NOT EXISTS $table_name (
		id INT(11) NOT NULL AUTO_INCREMENT,
		eesnimi VARCHAR(255) NOT NULL,
		perekonnanimi VARCHAR(255) NOT NULL,
		rongakood_tahed VARCHAR(255),
		rongakood_numbrid VARCHAR(255),
		liik VARCHAR(255),
		sugu VARCHAR(1),
		vanus INT(11),
		asukoht VARCHAR(255),
		kuupaev DATE,
		kellaaeg TIME,
		muud_margised TEXT,
		metallronga_info TEXT,
		varvironga_kood VARCHAR(255),
		pesakonna_suurus INT(11),
		poja_vanus INT(11),
		poja_vanuse_tapsus VARCHAR(255),
		puugimeetod VARCHAR(255),
		meelitusvahend VARCHAR(255),
		kasti_vorgu_pesa_nr VARCHAR(255),
		staatus VARCHAR(255),
		tiiva_pikkus FLOAT,
		mass FLOAT,
		rasvasus FLOAT,
		rasvasus_skaala INT(11),
		jooksme_pikkus FLOAT,
		jooksme_pikkuse_meetod VARCHAR(255),
		noka_pikkus FLOAT,
		noka_pikkuse_meetod VARCHAR(255),
		pea_uldpikkus FLOAT,
		tagakuunise_pikkus FLOAT,
		sulestiku_kood VARCHAR(255),
		sulgimine VARCHAR(255),
		labahoosulgede_sulgimine VARCHAR(255),
		labahoosule_pikkus FLOAT,
		labahoosule_tipu_seisund VARCHAR(255),
		saba_pikkus FLOAT,
		sabasulgede_vahe FLOAT,
		karpaalhoosulg VARCHAR(255),
		vanad_kattesuled VARCHAR(255),
		haudelaik VARCHAR(255),
		nukktiib VARCHAR(255),
		rinnalihas VARCHAR(255),
		soomaaramismeetod VARCHAR(255),
		biotoop VARCHAR(255),
		markused TEXT,
		korduspuugid VARCHAR(255),
		PRIMARY KEY (id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";

	// Create the table
	$wpdb->query($sql);
	
}

/**
 * Checks if custom DB tables exist
 */
function cc_custom_db_table_exist($table_name) {
	global $wpdb;
	if ( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") ) {
		return true;
	}
	return false;
}






































