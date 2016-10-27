# php-sdk

Official PHP SDK for [ma-residence](https://www.ma-residence.fr)'s API.

# Get started

To use [ma-residence's API](https://github.com/ma-residence/api), you have to register your application. When registering your application, you will obtain a ***client_id*** and ***client_secret***. 
The ***client_id*** and ***client_secret*** will be necessary to use the API.

## Installation

Edit your `composer.json` :

```json
{
    "require": {
        "ma-residence/php-sdk": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:ma-residence/php-sdk.git",
            "no-api": true
        }
    ]
}
```

And don't forget to run:

    $ composer update

## Usage

To user the client, you need to instantiate a `Client` with your clientId, clientSecret of your application and host of the API.

```php
<?php

use MR\SDK\Client;

$host = 'https://api.ma-residence.fr/';
$clientId = 'CLIENT_ID';
$clientSecret = 'CLIENT_SECRET';

$mrClient = new Client($host, $clientId, $clientSecret);
```
By default, the `Client` will store tokens in the memory.
But if you need to implement a custom token storage, you can use `TokenStorageInterface` and assigned it to the `Client`.

```php
<?php

$storage = new MyTokenStorage();

$mrClient = new Client($host, $clientId, $clientSecret, $storage);
```

After you have initialized the class, you can login with an email and password :

```php
$mrClient->auth()->loginWithCredentials('developpeur@ma-residence.fr', 'password');
```

Or with an external token (after login with facebook for example) :

```php
$mrClient->auth()->loginWithExternalToken('facebook', 'FACEBOOK_ACCESS_TOKEN');
```

And if you want to logout to do some requests anonymously, do the following :

```php
$mrClient->auth()->logout();
```

## Endpoints

```php
$mrClient->myEndpoint()->foo();
```

Available endpoints:

 - Me
 - User
 - Groups
 - Associations
 - CityHalls
 - Categories

## Request

If you have to call an url which has no endpoint, you can still do your own request:

```php
// GET Request
$mrClient->request()->get('/foo', [
    'id' => $id
]);

// POST Request
$mrClient->request()->post('/foo', [], [
    'field_a' => 'A',
    'field_b' => 'B',
]);

// PUT Request
$mrClient->request()->put('/foo', [], [
    'field_a' => 'AA',
    'field_b' => 'BB',
]);

// PATCH Request
$mrClient->request()->patch('/foo', [], [
    'field_b' => 'C',
]);

// DELETE Request
$mrClient->request()->delete('/foo');
```

Each request returns a `Response` object.
