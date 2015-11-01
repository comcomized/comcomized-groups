<?php
/*
Plugin Name: ComComized-Groups (Custom Post Type)
Description: Custom Post Types for ComComized groups and websites.
License: Humanitarian AGPL 
Author: Erez Elul Namzezam Comcomist
Author URI: http://comcomist.wikidot.com
*/
/*
http://comcomist.wikidot.com/comcomized-groups-functional-requirements
http://blog.teamtreehouse.com/addinhttps://codex.wordpress.org/Creating_Tables_with_Pluginsg-custom-fields-to-a-custom-post-type-the-right-way


https://codex.wordpress.org/Creating_Tables_with_Plugins
setup information:
https://codex.wordpress.org/Writing_a_Plugin#Saving_Plugin_Data_to_the_Database
https://codex.wordpress.org/Taxonomies#Custom_Taxonomies
https://codex.wordpress.org/Function_Reference/register_taxonomy
file:///home/a/Downloads/Function%20Reference_register%20taxonomy%20%C2%AB%20WordPress%20Codex.html
https://codex.wordpress.org/Creating_Tables_with_Plugins
*/

add_action( 'init', 'ComCom_cpt' );

function ComCom_cpt() {

register_post_type( 'ComCom', array(
  'labels' => array(
    'name' => 'ComComized groups',
    'singular_name' => 'ComComized group',
   ),
  'description' => 'The creator of the group defines the agreement between its members of which terms are specified in https://comcomized.com/term-and-conditions/',
  'public' => true,
  'menu_position' => -5,
  'supports' => array( 'title' )
));
//file:///home/a/Downloads/Function%20Reference_register%20taxonomy%20%C2%AB%20WordPress%20Codex.html
register_taxonomy( 'a_', 'ComCom', $args );
if(register_taxonomy_for_object_type( 'a_', 'ComCom' )){}else{}

}

global $comcomized_db_version;
$comcomized_db_version = '1.0';

function comcomized_install() {
	global $wpdb;
	global $comcomized_db_version;

	$table_name = $wpdb->prefix . 'comcomized';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT, 
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		text text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

/*
// This table is used in wp plugin site  as its fingerprint with its compressed 
// form are available to download for to be cloned, where its data is processed on 
// the client side by it pair client app, such as gpg4win, kgpg or of the guardianproject 
// listed in https://guardianproject.info/code/gnupg/. The table use id of user or group 
// distinct by is_group+2*id. Each (of symmetric key encrypting) its rows is encrypted
// with pubkey of the entity after sometime any of its column with pubkey of roles. 
// Each entinty has its iiaom either of the prviate person or of the logo including 
// the address of the group.
// A metadata object per bp user and group or 2 tables $comcoms=($comcom_users,$comcom_groups)==
[
(key)id =>,
	// in users or groups the $n/2 of the id of the holder $n,
	// (even as $n=group_id*2, or odd as #n=user_id*2+1),
	// but without .percentage notating the non_peer holding percentage).
	//
visibility-scope=>, // for other groups (checked against (what?all the) Upwards 
	// groups of the viewing user).
	//
invisible=>,

.heldby =>, used for Downwards traversal,
	// list of id of its children holders,
	// with the .percentage only when notating the non_peer holding percentage.
	//
.holding=>, used for Upwards traversal or validity by root in case of entering group or 
	// visibility in viewing the other grandchildren. A list of triples of (
	// Null or id of the holding parent,
	// Null or id of grandparent with the private key for decrypting the visible,
	// id of root of its tree). The root is used for validating joining, such that 
	//  all root here should not be equal to any of the roots of the parent or pair 
	//  in the new joining. 
	//
visible=>,
.pubkey
.iiaom
.name-type=>,
	// unchangeable name, as it is given by its creator,
	// when it is comcom (having even id), it is followed by dot and by $type.$born,
	// where $type= $d.$is_d_static.$authority.$is_open.$proportionality,
	// while using y or n for $is_d_static or $is_open and
	// as the $d is of that in its formation
	// where $born = the time of creating the record
	// for the comcom(important when d is not static).
	//
.c=>,	// = number of peers in the group.
	//
.v=>,	// = the value held by each peer.
	//
.d=>,	// = the ratio of the comcom held by all peers.
	//
.m=>,	// = the value of the comcom (hence $v=$m*$peer_power, as peer_power = $d/$c=$v/$m).
	//
.steepness=>, // = ($V-$oldV)*($c/$oldV), where |$steepness|<= $proportionality (default=1) ,
	// where $oldV is the last one or average of some last occurrences.
	//
.constancy=>,	//set only in creation, 
	//The agreement, or the qualified majority required to change it, is unchangeable
	// 1 if the agreement is unchangeable otherwise 
	// the percentage of the majority biger than 0.5.which is required for to change it.
]
 * */

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'comcomized_db_version', $comcomized_db_version );
}

function comcomized_install_data() {
	global $wpdb;
	
	$welcome_name = 'Mr. ComComist';
	$welcome_text = 'Congratulations, you just completed the installation of a comcomized group!';
	
	$table_name = $wpdb->prefix . 'comcomized';
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'time' => current_time( 'mysql' ), 
			'name' => $welcome_name, 
			'text' => $welcome_text, 
		) 
	);
}

/*
A metadata object per bp user and group or 2 tables $comcoms=($comcom_users,$comcom_groups)==[
(key)id =>,
// in users or groups the $n/2 of the id of the holder $n,
//
(even as $n=group_id*2, or odd as #n=user_id*2+1),
//
but without .percentage notating the non_peer holding percentage).
heldby =>,
// list of id of its children holders, used for Downwards traversal,
//
with the .percentage only when notating the non_peer holding percentage.
holding=>,
// list of pairs of (id of of the holding parent,
//
id of its tree) used for Upwards traversal, or
// when is null, it is a tree used for validating joining,
//
in which case all its heldby even element being id are replaced by their heldby.
name-type=>,
// unchangeable name, as it is given by its creator,
//
when it is comcom (having even id), it is followed by dot and by $type.$born,
//
where $type= $d.$is_d_static.$authority.$is_open.$proportionality,
//
while using y or n for $is_d_static or $is_open and
//
as the $d is of that in its formation
//
where $born
= the time of creating the record
//
for the comcom(important when d is not static).
c=>,
//
= number of peers in the group.
v=>,
//
= the value held by each peer.
d=>,
//
= the ratio of the comcom held by all peers.
m=>,
//
= the value of the comcom (hence $v=$m*$peer_power, as peer_power = $d/$c=$v/$m).
steepness=>,
//
= ($V-$oldV)*($c/$oldV), where |$steepness|<= $proportionality (default=1) ,
//
where $oldV is the last one or average of some last occurrences.
visibility-scope=>,// for other groups (checked against (what?all the) Upwards groups of the viewing
user).
]
/*
The representation of the holding in Breadcrumb+FlexiPages way:
the tree for holding as Breadcrumb-up and FlexiPages-down per tree in table sorted by top property as
root in each tree. such table is in page of user or group which is a node in normal site Breadcrumb + its
FlexiPages.
User:
In-Creating: User agree with the terms, being human and having only 1 user for to be able to join or
create comcom groups.
In-Updating: The user agree with losing all properties in addition to other legal consequences on
breaking the agreement.
in-Viewing:
in-Deleting:Group:
in-Creating: Define the type, generate the contract, create the 4 pages and its record for to create
common company based on personal agreement having sub domain under its name. the group link to its 4 pages and
showing its record.
in-Updating:
In-Viewing: depended on its visibility
in-Deleting:
Record:
in-Creating:created when when the group is created .
in-Updating: updated when group's tpage is updated
in-Viewing: : considering its scope
in-Deleting: when group is deleted
Transactions Page:
in-Creating: Creating the page including the contract and in a type having log of all transactions, the
fields c v t etc, which are updated after each transaction on its answer + in the record + general meeting
page.
in-Updating:
in-Viewing:
in-Deleting:
General-meeting Page:
in-Creating:
in-Updating:
in-Viewing:
in-Deleting:
Executive page:
in-Creating:
in-Updating:
in-Viewing:
in-Deleting:
Activity page:
in-Creating:
in-Updating:
in-Viewing:
In-Deleting:
*/
?>
