## Rift: Teaching Application Security

### Requirements

You'll need the following to run the Rift application

- At least PHP 5.5 installed locally (and potentially in Apache)
- SQLite support
- An open mind, ready to learn about web application security!

### Setup

You can either use the included setup script:

```
./setup.sh
```

or you can perform the same steps manually:

```
chmod -R 777 data/
/usr/bin/sqlite3 data/rift.db < init.sql
```

You'll also need to install the dependencies with [Composer](https://getcomposer.org) so from the root directory run:

```
composer install
```

You'll need to already have Composer setup to run this. The Composer site has a great install guide for that.

### Starting it up

You can start up the application in two different ways. You can either use the built-in PHP web server:

```
cd public
php -S localhost:81111
```

or you can set up a `VirtualHost` in Apache pointing it to the `public/` directory (with your own paths
substituted in of course):

```
<VirtualHost *:80>
	ServerName phparch.localhost
	DocumentRoot /var/www/phparch/public
	ErrorLog "/var/log/www/phparch-error_log"
</VirtualHost>
```

and add it to your `/etc/hosts`:

```
192.168.0.1     phparch.localhost
```

### Lessons

Each of the lessons in Rift can be found under the "Exercises" option in the menubar at the top of the site. Topics currently covered are:

- Cookie security
- Remember Me handling
- Forgot Password
- File Uploads
- Password Hashing
- Rate Limiting
- Cross-Site Scripting (XSS)
- SQL Injection (SQLi)
- Cross-Site Request Forgery (CSRF)
- Direct Object Reference
- Remote File Include (RFI)
- Local File Injection (LFI)
- Open Redirect

### Tips

1. If you get database errors, be sure you've created the database with the `sqlite3` command above.
2. Be sure the `data/rift.db` file can be written to by the web server user
3. If you don't already have Composer, you can get it from https://getcomposer.org
