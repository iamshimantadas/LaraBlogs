
# LaraBlogs ~ Blog App ~ make ❤ Laravel

This is a blog project with advanced features such as live search via AJAX calls, read posts, share posts directly to whatsapp, donation feature for a single post by visitor(razorpay gateway) etc. Admin can create categories, edit & delete them. Admin can make posts & edit after publistion. 
Admin able to see search histories, visitor's contact requests, next article requests by visitors etc.


Fully responsive app thanks to:
Admin Panel: https://github.com/xriley/portal-theme-bs5

Frontend Logbook theme fisher: https://themefisher.com/products/logbook









## Authors

- [@shimanta das](https://github.com/iamshimantadas)






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

