# csearch

How to install project

- Set the database structure, Use the 
  /db-script/csearch.sql and run in mysql.

- Go to project directory and run command "composer install". 

- Edit .env file and set mysql configuration 

- Give read write permission to var, var/cache and var/log directory by running following command
chmod 777 var/cache var/log

- Clean cache 
rm -rf var/log/dev.log var/cache/*

- Alternate command to clean cache
php bin/console cache:clear --env=dev --no-debug
php bin/console cache:clear --env=prod --no-debug

-Commands to set up assets
php bin/console assets:install --env=prod
php bin/console assets:install --env=dev

- Visit to your domain.com to view page.

- If you open page first time then you will see "Dummy Data" button. Click on it to insert some dummy data in DB