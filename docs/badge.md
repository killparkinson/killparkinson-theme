# Creating Badges

Bootstrap provides utility classes to create styled badges. Below is a guide on how to create badges using Bootstrap's utility classes.

## Primary Badge

To create a primary badge, use the following HTML:

```html
<span class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis border border-primary">Primary badge</span>
```

This creates a badge with a subtle primary background, a primary border, and primary emphasis text.

## Primary Badge Link

To create a primary badge that functions as a link, use the following HTML:

```html
<a href="#" class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis text-decoration-none border border-primary">Primary badge link</a>
```

This creates a clickable badge with the same styling as the primary badge, but with no underline (due to `text-decoration-none`).

## Other Badge Variations

Bootstrap also provides badges for other colors. Here are examples of how to create them:

- **Secondary badge**:
  ```html
  <span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis border border-secondary">Secondary badge</span>
  ```

- **Info badge**:
  ```html
  <span class="badge bg-info-subtle border border-info-subtle text-info-emphasis border border-info">Info badge</span>
  ```

- **Warning badge**:
  ```html
  <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis border border-warning">Warning badge</span>
  ```

- **Danger badge**:
  ```html
  <span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis border border-danger">Danger badge</span>
  ```

- **Light badge**:
  ```html
  <span class="badge bg-light-subtle border border-light-subtle text-light-emphasis border border-light">Light badge</span>
  ```

- **Dark badge**:
  ```html
  <span class="badge bg-dark-subtle border border-dark-subtle text-dark-emphasis border border-dark">Dark badge</span>
  ```

## Notes

- The `bg-*-subtle` classes provide a subtle background color.
- The `border-*-subtle` classes add a subtle border around the badge.
- The `text-*-emphasis` classes ensure the text is readable against the background.
- For links, use the `text-decoration-none` class to remove the underline.
