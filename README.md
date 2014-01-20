# SilverStripe Boilerplate

The SilverStripe Boilerplate aims to make it easier to kick of a new SilverStripe project, just download it and get started.

It is just a collection of config defaults, tools and modules (sass, _ss_environment.php, h5bp, ...) one always needs.    

As of SilverStripe 3.1 this boilerplate requieres [composer](http://getcomposer.org/).

# Maintainers
- Zauberfisch <admin@zauberfisch.at> [@Zauberfisch](http://twitter.com/Zauberfisch)

# how to install

    git clone https://github.com/Zauberfisch/silverstripe-boilerplate.git "myNewProject"
    cd myNewProject/
    composer update

# configuration (with `_ss_environment.php`)

create a file named `_ss_environment.php`, you can place that inside the repo, parent folder or in the parent parent folder.  
the file should look like this (more infos at http://doc.silverstripe.org/sapphire/en/topics/environment-management)

**this method is recommended for database and environment configuration, because you can easily exclude it from version control**
    
    <?php
    
    define('SS_DATABASE_SERVER', 'localhost');
    define('SS_DATABASE_USERNAME', 'YOUR_DATABASE_USERNAME');
    define('SS_DATABASE_PASSWORD', 'YOUR_DATABASE_PASSWORD');
    // define('SS_DATABASE_NAME', 'YOUR_DATABASE_NAME');
    define('SS_DATABASE_CHOOSE_NAME', 2);
    
    define('SS_ENVIRONMENT_TYPE', 'dev');
    define('SS_ERROR_LOG', '/silverstripe.log');
    
    define('SS_DEFAULT_ADMIN_USERNAME', 'YOUR_EMAIL');
    define('SS_DEFAULT_ADMIN_PASSWORD', 'YOUR_PASSWORD');
    
    global $_FILE_TO_URL_MAPPING;
    $_FILE_TO_URL_MAPPING['/var/www/'] = 'http://127.0.0.1';
    
    if (defined('SS_ENVIRONMENT_TYPE') && SS_ENVIRONMENT_TYPE != 'live') {
        // turn on display_errors if we are in dev
        // NOTE: no need for setting error_reporting, this is done by SilverStripe
        ini_set('display_errors', 1);
	}
    
there are 2 ways of setting a database name:    

- you can set the database name via `SS_DATABASE_NAME` ( **recommended for live environement** )
- or you can let SilverStripe automaticly select a database name for you, using `SS_DATABASE_CHOOSE_NAME` SilverStripe will call the database after the project folder name (You can also set it to use the parent folder or the parent parent folder name for the database name) (if silverstripe has permissions on the database server, it will even create them for you)
    Example for the folder `/var/www/myWebsite/httpdocs`
    - `define('SS_DATABASE_CHOOSE_NAME', 1);` => will make the database "httpdocs"
    - `define('SS_DATABASE_CHOOSE_NAME', 2);` => will make the database "myWebsite"
    - `define('SS_DATABASE_CHOOSE_NAME', 3);` => will make the database "www"

`$_FILE_TO_URL_MAPPING` is used to tell SilverStripe which folder has which URL when using the SilverStripe commandline tool "sake"

**now just run mysite.com/dev/build and you are done, no further setup required, you are ready to go**
    
# how to use

This boilerplate is based on the assumption that the project will be a customized website/webapp.
So you might notice there is no theme in the themes folder, the plan is to add all templates, javascript and css/scss into mysite.
Which has the benefit of having the whole project at one place, not separated into 2 folders.

### file structure

    mysite
    |-- code // your php code in here
    |-- css // the css in here is generated from the files in /scss
    |-- images // project images
    |-- javascript // all your self written javascript
    |-- scss // your scss, which gets processed and written into /css
    |-- templates // your templates, that others put into themes/mytheme/templates
    |-- thirdparty // all thirdparty code goes in here (jquery plugins)
    |-- .gitignore
    |-- _config.php
    |-- config.rb // config file for sass

### SASS / SCSS

This boilerplate is prepared for being used with sass (http://sass-lang.com/) and compass (http://compass-style.org/)
Once you have installed compass (see http://compass-style.org/install/) run the following command in your mysite folder:

    compass watch .
 
which will tell compass to watch for any file changes inside /mysite/scss    
To generate minified css for production, set the `environment = :production` in [mysite/config.rb](mysite/config.rb).
