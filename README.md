
# CI-Gettext-Hook ([Demo](http://demo.ianhub.net/codeigniter/gettext/))
This hook enables the use of __php_gettext__ for [CodeIgniter](https://www.codeigniter.com/) framework.
## How to use?
Unlike my former [CI-Gettext Library](https://github.com/bkader/ci-gettext) that requires a little bit of configuration and alteration to CodeIgniter core files, this hooks does not really alter a thing and needs a meaningless configuration.
Simply drop includes files into your CodeIgniter installation and enable hooks inside your `application/config/config.php` file.

```php
$config['enable_hooks'] = TRUE;
```
If you have any additional hooks used, open __hooks.php__ file provided and copy lines insde.

This hooks requires at least two __(2)__ languages enabled inside your `application/config/gettext.php` configuration file.
```php
$config['languages'] = array('arabic', 'english', 'french');
```
By default, you will find all languages that I included enabled, simply delete any language that you don't want to use.
## How to add lines?
Simply go to the corresponding language (let's say __french__) and use a __PO__ editor (example: [Poedit](https://poedit.net/)), add as many needed lines as you want then save the file and generate the __.MO__ file. DONE!
## How to print lines?
I provided some functions that help you printing your lines:

##### `line($msgid, $domain[optional], $args[optional])`
This function mimics __gettext()__ function or __dgettext()__ function if a text domain is provided. It returns the requested line and use arguments if there are any. Examples:
```php
echo line('Hello %s!', NULL, 'Kader'); // Using default domain
echo line('Hello %s!', 'welcome', 'Kader'); // Using welcome(*) domain
// Output: Hello Kader! (english), Salut Kader! (french)
```
##### `nline($singular, $plural, $number, $domain[optional])`
This function mimics __ngettext()__ function or __dngettext()__ function if a domain is provided.
```php
echo nline('%s item found', '%s items found', 1);
// Output: 1 item found
echo nline('%s item found', '%s items found', 5, 'welcome');
// output: %s items found found inside 'welcome' text domain (Use printf()).
```
##### `xline($msgid, $context, $domain[optional])`
This function mimics __pgettext()__ function or __dpgettext()__ function if a text domain is provided. This handles gettext contexts.

##### `xnline($singular, $plural, $number, $context, $domain[optional])`
This function mimics __npgettext()__ function or __dnpgettext()__ function if a text domain is provided. This handles gettext contexts.

There are some functions aliases that you can use as well
- __line()__ function has two (__2__) aliases:
    - **__()** which is a little short version of it.
    - **_e()** which echoes the retrieved string.
- __nline()__ function has two (__2__) aliases:
    - **_n()** which is a little short version of it.
    - **_en()** which echoes the retrieved string.
- __xline()__ function has two (__2__) aliases:
    - **_x()** which is a little short version of it.
    - **_ex()** which echoes the retrieved string.
- __xnline()__ function has two (__2__) aliases:
    - **_xn()** which is a little short version of it.
    - **_exn()** which echoes the retrieved string.

This hook will work even if **gettext** extension is disable. In fact, it is abolutely not needed at all.

## Get languages details
Other functions are included so you can manage your site languages
##### current_language(), default_language():
These functions return an array of current and default languages details.
##### languages()
This function returns an array of site enabled languages. If called with no parameters, it returns the full array of languages details. If any parameter is passed, it will only returns the requested key from languages arrays
Example:
```php
print_r(languages('name', 'name_en', 'folder'));
```
Output:
```php
array(
    'english' => array(
        'name'    => 'English'
        'name_en' => 'english',
        'folder'  => 'english'
    ),
    'french' => array(
        'name'    => 'Français'
        'name_en' => 'French',
        'folder'  => 'french'
    )
);
```
#### switch_language($language= 'english')
As its name tell, if simply changes site current language.

### Using HMVC?
If you are using HMVC structure ([wiredesignz](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc) OR [jenssegers](https://github.com/jenssegers/codeigniter-hmvc-modules)), [click here](https://github.com/bkader/ci-gettext-hook/tree/stable/application/core/).

## Credits and Licenses
All credits go to their respective owners [CodeIgniter](http://www.codeigniter.com/) & [Launchpad](https://launchpad.net/php-gettext/) and a little bit of the rest for [Me](https://github.com/bkader/) :D.
