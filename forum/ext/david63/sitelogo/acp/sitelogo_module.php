<?php
/**
*
* @package Site Logo Extension
* @copyright (c) 2014 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\sitelogo\acp;

class sitelogo_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $phpbb_container, $user;

		$this->tpl_name		= 'sitelogo_manage';
		$this->page_title	= $user->lang('SITE_LOGO');

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('david63.sitelogo.admin.controller');

		$admin_controller->display_options();
	}
}
