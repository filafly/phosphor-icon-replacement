<p align="center">
    <img src="https://filafly.com/images/phosphor-icon-replacement.webp" alt="Banner" style="width: 100%; max-width: 800px;" />
</p>

Tired of Heroicons? Quickly swap out all icons used by the Filament framework with [Phosphor icons](https://phosphoricons.com). Include support for 6 different icon styles.

## Requirements
- PHP 8.1+
- Filament v3.2+

## Installation

There are only two steps to install Phosphor Icon Replacement. First, you need to install the package via composer:

```bash
composer require filafly/phosphor-icon-replacement
```

Secondly, add the plugin to any panels you wish:

```php
    ->plugin(\Filafly\PhosphorIconReplacement::make())
```

## Styles
All 6 Phosphor icon styles are available and can be used by simply calling the style name as a method on the plugin:
```bash
PhosphorIconReplacement::make()->thin()
PhosphorIconReplacement::make()->light()
PhosphorIconReplacement::make()->regular()
PhosphorIconReplacement::make()->bold()
PhosphorIconReplacement::make()->fill()
PhosphorIconReplacement::make()->duotone()
```

If no style is explicitly chosen, regular will be used.

## License
The MIT License (MIT). Please see [License](LICENSE.md) for more information.