# Default env
ENV = dev
COMPOSER_OPTION =

prepare: composer-install

phpunit:
	vendor/bin/phpunit --colors --verbose

composer-install:
	composer install --ansi --no-interaction $(COMPOSER_OPTION) || true

composer-update:
	composer update --ansi --no-interaction $(COMPOSER_OPTION) || true

cs:
	vendor/bin/php-cs-fixer fix src --verbose --diff --rules=@Symfony,object_operator_without_whitespace,-yoda_style || true
	vendor/bin/php-cs-fixer fix tests --verbose --diff --rules=@Symfony,object_operator_without_whitespace,-yoda_style || true
