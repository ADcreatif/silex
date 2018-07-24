# installation de Silex

#### [installer composer](https://getcomposer.org/download/)
     
     php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
     php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
     php composer-setup.php
     php -r "unlink('composer-setup.php');" 

#### récupérer Silex
    php composer.phar require silex/silex "^2.0"

#### lancer Silex 
    // > index.php
   
    require_once __DIR__.'/vendor/autoload.php';
    
    $app = new Silex\Application();
    
    $app->get('/hello/{name}', function($name) use($app) {
        return 'Hello '.$app->escape($name);
    });
    
    $app->run();

#### configurer le .htaccess
    <IfModule mod_rewrite.c>
        Options -MultiViews
    
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ index.php [QSA,L]
    </IfModule>
