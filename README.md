
# LaraBlogs ~ Blog App ~ make ❤ Laravel

This is a blog project with advanced features such as live search via AJAX calls, read posts, share posts directly to whatsapp, donation feature for a single post by visitor(razorpay gateway) etc. Admin can create categories, edit & delete them. Admin can make posts & edit after publistion. 
Admin able to see search histories, visitor's contact requests, next article requests by visitors etc.


Fully responsive app thanks to:
Admin Panel: https://github.com/xriley/portal-theme-bs5
Frontend Logbook theme fisher: https://themefisher.com/products/logbook

Note: for some technical reason Razorpay test/live key has been disabled. But don't worry you can paste your own live key into that and start accepting payments.
I have also applied google adsence into project which also disabled. But you can un-comment that and put your your script of display ads.



## Authors

- [@shimanta das](https://github.com/iamshimantadas)
- Schema Of SQL: https://dbdiagram.io/d/larablogdb-64c22ef802bd1c4a5ec8ceb9

## Local Setup

1. First migrate your's local database
```
php artisan migrate
```
2. Now generate your key
``` 
php artisan key:generate 
```

## Installation

you can test this app in any enviroment such as windows, Linux & Mac.

For windows/Mac: use XAMPP https://www.apachefriends.org/download.html

For linux(debian/ubuntu etc.)
```bash
  sudo apt-get update && apt-get upgrade
  sudo apt-get install apache2
  sudo systemctl enable apache2
  sudo systemctl start apache2

  sudo apt install mariadb-server
  sudo mysql_secure_installation

  sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql php-cgi php-cli php-curl php-json

  sudo chmod 777 /var/www/html
  
  sudo apt install phpmyadmin

  ** dont apply below into production server
  sudo chmod -R $USER:$USER /var/www/html
  **
  
```
    
## License

open-source


## Tech Stack

**Client:** BootStrap, jQuery, AJAX

**Server:** Laravel MVC, MySQL

