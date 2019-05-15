# Laravel form partials

[![Latest Version on Packagist](https://img.shields.io/packagist/v/davide-casiraghi/laravel-form-partials.svg?style=flat-square)](https://packagist.org/packages/davide-casiraghi/laravel-form-partials)
[![Build Status](https://img.shields.io/travis/davide-casiraghi/laravel-form-partials/master.svg?style=flat-square)](https://travis-ci.org/davide-casiraghi/laravel-form-partials)
[![Quality Score](https://img.shields.io/scrutinizer/g/davide-casiraghi/laravel-form-partials.svg?style=flat-square)](https://scrutinizer-ci.com/g/davide-casiraghi/laravel-form-partials)
[![Total Downloads](https://img.shields.io/packagist/dt/davide-casiraghi/laravel-form-partials.svg?style=flat-square)](https://packagist.org/packages/davide-casiraghi/laravel-form-partials)

A collection of partials Blade views for Bootstrap 4 forms controls.

## Installation

You can install the package via composer:

```bash
composer require davide-casiraghi/laravel-form-partials
```

### Publish all the vendor files
```php artisan vendor:publish --force```
Then select the number that correspont to the package.

## Usage

The partials can be included in any blade view in this way:
``` php
@include('laravel-form-partials::input', [
    'title' => __('views.title'),
    'name' => 'title',
    'placeholder' => 'Post title',
    'value' => old('title')
])
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email davide.casiraghi@gmail.com instead of using the issue tracker.

## Credits

- [Davide Casiraghi](https://github.com/davide-casiraghi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
