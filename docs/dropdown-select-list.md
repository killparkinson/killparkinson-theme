# Dropdowns and select lists

---

## Regular dropdown menu

To create a regular dropdown menu, use the following HTML structure:

```html
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
```

### Explanation

- `dropdown`: A container class that wraps the dropdown button and menu.
- `btn btn-primary`: Applies a primary button style to the dropdown toggle.
- `dropdown-toggle`: Enables the button to act as a dropdown toggler.
- `data-bs-toggle="dropdown"`: Triggers the dropdown when clicked.
- `aria-expanded="false"`: Indicates that the dropdown is not expanded by default.
- `dropdown-menu`: A class for the unordered list that contains the dropdown items.
- `dropdown-item`: Applies styling to each item in the dropdown menu.

---

## Main menu dropdown with ghost modifier

To create a main menu dropdown using the ghost modifier, use the following HTML:

```html
<div class="dropdown">
  <button class="btn btn-ghost-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
```

### Explanation

- `btn btn-ghost-secondary`: Applies a ghost secondary button style to the dropdown toggle, which is typically used for main menu items.
- The rest of the classes are the same as in the regular dropdown example.

---

## Dropdown menu for select lists

To create a dropdown menu that mimics a select list, use the following HTML:

```html
<div class="dropdown">
  <button class="btn btn-outline-secondary rounded-3 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
```

### Explanation

- `btn btn-outline-secondary`: Applies an outline secondary button style to the dropdown toggle, which is typically used for select list styles.
- `rounded-3`: Adds rounded corners to the button, giving it a more modern appearance.
- The rest of the classes are the same as in the regular dropdown example.


