<?php

if (!defined('MEDIAWIKI')) {
	die('This is a MediaWiki extension, and must be run from within MediaWiki.');
}

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'QQLogin',
	'version' => '0.1',
	'author' => array('Illvili'),
	'descriptionmsg' => 'qqlogin-desc'
);

// Create a QQ group
$wgGroupPermissions['QQ'] = $wgGroupPermissions['user'];

$wgAutoloadClasses['SpecialQQLogin'] = dirname(__FILE__) . '/SpecialQQLogin.php';
$wgAutoloadClasses['QQSigninUI'] = dirname(__FILE__) . '/QQLogin.body.php';

$wgExtensionMessagesFiles['QQLogin'] = dirname(__FILE__) .'/QQLogin.i18n.php';
$wgExtensionAliasFiles['QQLogin'] = dirname(__FILE__) .'/QQLogin.alias.php';

$wgSpecialPages['QQLogin'] = 'SpecialQQLogin';
$wgSpecialPageGroups['QQLogin'] = 'login';

$qsu = new QQSigninUI;
$wgHooks['BeforePageDisplay'][] = array($qsu, 'efAddSigninButton');

