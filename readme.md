# Setup
========================

Install vagrant
Install virtualbox

Download this project and put it into a directory

Create 'webroot' folder in directory
(STOP PUTTY PUPPET BEFORE DOING THIS - WINDOWS ONLY)
(ssh username will be 'vagrant')

```
$ vagrant up
$ vagrant ssh
$ cd /vagrant/webroot
```

Checkout the CBN application into the 'webroot' directory

### Install Composer
```
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

### Run Composer
```
$ php /usr/local/bin/composer install
OR
$ php composer install
```

### Setup timezone
```
sudo vi /etc/php5/apache2/php.ini
```
Search for date.timezone - uncomment it and change the line to
```
date.timezone = "Europe/London"
```

The application should now attempt to load at http://localhost:8888.
It should fail as it can't find the database


### Database
Goto http://localhost:8888/phpmyadmin
Create a new database named 'app'
In the SSH command line, run:
```
php artisan migrate
```
This should create all the tables for the app, which should then be visible at http://localhost:8888


### For static assets
```
sudo apt-get install ruby-rvm
rvm install ruby-1.9.3-p484
sudo gem install bundler
bundle install
```

Grunt
```
sudo apt-get install npm
npm config set registry http://registry.npmjs.org/
sudo npm cache clean -f
sudo npm install -g n
sudo n stable
sudo npm install
sudo npm install -g grunt-cli
grunt watch
```

=====

Install GIT

#### Install AWS

USE download link from http://aws.amazon.com/code/6752709412171743 as LINKSPACE

```
wget --quiet LINKSPACE
unzip -qq AWS-ElasticBeanstalk-CLI-*.zip
sudo mkdir /usr/local/aws
sudo rsync -a --no-o --no-g AWS-ElasticBeanstalk-CLI-*/ /usr/local/aws/elasticbeanstalk/
sudo export PATH=$PATH:/usr/local/aws/elastcibeanstalk/eb/linux/python2.7/
```

Push to AWS





===

http://localhost:8888   - homepage

phpmyadmin: http://localhost:8888/phpmyadmin

username: root
password: root





