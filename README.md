WP Stack
=====

## First Installation

1) Clone the repo.
2) Go to dir with repo.
3) Run `build.sh` to build the app.
4) Start the app with `docker-compose up`.
5) Copy `www/wp-config-sample.php` to `www/wp-config.php`.
6) Copy  `.htaccess-sample` to `.htaccess`.
7) Open Adminer on http://wp-stack.localhost:81, login (root/pass) and create new database `wp-stack` (collation `utf8mb4_general_ci`).
8) Open http://wp-stack.localhost/wp-admin/install.php and finish installation.
9) Activate theme in administration

## Reinstallation

1) Clone the repo.
2) Go to dir with repo.
3) Run `build.sh` to build the app.
4) Start the app with `docker-compose up`.
5) Import your SQL dump to database and copy uploads folder to `www/wp-content/uploads`.
6) Inside `www` folder, copy `wp-config-sample.php` to `wp-config.php` and update DB and
   URL settings. Make sure that URL is the same both in DB and `wp-config.php`.
7) You are all set!
