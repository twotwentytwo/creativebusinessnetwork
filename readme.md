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
Login details

```
username: root
password: root
```

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
```
If there was an error (on windows) run this instead
```
sudo npm install --no-bin-links
```

```
sudo npm install -g grunt-cli
grunt
```

=====

Install GIT

#### Install AWS

USE download link from http://aws.amazon.com/code/6752709412171743 as LINKSPACE

```
wget --quiet LINKSPACE
sudo apt-get install unzip
unzip -qq AWS-ElasticBeanstalk-CLI-*.zip
sudo cp AWS-ElasticBeanstalk-CLI-*/ /aws -r
export PATH=$PATH:/aws/eb/linux/python2.7/
rm -rf AWS-ElasticBeanstalk-CLI-*
sudo chmod -R 777 /aws
```
Logout of the SSH box, and login again

Navigate to /vagrant

Ensure you are already logged into the account at https://cbn.signin.aws.amazon.com/console

Visit https://aws-portal.amazon.com/gp/aws/securityCredentials and download the Access key and ID from users -> user -> Security credentials.
Create a file at

```
/home/vagrant/.elasticbeanstalk/aws_credential_file
```
It should contain the following
```
AWSAccessKeyId=AAAAACCCCESSKEYIDAAA
AWSSecretKey=SSSSSSSECRETKEYFROMYOURDOWNLOAD
```

#### Install Python
```
sudo apt-get install python-pip
sudo pip install boto
export PYTHONPATH=/usr/local/lib/python2.7/site-packages
```

#### Push changes
```
eb push
```

===
## Useful Credentials

http://localhost:8888   - homepage

phpmyadmin: http://localhost:8888/phpmyadmin

username: root
password: root





