<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Extending CodeIgniter CI_Controller
 *
 * @package 	CodeIgniter
 * @category 	core
 * @author 	Kader Bouyakoub <bkader@mail.com>
 * @link 	https://github.com/bkader
 * @link 	https://twitter.com/KaderBouyakoub
 */

class MY_Controller extends MX_Controller {

	/**
	 * Instance of Gettext class
	 * @var object
	 */
	protected $gettext;

	/**
	 * Module's name
	 * @var string
	 */
	protected $module = NULL;

	/**
	 * Controller's name
	 * @var string
	 */
	protected $controller = NULL;

	/**
	 * Method's name
	 * @var string
	 */
	protected $method = NULL;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		// Prepare Gettext class reference
		$this->gettext = new Gettext;
		parent::__construct();

		// Fill module, controller and method
		$this->module = $this->get_module();
		$this->controller = $this->router->fetch_class();
		$this->method = $this->router->fetch_method();
	}

	// ------------------------------------------------------------------------

	/**
	 * In case of using a module, this method retrieves the path to it and
	 * build the path to the folder where translation files should be.
	 *
	 * @access 	private
	 * @param 	none
	 * @return 	string|NULL
	 */
	private function get_module()
	{
		if (method_exists($this->router, 'fetch_module') 
			&& ! empty($module = $this->router->fetch_module()))
		{
			// Retrieve module's path and build path to locales.
			$locale_path = NULL;
			foreach (Modules::$locations as $location => $offset)
			{
				if (is_dir($location.$module))
				{
					$locale_path = realpath($location.$module).DIRECTORY_SEPARATOR.'locale';
					break;
				}
			}

			// IF $local_path is set, we bind textdomain.
			if ($locale_path !== NULL)
			{
				T_bindtextdomain($this->module, $locale_path.'/locale');
			}

			return $module;
		}

		return NULL;
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */