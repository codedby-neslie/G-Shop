# D-Theme - Modern WordPress Theme

A modern, scalable, and well-organized WordPress theme built with Gutenberg support, custom post types, patterns, and shortcodes.

## 🎯 Features

- ✅ **Gutenberg Support** - Full block editor compatibility with custom blocks
- ✅ **Custom Post Types** - Blog CPT with categories and tags
- ✅ **Block Patterns** - Pre-built block patterns for quick content creation
- ✅ **Shortcodes** - Reusable shortcodes for dynamic content
- ✅ **Responsive Design** - Mobile-first, fully responsive layout
- ✅ **Clean Architecture** - Organized, scalable, and maintainable code
- ✅ **Reusable Templates** - Base template system for consistent layouts
- ✅ **Editor Styles** - Custom styles for Gutenberg editor

## 📁 Folder Structure

```
D-theme/
├── inc/
│   ├── blocks/
│   │   ├── register-blocks.php        # Block registration system
│   │   └── hero-block/                # Example custom block
│   │       ├── block.json             # Block definition
│   │       ├── render.php             # Block rendering
│   │       └── style.css              # Block styles
│   ├── cpts/
│   │   └── blog-cpt.php               # Blog custom post type & taxonomies
│   ├── patterns/
│   │   └── register-patterns.php      # Block patterns
│   ├── shortcodes/
│   │   ├── register-shortcodes.php    # Shortcode registry
│   │   └── hero-shortcode.php         # Example shortcode
│   └── load-scripts.php               # Asset enqueueing
├── assets/
│   ├── stylesheets/
│   │   ├── style.css                  # Main theme stylesheet
│   │   ├── editor-style.css           # Editor styles
│   │   ├── admin-style.css            # Admin styles
│   │   └── blocks-editor.css          # Block editor styles
│   ├── javascripts/
│   │   ├── main.js                    # Frontend scripts
│   │   ├── admin.js                   # Admin scripts
│   │   └── blocks-editor.js           # Block editor scripts
│   └── images/                        # Theme images
├── pages/
│   ├── templates/
│   │   └── base-template.php          # Main reusable template
│   ├── archive/
│   │   ├── post-card.php              # Post card component
│   │   └── no-posts.php               # No posts found message
│   ├── single/
│   │   ├── author-box.php             # Author information box
│   │   └── related-posts.php          # Related posts section
│   ├── archive.php                    # Archive template
│   ├── single.php                     # Single post template
│   ├── taxonomy.php                   # Taxonomy template
│   ├── page.php                       # Page template
│   └── index.php                      # Index template
├── header.php                         # Header template
├── footer.php                         # Footer template
├── comments.php                       # Comments template
├── 404.php                            # 404 error template
├── search.php                         # Search results template
├── style.css                          # Theme header
├── functions.php                      # Theme functions
├── index.php                          # Main theme index
└── README.md                          # This file
```

## 🚀 Quick Start

### 1. Install the Theme

1. Place the `D-theme` folder in `wp-content/themes/`
2. Go to Appearance > Themes in WordPress admin
3. Activate the D-Theme

### 2. Configure Theme

1. Go to Appearance > Customize
2. Set the site title, tagline, and custom logo
3. Set up navigation menus under Appearance > Menus

### 3. Create Blog Content

1. Go to Blog (in sidebar menu)
2. Create new blog posts using Gutenberg blocks
3. Assign categories and tags

## 📝 Creating Custom Blocks

### Structure

Block folders should follow this structure:

```
inc/blocks/your-block/
├── block.json     # Block definition (required)
├── render.php     # Render callback
└── style.css      # Block styles (optional)
```

### Example: Creating a Custom Block

1. Create folder: `inc/blocks/your-block/`
2. Create `block.json`:

```json
{
  "$schema": "https://schemas.wp.org/trunk/block.json",
  "apiVersion": 3,
  "name": "d-theme/your-block",
  "title": "Your Block",
  "category": "d-theme",
  "attributes": {
    "title": {
      "type": "string",
      "default": "Block Title"
    }
  },
  "render": "file:./render.php"
}
```

3. Create `render.php` with your block output
4. Blocks are auto-registered via `register-blocks.php`

## 🎨 Using Block Patterns

Block patterns are pre-designed block layouts. To use them:

1. In Gutenberg editor, click the + button
2. Go to "Patterns"
3. Select from D-Theme Patterns

### Creating New Patterns

Add patterns in `inc/patterns/register-patterns.php`:

```php
register_block_pattern(
    'd-theme/pattern-name',
    [
        'title'       => __('Pattern Title', 'd-theme'),
        'description' => __('Pattern description', 'd-theme'),
        'content'     => '<!-- wp:heading --><h2>Example</h2><!-- /wp:heading -->',
        'categories'  => ['d-theme'],
        'keywords'    => ['keyword1', 'keyword2'],
    ]
);
```

## 📌 Using Shortcodes

### Hero Shortcode

Display a hero section with the `[d_hero]` shortcode:

```
[d_hero 
    title="Welcome"
    subtitle="Your subtitle here"
    button_text="Click Here"
    button_url="https://example.com"
    background_color="#0066cc"
    height="400px"
]
```

### Creating New Shortcodes

1. Create file: `inc/shortcodes/your-shortcode.php`
2. Define shortcode callback function
3. Register: `add_shortcode('your_shortcode', 'your_callback_function')`
4. Include in `inc/shortcodes/register-shortcodes.php`

## 🏗️ Custom Post Types

### Blog CPT

The theme includes a blog custom post type with:

- **Taxonomies**: Blog Categories, Blog Tags
- **Features**: Title, Editor, Author, Thumbnail, Excerpt, Comments
- **REST API**: Enabled for headless usage

### Creating Custom CPT

Add in `inc/cpts/` folder:

```php
register_post_type('your-cpt', [
    'label'          => 'Your CPT',
    'public'         => true,
    'show_in_rest'   => true,
    'supports'       => ['title', 'editor', 'thumbnail'],
    'taxonomies'     => ['your_taxonomy'],
    'rewrite'        => ['slug' => 'your-cpt'],
]);
```

## 🎯 Customization Guide

### Adding Custom Styles

1. Add styles to `assets/stylesheets/style.css`
2. Use CSS custom properties (variables) for consistency
3. Follow responsive design patterns

### Adding Custom JavaScript

1. Add scripts to `assets/javascripts/main.js`
2. Use the `dTheme` global namespace
3. Enqueue additional scripts in `inc/load-scripts.php`

### Modifying Templates

1. All templates are in `pages/` folder
2. Base template system ensures consistency
3. Use `get_template_part()` for reusable components

## 🔧 Theme Functions Explained

### `functions.php`

Main theme configuration:
- Theme support setup (Gutenberg, title-tag, thumbnails)
- Navigation menus registration
- Custom color palettes
- Template include filter

### `inc/load-scripts.php`

Asset management:
- Front-end stylesheet and scripts
- Admin stylesheet and scripts
- Block editor assets
- Script localization for AJAX

### `inc/blocks/register-blocks.php`

Block system:
- Auto-discovers and registers blocks
- Provides helper function for manual registration

### `inc/cpts/blog-cpt.php`

Custom post types:
- Blog CPT definition
- Category and tag taxonomies
- Supports categories and tags

### `inc/patterns/register-patterns.php`

Block patterns:
- Pattern category registration
- Pre-built block patterns

### `inc/shortcodes/register-shortcodes.php`

Shortcode system:
- Centralized shortcode registry
- Helper functions for safe output

## 🎨 Color Palette

The theme includes predefined colors:

- **Primary**: `#0066cc` - Main brand color
- **Secondary**: `#ff6b6b` - Accent color
- **Dark**: `#1a1a1a` - Text color
- **Light**: `#f5f5f5` - Background color

Edit in `functions.php` and `inc/load-scripts.php`

## 📱 Responsive Breakpoints

- **Desktop**: 1200px+
- **Tablet**: 769px - 1199px
- **Mobile**: Below 768px

## ♿ Accessibility Features

- Semantic HTML5 elements
- ARIA labels and roles
- Keyboard navigation support
- Screen reader text helpers
- Focus-visible styles
- Color contrast compliance

## 🔒 Security Best Practices

- All output escaped properly
- Input sanitized with `sanitize_*()` functions
- Nonce verification for AJAX
- Proper capability checks

## 📚 Code Standards

- PSR-12 PHP coding standards
- Clean, readable, well-commented code
- Use of PHP type declarations
- Consistent naming conventions

## 🐛 Troubleshooting

### Blocks Not Showing?
- Check `inc/blocks/your-block/block.json` exists
- Ensure block name matches folder name
- Clear WordPress cache

### Styles Not Loading?
- Check file paths in `inc/load-scripts.php`
- Verify file permissions
- Clear browser cache

### Shortcodes Not Working?
- Check shortcode registered in `register-shortcodes.php`
- Verify spelling in page/post
- Test in Inspector for errors

## 📖 Additional Resources

- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [Gutenberg Documentation](https://developer.wordpress.org/block-editor/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)

## 📄 License

GPL v2 or later - See LICENSE file

## 👨‍💻 Support

For theme support and updates, refer to the documentation or contact the theme author.

---

**Made with ❤️ for modern WordPress development**
