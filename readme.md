# Setup
========================

Install vagrant
Install virtualbox

Download this project and put it into a directory

Create 'webroot' folder in directory

$ vagrant up (STOP PUTTY PUPPET BEFORE DOING THIS - WINDOWS ONLY)

$ vagrant ssh (username will be 'vagrant')

-

$ cd /vagrant/webroot


Checkout the CBN application into the 'webroot' directory


$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ php /usr/local/bin/composer install
OR
$ php composer install

checkout project into this folder

setup timezone
sudo vi /etc/php5/apache2/php.ini
date.timezone = "Europe/London"

\curl -L https://get.rvm.io | bash -s stable --ruby --autolibs=enable --auto-dotfiles
source /home/vagrant/.rvm/scripts/rvm

rvm install ruby-1.9.3-p484

sudo gem install bundler

bundle install


sudo apt-get install npm
npm config set registry http://registry.npmjs.org/

sudo npm cache clean -f
sudo npm install -g n
sudo n stable


sudo npm install
sudo npm install -g grunt-cli

grunt watch

=====

Install GIT
Install AWS

USE download link from http://aws.amazon.com/code/6752709412171743 as LINKSPACE

wget --quiet LINKSPACE
unzip -qq AWS-ElasticBeanstalk-CLI-*.zip
sudo mkdir /usr/local/aws
sudo rsync -a --no-o --no-g AWS-ElasticBeanstalk-CLI-*/ /usr/local/aws/elasticbeanstalk/
sudo export PATH=$PATH:/usr/local/aws/elastcibeanstalk/eb/linux/python2.7/

Push to AWS





===

http://localhost:8888   - homepage

phpmyadmin: http://localhost:8888/phpmyadmin

username: root
password: root





