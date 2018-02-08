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
 * Process Class.
 *
 * This controller is here as an example on how to switch language on the site.
 * You may use it as it is or you can make your own, just follow the example.
 *
 * @package 	CodeIgniter
 * @subpackage 	Gettext
 * @category 	Controllers
 * @author 		Kader Bouyakoub <bkader@mail.com>
 * @link 		https://github.com/bkader
 * @copyright 	Copyright (c) 2018, Kader Bouyakoub (https://github.com/bkader)
 * @since 		Version 1.0.0
 * @version 	1.0.0
 */
class Process extends CI_Controller
{
	/**
	 * Change site's current language.
	 * @access 	public
	 * @param 	string 	$language 	The language to use.
	 * @return 	void
	 */
	public function lang($language = 'english')
	{
		// We make sure to load URL helper.
		(function_exists('redirect')) OR $this->load->helper('url');

		// We make sure the function to switch language exists.
		(function_exists('switch_language')) && switch_language($language);

		/**
		 * Here we simply redirect to home page if $_GET['next'] is
		 * not provided. Otherwise we redirect to it.
		 * @example 	example.com/process/lang/french?next=home
		 * This will redirect to: example.com/home
		 */
		redirect($this->input->get('next'));
	}
}
