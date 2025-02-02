<p class="filament-hidden" align="center">
    <img src="images/filafly-phosphor-icon-replacement.jpg" alt="Banner" style="width: 100%; max-width: 800px;" />
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

## Screenshots
![Compare icon sets](images/phosphor-icon-replacement-examples.jpg?raw=true "Compare icon sets")

## Usage
### Setting a default style
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

### Override Specific Icons
If you need to override certain icons to use a different style, you can use either icon aliases or direct icon names.

#### Using Icon Aliases
Use the `overrideStyleForAlias` method with a [Filament Icon Alias](https://filamentphp.com/docs/3.x/support/icons#available-icon-aliases). This method works with either a single icon key (string) or multiple icon keys (array).

```php
// Override a single icon key
PhosphorIconReplacement::overrideStyleForAlias('tables::actions.filter', 'thin');

// Override multiple icon keys at once
PhosphorIconReplacement::overrideStyleForAlias([
    'tables::actions.filter',
    'actions::delete-action',
], 'thin');
```

#### Using Icon Names
Use the `overrideStyleForIcon` method with the actual Phosphor icon name. Like the alias method, this works with either a single icon name or multiple names.

```php
// Override a single icon
PhosphorIconReplacement::overrideStyleForIcon('phosphor-user', 'thin');

// Override multiple icons at once
PhosphorIconReplacement::overrideStyleForIcon([
    'phosphor-user',
    'phosphor-caret-up',
    'phosphor-bell',
], 'thin');
```

## License
The MIT License (MIT). Please see [License](LICENSE.md) for more information.