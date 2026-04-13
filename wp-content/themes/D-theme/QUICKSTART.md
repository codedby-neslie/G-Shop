# D-Theme Quick Start Guide

Get your D-Theme up and running in 5 minutes!

## 1️⃣ Activation (1 min)

1. Go to **WordPress Admin** → **Appearance** → **Themes**
2. Find **D-Theme** in the list
3. Click **Activate**

✅ **Done!** Your theme is now active.

---

## 2️⃣ Basic Configuration (2 min)

### Set Site Title & Tagline
1. Go to **Settings** → **General**
2. Update:
   - Site Title: Enter your site name
   - Tagline: Enter your tagline
3. Click **Save Changes**

### Add Custom Logo
1. Go to **Appearance** → **Customize**
2. Click **Site Identity**
3. Click **Select Logo** and upload your logo
4. Click **Publish**

---

## 3️⃣ Create Navigation Menu (2 min)

1. Go to **Appearance** → **Menus**
2. Click **Create a new menu**
3. Name it "Main Menu"
4. Add menu items:
   - Click **Add items** → **Pages** or **Custom Links**
   - Select pages or add URLs
5. Check **Display location** → Select **Primary Menu**
6. Click **Save Menu**

---

## 4️⃣ Create Your First Blog Post (Bonus!)

1. Go to **Blog** → **Add New Post**
2. Enter title: "Welcome to D-Theme"
3. Use Gutenberg blocks to add content:
   - Click **+** icon
   - Search for **Hero Block** (custom block!)
   - Add Hero block with your content
   - Add Paragraph blocks
4. Add featured image:
   - Scroll right panel
   - Click **Set featured image**
5. Click **Publish**

✅ **Your site is ready!** Visit your homepage.

---

## 🎨 What You Can Do Now

### ✅ Available Blocks
- **Hero Block** - Eye-catching hero sections
- **Standard Gutenberg blocks** - Paragraphs, images, columns, etc.

### ✅ Available Shortcodes
```
[d_hero 
    title="Your Title"
    subtitle="Your Subtitle"
    button_text="Click Me"
    button_url="https://example.com"
]
```

### ✅ Block Patterns
In the Gutenberg editor:
1. Click **+** to add a block
2. Go to **Patterns** tab
3. Browse **D-Theme Patterns**

---

## 📝 Creating Content

### Blog Post Example
```
1. Title: My First Post
2. Add Hero Block
   ├─ Title: Welcome!
   └─ Button: Learn More
3. Add Paragraph: Your content here
4. Add Image: Upload photo
5. Publish!
```

### Using the Hero Shortcode
```
Add this in any post:

[d_hero 
    title="Amazing Title"
    subtitle="With a great subtitle"
    background_color="#0066cc"
    button_text="Get Started"
    button_url="#contact"
]
```

---

## 🎯 Customization Tips

### Change Colors
1. Open `functions.php`
2. Find the `add_theme_support()` line for colors
3. Edit the hex colors:
   ```php
   'color' => '#0066cc'  // Change this
   ```
4. Save and refresh frontend

### Add Custom Styles
1. Go to `assets/stylesheets/style.css`
2. Add your CSS at the bottom
3. Refresh the website

### Create Your Own Block
See **BLOCK_DEVELOPMENT.md** for complete guide.

---

## 🔗 Important URLs

| Page | URL |
|------|-----|
| Admin Dashboard | `/wp-admin/` |
| All Blog Posts | `/blog/` |
| Create New Post | `/wp-admin/post-new.php?post_type=blog` |
| Themes | `/wp-admin/themes.php` |
| Customize | `/wp-admin/customize.php` |

---

## 📚 Documentation

For more detailed information:
- **README.md** - Full theme documentation
- **FEATURES.md** - Complete feature list
- **BLOCK_DEVELOPMENT.md** - Create custom blocks
- **API_REFERENCE.md** - Code reference

---

## ✨ Theme Features at a Glance

| Feature | Status |
|---------|--------|
| Gutenberg Support | ✅ Full |
| Custom Blocks | ✅ Hero Block |
| Blog CPT | ✅ With categories & tags |
| Shortcodes | ✅ Hero shortcode |
| Block Patterns | ✅ 3 included |
| Responsive | ✅ Mobile-first |
| Header/Footer | ✅ Customizable |
| Comments | ✅ Enabled |

---

## 🚀 Next Steps

1. **Explore Blocks** - Try adding different blocks
2. **Create Content** - Write blog posts
3. **Customize Colors** - Adjust theme colors to match your brand
4. **Add Logo** - Upload your company logo
5. **Create Menus** - Set up navigation

---

## ❓ Common Questions

### How do I use the Hero block?
In the Gutenberg editor, click **+**, search for "Hero", and select the Hero Block. Fill in the fields and save.

### Can I change the colors?
Yes! Edit `functions.php` and modify the color values, or use Gutenberg's color picker on each block.

### How do I add more blocks?
Follow the guide in **BLOCK_DEVELOPMENT.md** to create custom blocks.

### Where do I add custom code?
- PHP: Add to `functions.php`
- CSS: Add to `assets/stylesheets/style.css`
- JavaScript: Add to `assets/javascripts/main.js`

### How do I create a shortcode?
Create file in `inc/shortcodes/`, register it, and include in `register-shortcodes.php`.

---

## 🎉 You're All Set!

Your D-Theme is now ready to use. Start creating amazing content! 

**Need help?** Check the documentation files or consult the WordPress documentation.

**Happy building!** 🚀

---

*Last updated: 2024*
