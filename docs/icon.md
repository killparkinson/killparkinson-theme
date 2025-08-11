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
<button class="btn icon-start btn-outline-secondary">
  <svg class="icon">
    <use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-left" />
  </svg>
  
  Button
</button>
```

### Example: icon on the end of a button

```html
<button class="btn icon-end btn-outline-secondary">
  Button

  <svg class="icon">
    <use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-right" />
  </svg>
</button>
```

### Example: icon on the start and end of a button

```html
<button class="btn icon-start icon-end btn-outline-secondary">
  <svg class="icon">
    <use href="/wp-content/themes/kp-theme/assets/fonts/icon.svg#chevron-left" />
  </svg>

  Button

  <svg class="icon">
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

# Using icons in CSS

When using icons in CSS, there is a known issue with using the Feather icon SVG sprite directly. It is recommended to use an [encoded SVG](https://yoksel.github.io/url-encoder/) of the desired icon instead.

> [!WARNING] 
> It is recommended to use the [SVG directly](#basic-usage)

## Encoded SVG Example

Here is an example of how to use an encoded SVG in CSS:

```css
.icon-circle::after {
  content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
}
```

```html
<span class="icon-css icon-circle"></span>
```

## Adding icons to WordPress `wp:button` pattern

The system supports adding icons to buttons by using special class names on the button block wrapper:

- `icon-start-{icon-name}` – Adds an icon **before** the button text.
- `icon-end-{icon-name}` – Adds an icon **after** the button text.

These classes are parsed and the corresponding SVG icons are injected into the button’s anchor (`<a>`) tag automatically.

---

### Supported icon positions

| Class Format              | Description                        |
|---------------------------|------------------------------------|
| `icon-start-{name}`       | Places the icon before the text    |
| `icon-end-{name}`         | Places the icon after the text     |

Multiple icons are supported. For example:

```html
<!-- Will show download icon at start and external link icon at end -->
class="icon-start-download icon-end-external-link"
```

---

### Example usage

#### Input 


##### Block editor additional CSS Classes:

```text
icon-start-envelope icon-end-arrow-right
```

##### Block pattern

```html
<!-- wp:buttons -->
<div class="wp-block-buttons">
  <!-- wp:button -->
  <div class="wp-block-button icon-start-envelope icon-end-arrow-right">
    <a class="wp-block-button__link wp-element-button" href="/blog">
      View all
    </a>
  </div>
  <!-- /wp:button -->
</div>
<!-- /wp:buttons -->
 ```

#### Output (rendered HTML):

```html
<a class="wp-block-button__link icon-start icon-end" href="#">
  <svg>...</svg> <!-- envelope icon -->
  Contact Us
  <svg>...</svg> <!-- arrow-right icon -->
</a>
```
