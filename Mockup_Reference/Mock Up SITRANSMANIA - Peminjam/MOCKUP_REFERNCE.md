Refer to the 3 UI screenshots as design reference for SITRANSMANIA (modern, clean, aesthetic boarding-house transportation system).

Goal:
Unify and refine the entire UI across all Blade templates so every page uses the same modern visual identity.

Main style characteristics to match:

-   Warm brown / earthy palette (#6C4E3F, #C9A58C, #E7D6C8, or close variations)
-   Large full-width hero banner on main pages with background image + text overlay
-   Rounded white content cards with subtle shadow and soft blur
-   Modern icons (Flaticon, Bootstrap icon, or FontAwesome)
-   Elegant typography similar to screenshots (bold headlines + light subtext)
-   Smooth hover effects (scale/opacity)
-   Navigation bar with top-right icons (notifications / cart / profile / menu)
-   Dashboard items displayed as big selectable cards like the first screenshot

Things to fix globally:

-   Make layout consistent across all roles (Admin, Pemilik, Peminjam)
-   Consolidate header/footer into a shared layout file
-   Ensure responsive design for desktop + mobile
-   Remove duplicated CSS and move shared styles into one file
-   Replace outdated buttons and form styles with modern component styling

Actions:

1. Auto-create or update a `resources/views/layouts/main.blade.php` template for the global layout.
2. Create a central CSS file (`public/css/sitransmania.css`) and apply the visual style consistently.
3. Update all Blade files to inherit from the main layout.
4. Modernize forms (rounded, spaced, clean placeholder + icons).
5. Adjust dashboard pages to use large card-style menu buttons with icons and hover animation.
6. Leave existing controller logic untouched — only modify frontend markup and style.
7. If missing assets (icons, images, css) are needed, automatically create placeholder references.

Priority:
Make the UI look polished, unified, and as fresh as the three reference screenshots while maintaining the current functional structure.

Work step-by-step:
After generating the patch for one file, wait for me to click "Accept" before moving to the next file.
