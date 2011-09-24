### how to install

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