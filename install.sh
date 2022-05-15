#!/bin/sh
read -rp "Web server root (no trailing slash): " root
read -rp "Web domain: " domain
cp -r ./backend "$root/api.$domain"
cp -r ./frontend "$root/sys.$domain"

mariadb -e "CREATE DATABASE anum;"
mariadb -e "CREATE USER anum_admin@localhost IDENTIFIED BY 'passwd';"
mariadb -e "GRANT ALL PRIVILEGES ON anum.* TO 'anum_admin'@'localhost';"
mariadb -e "FLUSH PRIVILEGES;"
mysqldump -u anum -ppasswd anum > database/anum.sql

echo "Done, make sure you create a website config for:"
printf "\t - api.%s\n" "$domain"
printf "\t - sys.%s\n" "$domain"