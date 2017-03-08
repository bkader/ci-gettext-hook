<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// Prepare current language
		$data['language'] = $this->config->item('current_language');

		// Prepare available languages
		$languages = $this->config->item('languages');
		// Remove current language from available languages
		unset($languages[$data['language']['folder']]);
		$data['languages'] = $languages;


		// We need URL helper
		function_exists('anchor') OR $this->load->helper('url');
		$lang_urls = array();
		foreach ($languages as $lang)
		{
			$lang_urls[] = anchor('process/lang/'.$lang['code'], __($lang['name_en']));
		}
		$data['lang_urls'] = implode(' - ', $lang_urls);


		$this->load->view('welcome_message', $data);
	}
}
