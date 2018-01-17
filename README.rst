Silex
=====

Commandes doctrine
----------------------------

php vendor\doctrine\orm\bin\doctrine orm:schema-tool:update --dump-sql --force
php bin/console orm:schema-tool:create --dump-sql --force

create database schema :
php bin/console orm:schema-tool:create

update database schema :
php bin/console orm:schema-tool:update --force
