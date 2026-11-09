#!/bin/sh
set -eu

test -s public/index.php
test -s templates/pages/login.php
test -s templates/pages/register.php
test -s templates/pages/dashboard.php
test -s templates/pages/report.php
test -s templates/pages/history.php
test -s templates/pages/admin.php
test -s public/assets/css/styles.css
test -s design/design-system.md
grep -q 'bootstrap@5.3.3' templates/layout.php
grep -q 'name: static-bootstrap-site' .figaro/skills/static-bootstrap-site/SKILL.md
! grep -Rqs '<script' public templates

echo "PHP Bootstrap site contract passed"
