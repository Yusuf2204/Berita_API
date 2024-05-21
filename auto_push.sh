#!/bin/bash

# Ensure the script stops on errors
set -e

# Check if the correct number of arguments are provided
if [ -z "$1" ] || [ -z "$2" ]; then
    echo "Usage: $0 \"commit message\" \"branch name\""
    exit 1
fi

# Store the commit message and branch name
commit_message="$1"
branch_name="$2"

# Navigate to your git repository
cd C:\User_Data\Latihan\Portal_Berita || exit

# Add all changes
git add .

# Commit changes with the provided commit message
git commit -m "$commit_message"

# Push changes to the specified branch
git push origin "$branch_name"

# End of the script
echo "Done!"
