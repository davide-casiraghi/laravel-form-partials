# Laravel form partials

[![Latest Version on Packagist](https://img.shields.io/packagist/v/davide-casiraghi/laravel-form-partials.svg?style=flat-square)](https://packagist.org/packages/davide-casiraghi/laravel-form-partials)
[![StyleCI](https://styleci.io/repos/186799540/shield?style=flat-square)](https://styleci.io/repos/186799540)
[![Quality Score](https://img.shields.io/scrutinizer/g/davide-casiraghi/laravel-form-partials.svg?style=flat-square)](https://scrutinizer-ci.com/g/davide-casiraghi/laravel-form-partials)
[![Coverage Status](https://scrutinizer-ci.com/g/davide-casiraghi/laravel-form-partials/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/davide-casiraghi/laravel-form-partials/)
<a href="https://codeclimate.com/github/davide-casiraghi/laravel-form-partials/maintainability"><img src="https://api.codeclimate.com/v1/badges/c7f6bb5643740f377edb/maintainability" /></a>
[![GitHub last commit](https://img.shields.io/github/last-commit/davide-casiraghi/laravel-form-partials.svg)](https://github.com/davide-casiraghi/laravel-form-partials) 

A collection of partials Blade views for Bootstrap 4 forms controls.

**Available controls**
- Input
- Input Hidden
- Input Readonly
- Select
- Checkbox
- Datepicker
- Timepicker
- Textarea (with WYSWYG editor)
- Textarea plain
- Password
- Upload image
- Alert (to show an bootstrap alert)

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

**for a create view**
``` php
@include('laravel-form-partials::input', [
    'title' => __('views.title'),
    'name' => 'title',
    'placeholder' => 'Post title',
    'value' => old('title'),
    'required' => true,
])
```

**for an edit view**
``` php
@include('laravel-form-partials::input', [
    'title' => __('views.title'),
    'name' => 'title',
    'placeholder' => 'Post title',
    'value' => $post->title,
    'required' => true,
])
```

### Upload file

**for a create view**
``` php
@include('laravel-form-partials::upload-image', [
   'title' => 'Card image', 
   'name' => 'image_file_name',
   'folder' => 'cards',
   'value' => '',
   'required' => false,
])
```

**for an edit view**
``` php
@include('laravel-form-partials::upload-image', [
   'title' => 'Card image', 
   'name' => 'image_file_name',
   'folder' => 'cards',
   'value' => $card->image_file_name,
   'required' => false,
])
```

**In the controller store method**
``` php
use DavideCasiraghi\LaravelFormPartials\Facades\LaravelFormPartials;
...
$card->image_file_name = LaravelFormPartials::uploadImageOnServer($request->file('image_file_name'), $request->image_file_name, $imageSubdir, $imageWidth, $thumbWidth);
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
