# php-sdk

Official PHP sdk for [ma-residence](http://www.ma-residence.fr) API.

# Get started

To use the MR API you have to register your application. After you've a client_id and client_secret, you can use the API.

## Installation

Edit your `composer.json` :

```json
{
    "require": {
        "ma-residence/mr-sdk-php": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:ma-residence/mr-sdk-php.git"
        }
    ]
}
```

And don't forget to run:

    $ composer update

## Usage

```php
<?php

use MR\MRClient;

$host = 'http://api.ma-residence.fr/';
$clientId = 'CLIENT_ID';
$clientSecret = 'CLIENT_SECRET';

$mrClient = new MRClient($host, $clientId, $clientSecret);
```

After you have initialized the class you can login with an email and password:

```php
$mrClient->auth()->loginWithCredentials('laurent.brieu@gmail.com', 'password');
```

Or with an external token (after login with facebook for example):

```php
$mrClient->auth()->loginWithExternalToken('facebook', 'FACEBOOK_ACCESS_TOKEN');
```

And if you want to logout to do some requests anonymously:

```php
$mrClient->auth()->logout()
```

## Endpoints

```php
$mrClient->myEndpoint()->foo()
```

Available endpoints:

 - NONE
