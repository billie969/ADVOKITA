---
name: static-bootstrap-site
description: Maintain the ADVOKITA PHP-rendered multi-page site using semantic HTML, Bootstrap CSS, and shared styles without JavaScript. Use for page, layout, form, navigation, and styling changes in this repository.
---

# PHP Bootstrap Site

1. Use semantic PHP-rendered HTML and Bootstrap CSS classes.
2. Keep shared visual rules in `public/assets/css/styles.css`.
3. Do not add JavaScript, script elements, React, JSX, Tailwind, Node.js, npm/pnpm, or Vite.
4. Do not use Bootstrap JavaScript components; provide navigation and interactions with HTML forms and CSS.
5. Keep navigation and branding consistent across pages rendered through `public/index.php`.
6. Put page templates in `templates/pages/` and escape dynamic output with `escape()`.
7. Verify PHP syntax, run `php tests/validation.php`, and confirm no scripts are emitted.

Refer to `design/design-system.md` for visual tokens and responsive rules.
