#!/bin/sh

composer() {
    docker-compose exec --user 33 app composer "$@"
}

npm() {
    docker-compose exec --user 33 app npm "$@"
}

artisan() {
    docker-compose exec --user 33 app php artisan "$@"
}

phpcs() {
    docker-compose exec --user 33 app ./vendor/bin/phpcs --standard="PSR2" app "$@"
}

phpcbf() {
    docker-compose exec --user 33 app ./vendor/bin/phpcbf --standard="PSR2" app "$@"
}

"$@"
