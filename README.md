# how to install

    git clone https://github.com/Zauberfisch/silverstripe-boilerplate.git
    cd silverstripe-boilerplate/
    git submodule init
    git submodule update

create a MySQL database, and change $database in /mysite/_config.php
  
create a file named `_ss_environment.php`, you can place that inside the repo, parent folder or in the parent parent folder.  
the file should look like this(more infos at http://doc.silverstripe.org/sapphire/en/topics/environment-management)
    
    <?php
    
    define('SS_DATABASE_SERVER', 'localhost');
    define('SS_DATABASE_USERNAME', 'YOUR_DATABASE_USERNAME');
    define('SS_DATABASE_PASSWORD', 'YOUR_DATABASE_PASSWORD');
    
    define('SS_ENVIRONMENT_TYPE', 'dev');
    
    define('SS_DEFAULT_ADMIN_USERNAME', 'YOUR_EMAIL');
    define('SS_DEFAULT_ADMIN_PASSWORD', 'YOUR_PASSWORD');
    
    global $_FILE_TO_URL_MAPPING;
    $_FILE_TO_URL_MAPPING['/var/www/'] = 'http://127.0.0.1';
    
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
Once you have installed compass (see http://compass-style.org/install/) run the following command in your project root folder:

    compass watch -e production .

which will tell compass to watch for any file changes inside /mysite/scss
