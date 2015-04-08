# Thermospas Corporate Website

## Developer Environment

### Setup

1. Install Vagrant [(link)](https://www.vagrantup.com/)
2. Install Virtual Box [(link)](https://www.virtualbox.org/)
3. Clone this repository
4. Create `wp-config.php`
5. Copy contents of `wp-config-sample.php` into `wp-config.php` and substitute insert the proper credentials to access your local WP database. (see below) It is suggested to turn on debug mode:  `define('WP_DEBUG', true);`
6. Copy the contents of `dbconn-sample.php` into `dbconn.php` and substitute insert the proper credentials (see below) to access your local contact form database.
7. Run `vagrant up` from root of repository

### Information

- Website: http://192.168.53.101
- WP Admin: http://192.168.53.101/wp-admin
- WP Admin Login: admin / Bythepixel!1
- Database access: http://192.168.53.101/phpmyadmin
- Database host: `localhost`
- WP Database Name: `admin_thermo_wp`
- Database user: `root`
- Database password: `root`
- Ssh access: Run `vagrant ssh` from root of repository
