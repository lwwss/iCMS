<?php
/**
* iCMS - i Content Management System
* Copyright (c) 2007-2017 iCMSdev.com. All rights reserved.
*
* @author icmsdev <master@icmsdev.com>
* @site https://www.icmsdev.com
* @licence https://www.icmsdev.com/LICENSE.html
*/
defined('iPHP') OR exit('What are you doing?');
defined('iPHP_LIB') OR exit('iPHP vendor need define iPHP_LIB');
require dirname(__FILE__) .'/SphinxClient/sphinx.class.php';

function SphinxClient($hosts) {
	if(isset($GLOBALS['iSphinx'])){
		$GLOBALS['iSphinx']->init();
	}else{
		if(empty($hosts)){
			return false;
		}

		$GLOBALS['iSphinx'] = new SphinxClient();
		if(strstr($hosts, 'unix:')){
			$hosts	= str_replace("unix://",'',$hosts);
			$GLOBALS['iSphinx']->SetServer($hosts);
		}else{
			list($host,$port)=explode(':',$hosts);
			$GLOBALS['iSphinx']->SetServer($host,(int)$port);
		}
	}
	return $GLOBALS['iSphinx'];
}
