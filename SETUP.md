## Setup instructions

In order to setup this project on your local environment, read this guide!


## Requirements

- [Docker](https://store.docker.com/search?type=edition&offering=community)
- [Docker Compose](https://docs.docker.com/compose/install/) (Usually included with Docker)
- [npm](https://npmjs.com/)

## Getting started


### Containers

Development on this project uses Docker. [Read more about Docker](https://www.docker.com/).

**To start containers**, simply run:

`$ docker-compose up -d`

The `-d` flag will run the containers as a daemon in the background.

**To stop**:

`$ docker-compose stop`


## Composer

Dependencies are managed through composer.

`$ ./dev.sh composer install`

If you got composer installed locally, you may use it in the laravel directory.

## NPM

Assets are managed through node package manager (npm).

`$ ./dev.sh npm install`

If you got npm installed locally, you may use it in the laravel directory.

## Artisan

Artisan is a CLI tool to help with common Laravel tasks. 

`$ ./dev.sh artisan`

## Initial Setup

To install neccesary development tools and first instance of website, run the
suitable commands:

> docker-compose up -d --build && ./dev.sh composer install

To generate the assets you may use npm through the dev script:

> ./dev npm run prod"

To setup the database structure and generate an application key, run this:

> ./dev.sh artisan migrate && ./dev.sh artisan key:generate


Now all you need is to fill the database with some swears.

> ./dev.sh artisan db:seed

You can now see the project at http://localhost/ .


## Other

**Notice** Having the packages installed locally, as npm, php and composer, you 
can simply cd into the src folder and run the commands like usual.

> composer install && php artisan serve

> npm install && npm run prod


However, do notice that if you have another version of PHP, npm, or composer  
then differences may appear throughout the project. Therefore recommended to use  
the dev script, if unsure.
