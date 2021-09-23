module.exports = {
  '*.php': [
    'symfony php bin/php-cs-fixer fix --diff --config .php_cs.dist --ansi',
    'symfony php bin/phpcs --colors',
    'symfony php bin/phpstan.phar analyse  --no-progress --ansi',
  ],
};
