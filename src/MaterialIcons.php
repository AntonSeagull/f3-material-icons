<?php

namespace F3MaterialIcons;

use Base;

/**
 * F3MaterialIcons
 *
 * A simple class to manage Material Icons in Fat-Free Framework.
 *
 * @package F3MaterialIcons
 * @version 1.0.0
 * @license MIT
 */
class MaterialIcons
{
    public static function register(): void
    {
        $f3 = Base::instance();
        $f3->set('icon', fn(?string $name) => self::getIcon($name));
    }

    public static function browser(): void
    {
        $dir = __DIR__ . '/icons';
        $icons = [];

        foreach (scandir($dir) as $file) {
            if (str_ends_with($file, '.svg')) {
                $icons[] = [
                    'name' => pathinfo($file, PATHINFO_FILENAME),
                    'svg' => file_get_contents($dir . '/' . $file),
                ];
            }
        }

        echo '<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Material Icons Browser</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <div class="row g-3">';

        foreach ($icons as $icon) {
            echo '<div class="col-2">
            <div class="card text-center p-2">
              <div class="card-body p-2" style="height:64px; width:64px;">' . $icon['svg'] . '</div>
              <small class="text-muted" style="font-size:12px;">' . htmlspecialchars($icon['name']) . '</small>
            </div>
          </div>';
        }

        echo '</div></div></body></html>';
    }


    public static function getIcon(?string $name): ?string
    {

        $name = trim($name);

        $directory = __DIR__ . '/icons';

        $file = $directory . '/' . $name . '.svg';

        return file_exists($file) ? file_get_contents($file) : null;
    }
}

/**
 * @method string|null icon(?string $name)
 */
interface MaterialIconAwareF3 {}
