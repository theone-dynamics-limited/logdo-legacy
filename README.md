![Logdo](.github/screen-one.png?raw=true)
## Logdo

Logdo is a self hosted application logging server that brings back the fun in reading logs.

- Simple interface for viewing logs
- App based logging setup
- Members can join teams and have access to teams' apps logs.
- Clean APIs and SDKs...

... and many more ....

## Usage
It takes care of itself. Thanks to Laravels excellent Package discovery feature and event system.

## Help and docs

We use GitHub issues only to discuss bugs and new features. For support please refer to:

- [Documentation](http://logdo.dev/docs)


## Installing Logdo app

The recommended that you have composer installed.
[Composer](https://getcomposer.org/). Note that the server requires.
For more server requirements, please refer to the official laravel documentation at
[Laravel docs](https://laravel.com/docs/8.x#installing-laravel)
```php
"php":">=7.3"
```
Seriously, because why not? php5.6 is so 2016. I was't even writing php back then!

Then follow the steps below.
1 - Git clone the repository 
2 - Install the dependencies using composer
3 - Set up a database, run the migrations
4 - Start the websocket server `php artisan websockets:serve`
5 - Server the application `php artisan serve`.

LOGGING party!

## Credit

This is heavily inspire by Laravel Telecope. Credit to Taylor Otwell and Muhamed Said for putting together such a wonderful package.

## Contributing

Contributions are welcome in any form.

## More screens

![Logdo](.github/screen-two.png?raw=true)
![Logdo](.github/screen-three.png?raw=true)
![Logdo](.github/screen-four.png?raw=true)
![Logdo](.github/screen-five.png?raw=true)
![Logdo](.github/screen-six.png?raw=true)