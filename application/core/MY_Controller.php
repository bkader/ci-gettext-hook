<?php
/**
 * CodeIgniter Gettext Hooks
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2018, Kader Bouyakoub <bkader@mail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package 	CodeIgniter
 * @author 		Kader Bouyakoub <bkader@mail.com>
 * @copyright	Copyright (c) 2018, Kader Bouyakoub <bkader@mail.com>
 * @license 	http://opensource.org/licenses/MIT	MIT License
 * @link 		https://github.com/bkader
 * @since 		Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller Class.
 *
 * @package 	CodeIgniter
 * @subpackage 	Gettext
 * @category 	Core Extension
 * @author 		Kader Bouyakoub <bkader@mail.com>
 * @link 		https://github.com/bkader
 * @since 		Version 1.0.0
 * @version 	1.0.0
 */
// class MY_Controller extends MX_Controller
class MY_Controller extends CI_Controller
{
	/**
	 * Class constructor.
	 * @return 	void
	 */
	public function __construct()
	{
		parent::__construct();

		// This is the most important part. Name it anything you want.
		$this->_set_module();
	}

	// ------------------------------------------------------------------------

	/**
	 * Make sure to load the language file for the current module.
	 * @access 	private
	 * @param 	void
	 * @return 	void
	 */
	private function _set_module()
	{
		// We make sure we are using HMVC structure.
		if ( ! method_exists($this->router, 'fetch_module'))
		{
			return;
		}

		$module = $this->router->fetch_module();

		if ( ! empty($module))
		{
			// Option 1: Wiredesignz
			// foreach (Modules::$locations as $location => $offset)
			// Jens Segers.
			foreach ($this->config->item('modules_locations') as $location)
			{
				if (is_file($location.$module.'/language/'.$module.'.mo'))
				{
					Gettext::load_language($module, $location.$module.'/language');
					// OR simply:
					// load_language($module, $location.$module.'/language');
					break;
				}
			}

		}
	}
}
