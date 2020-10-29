touch .env

echo APP_ENV=staging >> .env
echo APP_NAME=Edu@Home >> .env
echo APP_KEY=base64:3qbaI+rPi7QiC6p78oOYuMx+MXKgbigi00v1GtQHz64= >> .env
echo APP_DEBUG=true >> .env

# Database Config
echo DB_CONNECTION=mysql  >> .env
echo DB_HOST=127.0.0.1>> .env
echo DB_PORT=3306 >> .env
echo DB_DATABASE=laravel >> .env
echo DB_USERNAME=root >> .env
echo DB_PASSWORD= >> .env
