touch .env

echo APP_ENV=staging >> .env
echo APP_NAME=Edu@Home >> .env
echo APP_KEY=base64:3qbaI+rPi7QiC6p78oOYuMx+MXKgbigi00v1GtQHz64= >> .env
echo APP_DEBUG=true >> .env

# Database Config
echo DB_CONNECTION=$DB_CONNECTION  >> .env
echo DB_HOST=$DB_HOST>> .env
echo DB_PORT=3306 >> .env
echo DB_DATABASE=$DB_DATABASE >> .env
echo DB_USERNAME=$DB_USERNAME >> .env
echo DB_PASSWORD=$DB_PASSWORD >> .env

cat .env
