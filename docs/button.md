# Buttons

This documentation explains how to create button components based on [Figma button variants](https://www.figma.com/design/KQJOUq4sxS9Iu8KBqcfJns/%F0%9F%92%A0-KiPa-Design-System-WIP?node-id=8636-55579&m=dev). The following classes are used to style buttons according to their visual appearance and function.

## Button variants and class names

| Figma variant         | Class name                          |
|----------------------|-------------------------------------|
| Primary              | `btn-primary`                       |
| Ghost color          | `btn-ghost-primary`                 |
| Secondary            | `btn-secondary`                     |
| Ghost subtle         | `btn-ghost-secondary`               |
| Tertiary             | `btn-outline-secondary`             |

- **Mini version**: Buttons with the class `btn-sm` are considered "mini" versions.
- **Ghost modifiers**: Buttons with classes like `btn-ghost-primary` or `btn-ghost-secondary` do not have borders, making them appear as if they are transparent or subtle.
- **Unused variants**: Variants such as info, warning, danger, dark, and light are present in Figma but are not currently used in the design system.

## Example usage

### Primary button
```html
<button class="btn btn-primary">Primary button</button>
```

### Ghost primary button
```html
<button class="btn btn-ghost-primary">Ghost primary button</button>
```

### Secondary button
```html
<button class="btn btn-secondary">Secondary button</button>
```

### Ghost subtle button
```html
<button class="btn btn-ghost-secondary">Ghost subtle button</button>
```

### Tertiary button
```html
<button class="btn btn-outline-secondary">Tertiary button</button>
```

### Mini primary button
```html
<button class="btn btn-primary btn-sm">Mini primary button</button>
```

## Adding Button Variations

### 1. Using the Block Editor

1. **Add a Button Block**
   - In the block editor, add a new Button block
   - Select your button text

2. **Access Advanced Settings**
   - In the right sidebar, click the "Advanced" panel
   - Find the "Additional CSS class(es)" field

3. **Add CSS Classes**
   ```
   btn-primary btn-lg
   ```

### 2. Direct Pattern Code Editing

You can also add classes directly in your pattern code:

```html
<!-- wp:button {"className":"btn-primary btn-lg"} -->
<div class="wp-block-button btn-primary btn-lg">
    <a class="wp-block-button__link">Primary Button</a>
</div>
<!-- /wp:button -->
```

### 3. Multiple Button Examples

**Primary Button:**
```html
<!-- wp:button {"className":"btn-primary"} -->
<div class="wp-block-button btn-primary">
    <a class="wp-block-button__link">Primary Button</a>
</div>
<!-- /wp:button -->
```

**Large Secondary Button:**
```html
<!-- wp:button {"className":"btn-secondary btn-lg"} -->
<div class="wp-block-button btn-secondary btn-lg">
    <a class="wp-block-button__link">Large Secondary</a>
</div>
<!-- /wp:button -->
```

**Small Outline Button:**
```html
<!-- wp:button {"className":"btn-outline-primary btn-sm"} -->
<div class="wp-block-button btn-outline-primary btn-sm">
    <a class="wp-block-button__link">Small Outline</a>
</div>
<!-- /wp:button -->
```

### 4. Button Group Example

Create a group of buttons with different variations:

```html
<!-- wp:buttons -->
<div class="wp-block-buttons">
    <!-- wp:button {"className":"btn-primary"} -->
    <div class="wp-block-button btn-primary">
        <a class="wp-block-button__link">Save</a>
    </div>
    <!-- /wp:button -->
    
    <!-- wp:button {"className":"btn-outline-secondary"} -->
    <div class="wp-block-button btn-outline-secondary">
        <a class="wp-block-button__link">Cancel</a>
    </div>
    <!-- /wp:button -->
</div>
<!-- /wp:buttons -->
```
