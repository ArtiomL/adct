#!/bin/bash
# adct - install.sh
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.4, 09/01/2018

# Core dependencies
sudo apt-get update
sudo apt-get -y install apache2 curl git php7.0
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs
sudo git clone https://github.com/ArtiomL/adct.git /var/www/adct
sudo cp /var/www/adct/index.php /var/www/adct/secure/index.php

# apache2
sudo sed -i 's/CustomLog .* combined/CustomLog \$\{APACHE_LOG_DIR\}\/access.log combined/' /var/www/adct/etc/adct*.conf
sudo sed -i 's/ErrorLog .*/ErrorLog \$\{APACHE_LOG_DIR\}\/error.log/' /var/www/adct/etc/adct*.conf
sudo cp /var/www/adct/etc/adct*.conf /etc/apache2/sites-available/
cat /var/www/adct/etc/apache2.conf | sudo tee -a /etc/apache2/apache2.conf > /dev/null
sudo htpasswd -cb /etc/apache2/.htpasswd user user
sudo a2dissite 000-default.conf
sudo a2enmod ssl headers
sudo sed -i 's/Listen 80/Listen 8080/g' /etc/apache2/ports.conf
sudo sed -i 's/Listen 443/Listen 8443/g' /etc/apache2/ports.conf
sudo a2ensite adct.conf adct-ssl.conf
sudo systemctl reload apache2

# nodejs
cd /var/www/adct/ws
sudo npm install
sudo touch /var/log/ws-echo.log
sudo chmod 646 /var/log/ws-echo.log
nohup node server.js 4433 > /var/log/ws-echo.log 2>&1 &
