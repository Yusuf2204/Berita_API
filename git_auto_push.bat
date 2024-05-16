@echo off
REM Ensure the script stops on errors
setlocal enabledelayedexpansion

REM Check if the correct number of arguments are provided
if "%~1"=="" (
    echo Usage: %~0 "commit message" "branch name"
    exit /b 1
)

if "%~2"=="" (
    echo Usage: %~0 "commit message" "branch name"
    exit /b 1
)

REM Store the commit message and branch name
set commit_message=%~1
set branch_name=%~2

REM Navigate to your git repository
cd /d "C:\path\to\your\repository"

REM Add all changes
git add .

REM Commit changes with the provided commit message
git commit -m "%commit_message%"

REM Push changes to the specified branch
git push origin %branch_name%

REM End of the script
endlocal
echo Done!
