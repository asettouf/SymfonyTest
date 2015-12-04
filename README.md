symfony_test
============

A Symfony project created on November 10, 2015, 2:39 pm.

After downloading the project from github, run: composer update



## Side notes when deploying to heroku

- If some classes are missing, check *composer require XX* (see: https://discussion.heroku.com/t/symfony2-deployment-problem/664/8)
- Don't forget to set Symfony env var to prod: *heroku config:set SYMFONY_ENV=prod*
- Check bin dir for procfile with: *composer config bin-dir*, then *echo "web: bin/heroku-php-apache2 web/" > Procfile*
(if bin is the output of *composer config bin-dir*)
