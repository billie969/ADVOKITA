---
name: static-bootstrap-site
description: Maintain the ADVOKITA multi-page static site using semantic HTML, Bootstrap, and shared CSS without React or custom JavaScript. Use for page, layout, form, navigation, and styling changes in this repository.
---

# Static Bootstrap Site

1. Use semantic HTML and Bootstrap layout or component classes first.
2. Keep shared visual rules in `public/assets/css/styles.css`.
3. Do not add React, JSX, Tailwind, or a custom JavaScript application layer.
4. Bootstrap's bundled JavaScript may be used only for native Bootstrap components.
5. Keep navigation and branding consistent across all HTML pages.
6. Add every new top-level HTML page to `build.rollupOptions.input` in `vite.config.js`.
7. Verify changes with `pnpm build`.

Refer to `design/design-system.md` for visual tokens and responsive rules.
