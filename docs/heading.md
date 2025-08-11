# Using Headings in the Design System

The design system includes various sizes for headings, and it is important to use font utilities to ensure consistency with the design while maintaining correct WCAG heading level orders.

## Font Sizes

To control the size of headings, you can use the font size utilities provided by Bootstrap. These utilities allow you to set different text sizes for your headings.

[Bootstrap font sizes](https://getbootstrap.com/docs/5.3/utilities/text/#font-size)

### Example
```html
<h1 class="fs-1">Heading 1</h1>
<h2 class="fs-2">Heading 2</h2>
<h3 class="fs-3">Heading 3</h3>
<h4 class="fs-4">Heading 4</h4>
<h5 class="fs-5">Heading 5</h5>
<h6 class="fs-6">Heading 6</h6>
```

[Bootstrap heading](https://getbootstrap.com/docs/5.3/content/typography/#headings)

### Example
```html
<h1 class="h1">Heading 1</h1>
<h2 class="h2">Heading 2</h2>
<h3 class="h3">Heading 3</h3>
<h4 class="h4">Heading 4</h4>
<h5 class="h5">Heading 5</h5>
<h6 class="h6">Heading 6</h6>
```

## Font Weight and Italics

You can also use font weight and italics utilities to adjust the appearance of your headings.

[Bootstrap heading](https://getbootstrap.com/docs/5.3/utilities/text/#font-weight-and-italics)

### Example
```html
<h2 class="fw-bold">Bold Heading</h2>
<h3 class="text-italic">Italicized Heading</h3>
```

## Display Headings

Bootstrap provides specific classes for display headings, which are larger and more prominent than regular headings.

[Bootstrap heading](https://getbootstrap.com/docs/5.3/content/typography/#display-headings)

### Example
```html
<h1 class="display-1">Display 1</h1>
<h2 class="display-2">Display 2</h2>
<h3 class="display-3">Display 3</h3>
<h4 class="display-4">Display 4</h4>
<h5 class="display-5">Display 5</h5>
<h6 class="display-6">Display 6</h6>
```

## Colour Last Word

The system provides a utility class that replaces the last word of a heading with a primary colour. This is useful for visual emphasis.

### Example
```html
<h2 class="colour-last-word">Hello World</h2>
```

This will render:

```html
<h2>Hello <span class="text-primary">World</span></h2>
```