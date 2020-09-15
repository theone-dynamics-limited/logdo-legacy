<a name="section-1"></a>
## Introduction

There are currently two supported first party SDK for `php` and `Laravel` that you can use if you are in the php world. But worry not if you are not becuase our API has got you covered.

<a name="section-2"></a>
## API

We currently expose and API for sending logs to the `logdo` logging server. Here is it's definition.
##
#### Base backend url
Note: that this url `MUST NOT` end with a trailing `/`

For self hosted servers, this would be the server base url. For those that are using the Logdo cloud at `https://logdo.dev`, that would be the base url. We encourage you to use the cloud and this takes the server setup overhead from you and it also helps us keep the project alive.
##
#### Request uri
For logging, this is the uri. Others will be added as they come.

`POST` /api/v1/logs/log-it
##
#### Headers
The bearer token can be generated from your profile in the logdo server with it's proper authorization.
```json
Authorization:Bearer Token
Content-Type:application/json
Accept:application/json
```
##
#### Body
The `appId` is your logdo applications id. This is always visible from your logdo applications tab.

```json
{
    "appId":"2f725873e5415ce874dceddfe50a70f5",
    "logLevel":"error",
    "log":"Three [2020-09-12 21:39:00] production.INFO: array ('isNewMember' => 'True')"
}
```

## SDKs
These are the currently supported first party SDKs
### Php
The recommended way to install the SDK is through
[Composer](https://getcomposer.org/). Note that the SDK requires 
```php
"php":">=7.2",
"guzzlehttp/guzzle": "^7.0"
```

Seriously, because why not? php 5.6 is so 2016. I was't even writing php back then!

```php
composer require logdo/logdo-php
```
#### Usage
```php
<?php
require('vendor/autoload.php');

use Logdo\Logdo;

$appId = "---YOUR APP ID HERE---";
$apiToken = "---YOUR API KEY HERE---";

$logdo = Logdo::createInstance($apiToken, $appId)
    ->log('Some log')
    ->to('https://logdo.dev')
    ->as(Logdo::INFO);

if (!$logdo->wasSuccessful()) {
    // Do some failure handling
    die($logdo->getErrorMessage());
}

// Do some success handling
echo "Successfuly logged!";
```
### Laravel
The recommended way to install the SDK is through
[Composer](https://getcomposer.org/). Note that the SDK requires 
```php
"php":">=7.2",
"logdo/logdo-php": "dev-master"
```

Seriously, because why not? php5.6 is so 2016. I was't even writing php back then!

```bash
composer require logdo/logdo-laravel
```

Publish the config file
```bash
php artisan vendor:publish --tag=config
```

The config `logdo.php` will be published into your config/ directory. We encourage you to take a look at it and make the necessary adjustments.

#### Usage
It takes care of itself. Thanks to Laravels excellent Package discovery feature and event system.

## Credit
This is heavily inspire by Laravel Telecope. Credit to Taylor Otwell and Muhamed Said for putting together such a wonderful package.

## Contributing an SDK

To create an SDK, please create a package for your favourite language or framework that wraps the API and share it for its inclusion as a first party SDK.