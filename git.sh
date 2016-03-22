#!/usr/bin/env bash
git add .
echo '*.sh' >> .gitignore
echo '*.log' >> .gitignore
git add .gitignore
git commit -m "update"
git push origin master -f