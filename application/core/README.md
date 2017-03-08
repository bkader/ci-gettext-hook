## Why is this file included?
In case you use __HMVC__ structure, this extension of __CI_Controller__ is needed to load modules related text domains.

Let's assume we are using [Wiredesignz](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc) add-in and we have created our modules folder and so.

The __welcome__ module structure, *for instance*, is:

    welcome/
        controllers/
            Welcome.php
        views/
            welcome_view.php
    // Adding
        locale/
            en_US/
                LC_MESSAGES/
                    welcome.mo
                    welcome.po

As you can see, each module you want to internationalize should respect this structure.
You module's controllers should extends __MY_Controller__ like so:

    class Welcome extends MY_Controller {}

As you can see inside the file __MY_Controller__ at line __#58__ the *$this->load->module_path* does not really exist and you have to add it. To do so go to __APPPATH/third_party/MX/Loader.php__ at line __#85__ and add this line

    if (is_dir($module_path = $location.$module.'/') && ! in_array($module_path, $this->_ci_model_paths))
    {
        $this->module_path = $module_path; // <- This one here
        array_unshift($this->_ci_model_paths, $module_path);
    }

Now you can use any provided functions but don't forget to add your module's name as a text domain. Example:

    _t('Welcome to CodeIgniter', 'welcome');
    _n('%d file', '%d files', 2, 'welcome');
    _x('Post', 'noun', 'welcome');