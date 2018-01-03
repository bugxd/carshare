# carshare
##laravel web project

##Install composer
	for windows just download and run installer

##cmd(ADMIN)
	composer global require "laravel/installer"
	laravel new carshare

##change db settings
    carshare/config/db
        mysql
        change to db my settings
            db := 'carshare' user := 'root' pw:=''
    carshare/.env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=carshare
        DB_USERNAME=root
        DB_PASSWORD=*********
    
##Authentication
###cmd(ADMIN)
    //to setup project
    php artisan make:auth 
    //to put in your db
    php artisan migrate 

###ERROR
	C:\xampp\htdocs\carshare>php artisan migrate
	Migration table created successfully.
	
	In Connection.php line 664:
	
	  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQ
	  L: alter table `users` add unique `users_email_unique`(`email`))
	
	
	In Connection.php line 458:
	
	  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes

###FIX
    //carshare\app\Providers\appserviceprovider
    use Illuminate\Support\Facades\Schema; 
    public function boot() { Schema::defaultStringLength(191); } 


##terminal commands for db migrations
    php artisan make:migration create_cars_table --create=cars
    php artisan make:migration create_reservations_table --create=reservations
    php artisan make:migration create_user_car_table --create=user_car
    
##terminal commands for models
    php artisan make:model Car
    
##terminal commands for mail
    php artisan make:mail Car
    
##termina commands refresh seed
    php artisan migrate:refresh --seed

##terminal commands for link img (storage)
    php artisan storage:link
    
help with eloquent
    https://scotch.io/tutorials/a-guide-to-using-eloquent-orm-in-laravel
    https://www.youtube.com/watch?v=9ynXDwHK3wI&list=PLnBvgoOXZNCP2LEKmvu2W-eUkO-DYn0TL&index=27
    
##change mail sever
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=OUR_MAILNAME (carshare24@gmail.com)
    MAIL_PASSWORD=OUR_PW  (check account)
    MAIL_ENCRYPTION=null   (tls)
    
##terminal command for dropzone (drag&drop)
    composer require laravelcollective/html