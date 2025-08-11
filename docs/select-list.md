
# Select list

---

To create a dropdown menu that mimics a select list, use the following HTML:

```html
<div class="dropdown">
  <button class="btn btn-outline-secondary rounded-3 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item active" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
```

### Explanation

- `btn btn-outline-secondary`: Applies an outline secondary button style to the dropdown toggle, which is typically used for select list styles.
- `rounded-3`: Adds rounded corners to the button, giving it a more modern appearance.
- The rest of the classes are the same as in the regular dropdown example.
