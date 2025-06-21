#!/bin/bash

# Update and install LEMP stack components
sudo apt update -y
sudo apt install -y nginx php-fpm php-mysql mariadb-client unzip

# Start and enable Nginx
sudo systemctl start nginx
sudo systemctl enable nginx

# Optional: enable UFW and allow necessary ports
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw --force enable

# Display service statuses
echo "==== Services Status ===="
systemctl status nginx | head -n 10
php -v
nginx -v
