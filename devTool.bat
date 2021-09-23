echo off
ECHO Welcome to Automation Refactor.
set port=555
SET /p port=Choose port:
set app="http://localhost:%port%"
start chrome --new-window %app%
php -S localhost:%port%
