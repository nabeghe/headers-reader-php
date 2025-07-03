# Headers Reader for PHP

> A simple way to read headers from the `getallheaders` function in PHP.

## 🫡 Usage

### 🚀 Installation

You can install the package via composer:

```bash
composer require nabeghe/headers-reader
```

### Example 1 - Main Class

```php
use Nabeghe\HeadersReader\Headers;

echo 'X-Custom-1: '.Headers::get('X-Custom-1', 'The default value for X-Custom-1')."\n<br>";
echo 'X-Custom-2: '.Headers::get('X-Custom-2', 'The default value for X-Custom-2')."\n<br>";
echo 'X-Custom-3: '.Headers::get('X-Custom-3', 'The default value for X-Custom-3')."\n<br>";
echo 'X-Custom-4: '.Headers::get('X-Custom-4', 'The default value for X-Custom-4')."\n<br>";
echo 'X-Custom-5: '.Headers::get('X-Custom-4')."\n<br><br>"; // Default value is blank.

print_r(Headers::all()); // Returns all headers.

Headers::flush(); // Clears the cache.
```

### Example 1 - Custom Class

```php
use Nabeghe\HeadersReader\Headers;

class MyHeaders extends Headers
{
    public const DEFAULT = 'The general default value';

    public const DEFAULTS = [
        'X-Custom-1' => 'The default value for X-Custom-1',
        'X-Custom-2' => 'The default value for X-Custom-2',
        'X-Custom-3' => 'The default value for X-Custom-3',
        'X-Custom-4' => 'The default value for X-Custom-4',
    ];
}

echo 'X-Custom-1: '.MyHeaders::get('X-Custom-1')."\n<br>";
echo 'X-Custom-2: '.MyHeaders::get('X-Custom-2')."\n<br>";
echo 'X-Custom-3: '.MyHeaders::get('X-Custom-3')."\n<br>";
echo 'X-Custom-4: '.MyHeaders::get('X-Custom-4')."\n<br>";
echo 'X-Custom-5: '.MyHeaders::get('X-Custom-5')."\n<br>";
```

## 📖 License

Licensed under the MIT license, see [LICENSE.md](LICENSE.md) for details.