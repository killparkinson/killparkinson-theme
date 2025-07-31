# Icons

The theme uses the [Feather icon SVG sprite](https://feathericons.com). To use icons, replace `#name` with the desired icon name from the Feather Icons list.

## Basic usage

To include an icon in your HTML, use the following structure:

```html
<svg class="icon">
  <use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#circle" />
</svg>
```

Replace `circle` with any valid icon name from [feathericons.com](https://feathericons.com).

## Button icon position modifiers

You can position icons on buttons using the classes `icon-start` and `icon-end`.

### Example: icon on the start of a button

```html
<button class="btn btn-outline-secondary">
  <svg class="icon icon-start">
    <use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-left" />
  </svg>
  Button
</button>
```

### Example: icon on the end of a button

```html
<button class="btn btn-outline-secondary">
  Button
  <svg class="icon icon-end">
    <use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-right" />
  </svg>
</button>
```

## PHP icon helper function

The theme provides a PHP helper function called `icon()` located in `function.php`. This function simplifies the process of generating SVG icon elements.

### Usage example

```php
icon('circle')
```

This will generate an SVG element with the `circle` icon. You can also specify the position:

```php
icon('chevron-left', 'start')
icon('chevron-right', 'end')
```

# Using icons in CSS

When using icons in CSS, there is a known issue with using the Feather icon SVG sprite directly. It is recommended to use an [encoded SVG](https://yoksel.github.io/url-encoder/) of the desired icon instead.

> [!WARNING] 
> It is recommended to use the [SVG directly](#basic-usage)

## Encoded SVG Example

Here is an example of how to use an encoded SVG in CSS:

```css
.circle-icon::after {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
}
```

```html
<span class="icon-css circle-icon"></span>
```