#!/bin/sh
set -eu

test -s index.html
test -s dashboard.html
test -s pengaduan.html
test -s history.html
test -s public/assets/css/styles.css
test -s design/design-system.md
grep -q 'bootstrap@5.3.3' index.html
grep -q 'name: static-bootstrap-site' .figaro/skills/static-bootstrap-site/SKILL.md
! grep -Rqs 'from .react' index.html dashboard.html pengaduan.html history.html

echo "static-bootstrap-site contract passed"
