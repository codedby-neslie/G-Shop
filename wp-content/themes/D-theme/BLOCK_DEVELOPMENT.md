# Block Development Guide

This guide explains how to create custom Gutenberg blocks for D-Theme.

## Block Structure

Every block must have this structure:

```
inc/blocks/block-name/
├── block.json     # Block metadata and configuration
├── render.php     # PHP rendering callback
├── edit.js        (optional) Interactive editor component
└── style.css      (optional) Block styles
```

## Creating a Simple Block Step-by-Step

### Step 1: Create Block Folder

```bash
mkdir inc/blocks/testimonial-block
```

### Step 2: Create block.json

The `block.json` file defines your block's metadata and capabilities:

```json
{
  "$schema": "https://schemas.wp.org/trunk/block.json",
  "apiVersion": 3,
  "name": "d-theme/testimonial",
  "title": "Testimonial",
  "description": "Display customer testimonials",
  "category": "d-theme",
  "icon": "format-quote",
  "example": {
    "attributes": {
      "author": "John Doe",
      "quote": "Great product!"
    }
  },
  "attributes": {
    "quote": {
      "type": "string",
      "default": "Enter testimonial text here..."
    },
    "author": {
      "type": "string",
      "default": "Author Name"
    },
    "role": {
      "type": "string",
      "default": "CEO"
    },
    "rating": {
      "type": "number",
      "default": 5
    }
  },
  "textdomain": "d-theme",
  "style": "d-theme-testimonial-style",
  "render": "file:./render.php"
}
```

### Step 3: Create render.php

The render file outputs your block on the frontend:

```php
<?php
/**
 * Render Testimonial Block
 *
 * @package D_Theme
 */

$quote  = isset($attributes['quote']) ? sanitize_text_field($attributes['quote']) : '';
$author = isset($attributes['author']) ? sanitize_text_field($attributes['author']) : '';
$role   = isset($attributes['role']) ? sanitize_text_field($attributes['role']) : '';
$rating = isset($attributes['rating']) ? intval($attributes['rating']) : 5;
?>

<div class="wp-block-d-theme-testimonial testimonial-block">
    <blockquote class="testimonial-quote">
        <p><?php echo $quote; ?></p>
    </blockquote>
    
    <div class="testimonial-meta">
        <div class="testimonial-author">
            <strong><?php echo $author; ?></strong>
            <?php if ($role) : ?>
                <span class="testimonial-role"><?php echo $role; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="testimonial-rating">
            <?php 
            for ($i = 0; $i < $rating; $i++) {
                echo '★';
            }
            ?>
        </div>
    </div>
</div>
```

### Step 4: Create style.css (Optional)

Add styles for your block:

```css
.wp-block-d-theme-testimonial {
    background: #f9f9f9;
    padding: 2rem;
    border-left: 4px solid #0066cc;
    border-radius: 4px;
    margin: 2rem 0;
}

.testimonial-quote {
    margin: 0 0 1rem 0;
    font-style: italic;
    font-size: 1.1rem;
}

.testimonial-quote p {
    margin: 0;
}

.testimonial-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-top: 1rem;
}

.testimonial-role {
    display: block;
    font-size: 0.875rem;
    color: #666;
}

.testimonial-rating {
    color: #ffc107;
    font-size: 1.25rem;
}
```

### Step 5: Block is Auto-Registered

Your block will be automatically registered via `register-blocks.php`. No additional code needed!

## Block Attributes

Attributes define what data your block stores. Common types:

```json
"attributes": {
    "text": {
        "type": "string",
        "default": "Default text"
    },
    "number": {
        "type": "number",
        "default": 0
    },
    "boolean": {
        "type": "boolean",
        "default": false
    },
    "array": {
        "type": "array",
        "default": []
    },
    "object": {
        "type": "object",
        "default": {}
    }
}
```

## Advanced: Interactive Block Editor

For interactive editing, create an `edit.js` file:

```javascript
// inc/blocks/testimonial-block/edit.js
const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.blockEditor;
const { PanelBody, TextControl, RangeControl } = wp.components;

registerBlockType('d-theme/testimonial', {
    title: 'Testimonial',
    category: 'd-theme',
    attributes: {
        quote: { type: 'string', default: '' },
        author: { type: 'string', default: '' },
        rating: { type: 'number', default: 5 },
    },
    edit({ attributes, setAttributes }) {
        const { quote, author, rating } = attributes;

        return (
            <>
                <div className="testimonial-block-editor">
                    <RichText
                        value={quote}
                        onChange={(value) => setAttributes({ quote: value })}
                        placeholder="Enter testimonial..."
                        multiline="p"
                    />
                    <TextControl
                        label="Author"
                        value={author}
                        onChange={(value) => setAttributes({ author: value })}
                    />
                </div>
                
                <InspectorControls>
                    <PanelBody title="Settings">
                        <RangeControl
                            label="Rating"
                            value={rating}
                            onChange={(value) => setAttributes({ rating: value })}
                            min={1}
                            max={5}
                        />
                    </PanelBody>
                </InspectorControls>
            </>
        );
    },
    save({ attributes }) {
        return null; // Use PHP render for output
    },
});
```

Add to `block.json`:

```json
"editorScript": "d-theme-testimonial-editor",
"editorStyle": "d-theme-testimonial-editor-style"
```

Enqueue in `inc/load-scripts.php`:

```php
wp_enqueue_script(
    'd-theme-testimonial-editor',
    D_THEME_URI . '/inc/blocks/testimonial-block/edit.js',
    ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
    D_THEME_VERSION
);
```

## Block Templates

Use block templates to automatically insert blocks when creating posts:

```php
$post_type_object = get_post_type_object('post');
$post_type_object->template = [
    ['core/heading', ['level' => 1]],
    ['core/paragraph', []],
    ['d-theme/hero-block', []],
];
```

## Block Variations

Create block variations for different styles:

```json
"variations": [
    {
        "name": "primary",
        "title": "Primary Button",
        "description": "A primary action button",
        "attributes": {
            "backgroundColor": "primary",
            "textColor": "light"
        }
    },
    {
        "name": "secondary",
        "title": "Secondary Button",
        "attributes": {
            "backgroundColor": "secondary",
            "textColor": "light"
        }
    }
]
```

## Best Practices

1. **Sanitize Output**: Always sanitize and escape attributes
   ```php
   $text = sanitize_text_field($attributes['text']);
   $url = esc_url($attributes['url']);
   ```

2. **Provide Defaults**: Every attribute should have a default value

3. **Use Semantic HTML**: Structure blocks with proper HTML elements

4. **Responsive Design**: Make blocks mobile-friendly

5. **Accessibility**: Include proper ARIA labels and semantic markup

6. **Performance**: Minimize inline styles, use CSS classes instead

7. **Documentation**: Comment your code with clear explanations

## Block Supports

Enable features for your block:

```json
"supports": {
    "anchor": true,
    "className": true,
    "color": {
        "background": true,
        "text": true
    },
    "spacing": {
        "padding": true,
        "margin": true
    },
    "transforms": [
        {
            "type": "prefix",
            "prefix": "This is a",
            "transform": function() { return []; }
        }
    ]
}
```

## Testing Your Block

1. In Gutenberg editor, search for your block name
2. Add it to a post/page
3. Edit attributes and preview
4. Check frontend rendering
5. Test responsive design

## Common Issues

### Block not appearing?
- Check block.json syntax
- Verify block name matches folder name
- Clear WordPress cache

### Attributes not saving?
- Verify attributes in block.json
- Check attribute types
- Test with browser console errors

### Styles not applying?
- Check CSS file paths
- Verify selectors match block output
- Test CSS specificity

## Resources

- [Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [Block JSON Reference](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/)
- [WordPress Components](https://developer.wordpress.org/block-editor/components/)

---

Happy block building! 🚀
