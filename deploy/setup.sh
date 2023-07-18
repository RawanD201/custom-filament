#!/bin/bash

#Requires First argument as username, second argument as password

# ./setup.sh dev password

echo "========================================================"
echo "    - Permissions for both setup.sh & user.sh must be 777"
echo "========================================================"

read -p "Continue the installation? (y to continue, any key to cancel)"

if [ "${REPLY:0:1}" != "y" ]; then
  exit 0
fi

if [ -z "$1" ] || [ -z "$2" ]; then
  echo "Username & Password is required."
  echo "- First argument is User."
  echo "- Second argument is Password."
  exit 0
fi

# if [ -z "$3" ]; then
#   echo "GitHub Fine-Grained Access Token is required."
#   echo "- Third argument is the token."
#   exit 0
# fi

# token="$3"
project_name="archive-traffic"
project_path="/var/www/$project_name"

# save current path
pwd=$(pwd)

echo "=========================================="
echo "Update & Add Repositories"
echo "=========================================="

apt update && apt -y upgrade && apt -y install apt-transport-https ca-certificates curl gnupg lsb-release
# Add repositories

# composer
add-apt-repository -y universe
# php
add-apt-repository -y ppa:ondrej/php

echo "=========================================="
echo "Update successfull"
echo "Repositories Added"
echo "=========================================="

#update the repositores
apt update && apt -y upgrade

#update kernal
echo "=========================================="
echo "Updating kernals..."
echo "=========================================="

apt -y install linux-headers-$(uname -r) build-essential dkms

echo "=========================================="
echo "Kernal updated successfully!"
echo "=========================================="

#installation
echo "=========================================="
echo "Installing....."
echo "=========================================="

apt-get -y install software-properties-common unattended-upgrades php8.2 php8.2-common php8.2-snmp php8.2-xml php8.2-zip php8.2-mbstring php8.2-curl php8.2-cgi php8.2-fpm php8.2-gd php8.2-imagick php8.2-intl php8.2-memcached php8.2-mysql php8.2-opcache php8.2-pgsql php8.2-psr php8.2-redis nginx mysql-server certbot unzip dos2unix

echo "=========================================="
echo "Installation completed!"
echo "=========================================="

#install composer
echo "=========================================="
echo "Composer setup..."
echo "=========================================="

cd ~
curl -sS https://getcomposer.org/installer | php
mv ~/composer.phar /usr/local/bin/composer

echo "=========================================="
echo "Composer completed!"
echo "=========================================="

#enable auto updates
dpkg-reconfigure -f noninteractive --priority=low unattended-upgrades

#remove apache2
echo "=========================================="
echo "Uninstalling Apache2..."
echo "=========================================="

systemctl stop apache2
apt remove apache2 --purge

echo "=========================================="
echo "Apache2 uninstalled!"
echo "=========================================="

#Replace php.ini texts
echo "=========================================="
echo 'Fixing php.ini File...'
echo "=========================================="

sed -i 's/;cgi.fix_pathinfo=0/cgi.fix_pathinfo=1/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=fileinfo/extension=fileinfo/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=gd/extension=gd/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=imap/extension=imap/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=mbstring/extension=mbstring/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=exif/extension=exif/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=mysqli/extension=mysqli/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=openssl/extension=openssl/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=pdo_mysql/extension=pdo_mysql/gI' /etc/php/8.2/fpm/php.ini
sed -i 's/;extension=sockets/extension=sockets/gI' /etc/php/8.2/fpm/php.ini

echo "=========================================="
echo 'php.ini File fixed!'
echo "=========================================="

#Create Swap file
echo "=========================================="
echo 'Creating swapfile...'
echo "=========================================="

cd /
fallocate -l 2G /swapfile
chmod 600 swapfile
mkswap /swapfile
swapon /swapfile

echo "=========================================="
echo 'Swapfile created!'
echo "=========================================="

#Enable ufw
echo "=========================================="
echo 'Enabling ufw...'
echo "=========================================="

ufw allow 'Nginx FULL'
ufw allow 'OpenSSH'
ufw allow ssh
ufw --force enable

echo "=========================================="
echo 'ufw Enabled!'
echo "=========================================="

# Add user from arg1
echo "=========================================="
echo 'Creating User...'
echo "=========================================="

usr=$1
usrpwd=$2
useradd -s /bin/bash -m -g users -G sudo,www-data "$usr"

# If no pwd provided, the pwd is the username
yes "${usrpwd:=$usr}" | passwd "$usr"

echo "=========================================="
echo 'User created!'
echo "=========================================="

echo "=========================================="
echo 'Creating directories...!'
echo "=========================================="

mkdir /home/$usr/.ssh
cp ~/.ssh/authorized_keys /home/$usr/.ssh/authorized_keys

echo "=========================================="
echo 'Directories Created!'
echo "=========================================="

echo "=========================================="
echo 'Setting up bash profile...'
echo "=========================================="

cat $pwd/bash_profile >~/.bashrc
cat $pwd/bash_profile >~/.bash_profile
cat $pwd/bash_profile >/home/$usr/.bashrc
cat $pwd/bash_profile >/home/$usr/.bash_profile

echo "=========================================="
echo 'Bash profile finished!'
echo "=========================================="

echo "=========================================="
echo 'Changing Ownership & Permissions....'
echo "=========================================="

chown -R $usr:users /var/www/*
chown $usr:users /home/$usr/.bash*
chown -R $usr:users /home/$usr/.ssh/

echo "=========================================="
echo 'Permission & Ownership Changed!'
echo "=========================================="

#Final steps
yes | apt autoremove
apt-get -y upgrade
. ~/.bashrc
systemctl restart php8.2-fpm
systemctl restart nginx

echo "=========================================="
echo 'Configuring user...'
echo "=========================================="

su $usr -c "bash $pwd/user.sh $project_path"

echo "=========================================="
echo 'User created and configured'
echo "=========================================="

echo "=========================================="
echo 'Deploying Websites...'
echo "=========================================="

# Project Repo
# git clone https://github.com/RawanD201/ap-soft.git $project_path

cp $project_path/.env.example $project_path/.env
cp $project_path/deploy/nginx.conf "/etc/nginx/sites-available/$project_name.conf"

#create symbolic link
ln -s "/etc/nginx/sites-available/$project_name.conf" /etc/nginx/sites-enabled/

echo "=========================================="
echo 'Website Deployed!'
echo "=========================================="

cat <<MANUAL_TASKS
==============================================
            Remaning Manual Tasks....
==============================================

- Setup mysql secure installation
mysql_secure_installation

- Change root password
passwd root

- Database Setup
1. Login to mysql:
mysql -u root -p

2. Change User Password with the following command:
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'rawand';

    -   Flush Cache.
FLUSH PRIVILEGES;

    -   Create Database.
CREATE DATABASE traffic;

3. Restart services:
    $ systemctl restart php8.2-fpm
    $ systemctl restart nginx

4. Install & Migrate the project
  cd deploy && ./first_install.sh

MANUAL_TASKS

source ~/.bashrc
