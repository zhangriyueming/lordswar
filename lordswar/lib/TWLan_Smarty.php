<?php
class TWLan_Smarty extends SmartyBC {
	function __construct() {
		parent::__construct();
		// $this->registerPlugin('function', 'continent', 'twlan_smarty_continent');
		$this->registerPlugin('function', 'generateLink', array(&$this, 'generateLink'));
		$this->registerPlugin('modifier', 'round', 'round');
		$this->template_dir = 'templates';
		$this->compile_dir = 'templates_c';
		if(function_exists('smarty_graphic_package')){
			smarty_graphic_package($this);
		}
	}
	function generateLink($params){
		if(array_key_exists('request_query', $params) && $params['request_query'] == 'true'){
			parse_str($_SERVER['QUERY_STRING'], $requestQuery);
			unset($params['request_query']);
			$params = array_merge($requestQuery, $params);
		}
		$file = !array_key_exists('file', $params) ? 'game' : $params['file'];
		unset($params['file']);
		return $file.'.php'.$this->httpBuildQuery($params);
	}
	function httpBuildQuery($params){
		foreach($params as $key => $value){
			if(empty($value))
				unset($params[$key]);
		}
		return '?'.http_build_query($params, '', '&amp;');
	}
}
?>