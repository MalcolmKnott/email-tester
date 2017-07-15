# Send test email using Laravel Artisan command

This composer package lets you easily send test email with a Laravel Artisan command.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require malcolmknott/emailtester
```

Next, if using Laravel 5, include the service provider within your `config/app.php` file.

```php
'providers' => [
    Malcolmknott\Emailtester\EmailtesterServiceProvider::class,
];
```

## Configuration

You will need to update the mail settings in your .env file before you can send email.

Optional, publish the config file to update max sends per command, the default max is 10 per command.
The last parameter of the artisan command is how many email to send.

```bash
php artisan vendor:publish --provider="Malcolmknott\Emailtester\EmailtesterServiceProvider" --tag="config"
```

## Usage

Artisan command

```bash
php artisan send-email example@example.com 1
```

Scheduled Job

```php
$schedule->command('send-email example@example.com 1')->twiceDaily(9, 21);
```

## Email Template

Publish the view file to add your own message.

```bash
php artisan vendor:publish --provider="Malcolmknott\Emailtester\EmailtesterServiceProvider" --tag="views"
```