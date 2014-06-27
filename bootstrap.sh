#!/usr/bin/env bash

sudo cp /vagrant/conf/sources.list /etc/apt/sources.list
sudo apt-get update

sudo apt-get install php5-cli -y
sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/bin
cd /vagrant/www && composer.phar install