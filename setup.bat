@echo off
echo Setting up Optimus Software Limited Website...
echo.

echo Installing Composer dependencies...
composer install

echo Installing NPM dependencies...
npm install

echo Generating application key...
php artisan key:generate

echo Creating storage link...
php artisan storage:link

echo Running database migrations...
php artisan migrate

echo Seeding database with initial data...
php artisan db:seed

echo Building assets...
npm run build

echo.
echo Setup complete! You can now run 'php artisan serve' to start the development server.
echo Visit http://localhost:8000 to view the website.
echo Admin panel is available at http://localhost:8000/admin/dashboard
echo.
pause