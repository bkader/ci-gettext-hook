<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		// Let's first pass the current language to view.
		$data['language'] = $this->config->item('current_language');

		// Prepare our available languages lists.
		$languages = $this->config->item('languages');

		// Remove the current language from the rest of languages.
		unset($languages[$data['language']['folder']]);

		// Pass language to view.
		$data['languages'] = $languages;

		// Let's prepare our links now.

		// We make sure to load URL helper.
		(function_exists('anchor')) OR $this->load->helper('url');

		// Prepare our languages anchors.
		$lang_urls = array();
		foreach ($languages as $lang)
		{
			$lang_urls[] = anchor('process/lang/'.$lang['folder'], __($lang['name_en']));
		}
		$data['lang_urls'] = implode(' - ', $lang_urls);

		// Load view file.
		$this->load->view('welcome_message', $data);
	}
}
