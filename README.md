## Synopsis


## Code Example

Open JoeMonster session and browse basic description of `taksobietestuje` profile:
```
$joe = new \Joe\Monster('login', 'password');
$user = $joe->user('taksobietestuje');
$user->about()->getBasicInfo()
```

## Installation

`composer require ucassh/joeapi dev-master`

## Tests

First run `composer install`, and then `vendor/bin/phpunit` 

## License

MIT