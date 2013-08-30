<?php

if (!defined('MEDIAWIKI')) {
	die('This is a MediaWiki extension, and must be run from within MediaWiki.');
}

class SpecialQQLogin extends SpecialPage {
	public function __construct() {
		parent::__construct('QQLogin');
	}
	
	public function execute($parameter) {
		$this->setHeaders();
		
		switch ($parameter) {
			default:
				$this->_default();
				break;
		}
	}
	
	private function _default() {
		global $wgOut, $wgUser, $wgScriptPath, $wgExtensionAssetsPath;
		
		$wgOut->setPagetitle($this->msg('qqlogin'));
		
		if (!$wgUser->isLoggedIn()) {
			$wgOut->addWikiMsg('qqlogin-signup');
			
			$wgOut->addHTML('<a href="' . $this->getTitle('redirect')->getFullURL() .'">' .
				'<img src="' . $wgExtensionAssetsPath . '/QQLogin/images/connect_logo_qq.png" width="120" height="24" />' .
			'</a>');
		} else {
			$wgOut->addWikiMsg('qqlogin-alreadyloggedin');
		}
	}
}