<?php

class QQSigninUI {
	public function efAddSigninButton(&$out, &$skin) {
		global $wgUser, $wgExtensionAssetsPath, $wgScriptPath;
	
		if (!$wgUser->isLoggedIn()) {
			$link = SpecialPage::getTitleFor('QQLogin', 'redirect')->getLinkUrl(); 
			$out->addInlineScript('$j(document).ready(function(){$j("#pt-anonlogin, #pt-login").after(' .
				'\'<li id="pt-qqsignin"><a href="' . $link . '">' .
					'<img src="' . $wgExtensionAssetsPath . '/QQLogin/images/connect_logo_qq.png" width="120" height="24" />' .
				'</a></li>\');' .
			'})');
		}
		return true;
	}
}