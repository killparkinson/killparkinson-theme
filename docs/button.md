# Buttons

This documentation explains how to create button components based on (Figma button variants)[https://www.figma.com/design/KQJOUq4sxS9Iu8KBqcfJns/%F0%9F%92%A0-KiPa-Design-System-WIP?node-id=8636-55579&m=dev]. The following classes are used to style buttons according to their visual appearance and function.

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