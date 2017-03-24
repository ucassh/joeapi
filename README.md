## Synopsis

Unofficial joemonster.org API. At the moment it's read only, but I hope so that future will bring ability to writing.

## Code Example

Open JoeMonster session and browse basic description of `taksobietestuje` profile:
```
$joe = new \Joe\Monster('login', 'password');
$user = $joe->user('taksobietestuje');
$user->about()->getHelloMessage()
```

## Installation

`composer require ucassh/joeapi dev-master`

## Tests

First run `composer install`, and then `vendor/bin/phpunit` 

## License

MIT