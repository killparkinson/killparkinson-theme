# Menu items with icon support

## Overview

This plugin enhances the WordPress menu system by allowing users to add icons to menu items. Icons can be selected and styled directly within the WordPress Menu Editor.

> **Video Tutorial**: [How to add icons to menu items](https://www.youtube.com/watch?v=YcSotWXIczI)

---

## Step-by-step usage

### 1. Access the menu editor
- Navigate to **Appearance > Menus** in your WordPress admin dashboard.
- Select the menu you wish to edit (e.g., Primary Menu, Footer Menu).

### 2. Configure icon settings
- In the menu editor, locate the **"Menu Icons Settings"** meta box.
- Use this section to:
  - **Enable or disable** icon support for the menu.
  - Set **default icon settings** (e.g., icon size, visibility) that will apply to all newly added menu items.
- These defaults are inherited by any new menu items added to the menu.

### 3. Add or edit a menu item
- Click **"Add New Menu Item"** or edit an existing item.
- In the item’s settings, click the **"Select icon"** link.
- A popup or selection interface will appear where you can:
  - Browse available icons.
  - Choose a suitable icon (e.g., home, settings, search).
- After selection, the icon will be applied to the menu item.

### 4. Save the menu
- Once all desired menu items are configured with icons, click **"Update Menu"** to save changes.
- The updated menu will reflect the icons on the frontend.

---

## Styling menu Iicons

The plugin supports basic CSS classes to further customize the appearance of menu icons. These classes can be applied in the menu editor or via custom CSS, **provided that CSS is enabled in the screen options**.

| Class | Description |
|------|-------------|
| `menu-icon-circle` | Adds a circular border around the icon. |
| `menu-icon-lg-hidden` | Hides the icon on screens on large screens |

> ✅ **Note**: To use these classes:
> - Ensure **CSS is enabled** in the screen options under the menu editor (Settings > Menus > Screen Options).
> - Apply the class directly in the menu item settings or via custom CSS rules.
