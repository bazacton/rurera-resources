@echo off

:: Pull the latest changes from the repository
git pull

:: Copy all files from the current folder to the target folder
:: Use /Y to overwrite files without prompting
xcopy * E:\XAMPP_7.4.2\htdocs\rurera\ /E /Y

:: Optional: Remove the temporary folder if you want
:: rmdir /S /Q E:\XAMPP_7.4.2\htdocs\rurera-temp-git

echo Files copied successfully.
pause
