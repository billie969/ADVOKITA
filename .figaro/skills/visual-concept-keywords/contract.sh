#!/bin/sh
set -eu

skill_file="$(dirname "$0")/SKILL.md"

test -s "$skill_file"
grep -q '^name: visual-concept-keywords$' "$skill_file"
grep -q '^description:' "$skill_file"
grep -q -- '- caveman' "$skill_file"
grep -q -- '- design' "$skill_file"
grep -q -- '- ponytail' "$skill_file"

echo "visual-concept-keywords skill contract passed"
