#!/bin/bash
echo -e '\n';
echo "-----------------------------------------";
echo -e '\n';
date
echo -e '\n';
git pull ;
cd MyTeamMate;
php app/console doctrine:schema:update --complete --force;
php app/console cache:clear --env=prod ;
php app/console assets:install web --symlink ;
