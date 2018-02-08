# Why I included this file?
In case you use HMVC structure, this file is needed to load modules related language files.
All you have to do is to create the **.mo** file inside module's language folder like so (module: _users_):
```
- users
	- language
		- french
			- users.po (editable)
			- users.mo (compiled)
		- arabic
			- users.po (editable)
			- users.mo (compiled)
```
If you don't want to loose what you already did, simply copy the method inside the file to your work.
Now that everything is set up, you can use any provided function with the optional **$file** as the final argument:
```php
__('This is a line', 'user');			// Ceci est un message
_n('1 user', '%d users', 5, 'users');	// 5 utilisateurs.
_x('Use', 'noun', 'users');				// Utilisation
_x('Use', 'verb', 'users');				// Utiliser
// ... etc
```
