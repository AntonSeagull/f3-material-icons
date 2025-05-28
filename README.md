# f3-material-icons

A simple and efficient Material Icons plugin for [Fat-Free Framework (F3)](https://fatfreeframework.com/).

This plugin allows you to embed SVG icons directly in your F3 views using a simple `$f3->icon('name')` syntax and also provides a built-in browser to preview all available icons.

## 🚀 Installation

Install via Composer:

```bash
composer require antonchaikin/f3-material-icons
```

## 📦 Usage

### Register the Plugin

In your F3 bootstrap file (`index.php`):

```php
use F3MaterialIcons\MaterialIcons;

MaterialIcons::register();
```

### Get an Icon Inline

```php
echo $f3->icon('home'); // returns <svg>...</svg> content
```

Icons are looked up in the `/icons` directory located next to the plugin source.

### Browse All Icons

Add a route:

```php
$f3->route('GET /icons-browser', 'F3MaterialIcons\\MaterialIcons::browser');
```

Navigate to `/icons-browser` in your browser to preview all available icons.

## 🧠 Features

- ✅ Simple `$f3->icon('name')` integration
- 🔍 Visual icon browser (`/icons-browser`)
- ⚡ Fast inline rendering of SVGs
- 🗂️ Easy to extend or customize

## 🗂 Directory Structure

```
f3-material-icons/
├── src/
│   └── MaterialIcons.php
│   └── icons/
│       ├── home.svg
│       ├── settings.svg
│       └── ...
```

## 📝 License

MIT
