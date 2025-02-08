#!/bin/bash

# Prompt for commit message
read -p "Enter your commit message: " commit_message

read -p "Enter your branch: " branch
# Add all changes
git add .

# Commit changes with the provided message
git commit -m "$commit_message"

# Push changes to the master branch
git push origin "$branch"

