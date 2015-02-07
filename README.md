This is a basic virtual host creator using ports. 

The code was tested and working on Debian Jessie.

Setup instructions

1. create a database and import the sql file
2. copy php files to your server and change db.php to fit your database connection
2.a chmod +w /var/www
3. create /etc/apache2/myports.conf
3.a chmod +rw /etc/apache2/myports.conf
4. create /etc/apache2/sites-available/vhosts.conf
4.a chmod +rw /etc/apache2/sites-available/vhosts.conf
5. edit /etc/apache2/ports.conf	add after 'Listen 80' this line 'Include myports.conf'
6. edit /etc/apache2/apache2.conf add after 'Include ports.conf' this line 'Include sites-enabled/vhosts.conf'
7. add to /etc/apache2/ the restart.sh script file
7.a chmod +xs /etc/apache2/restart.sh
8. append /ets/sudoers : 
	Cmnd_Alias      RESTART_APACHE = /etc/apache2/restart.sh
	www-data ALL=NOPASSWD: RESTART_APACHE


