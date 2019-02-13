FROM            php:7.1-fpm

RUN             useradd -d /var/www -s /bin/bash docker-container-user

########################
# Install dependencies #
########################

#prod
RUN             docker-php-ext-install mysqli
RUN             pecl install xdebug

# dev
RUN             apt-get update && apt-get install -y \
                    git \
                    zlib1g-dev \
                    mysql-client \
                    gnupg
RUN             docker-php-ext-install zip


###############################
# Composer, Npm, Gulp #
###############################
RUN             curl -sS https://getcomposer.org/installer | php
RUN             mv composer.phar /usr/local/bin/composer
RUN             curl --silent --location https://deb.nodesource.com/setup_8.x | bash -
RUN             apt-get install -y git nodejs
RUN             npm install -g gulp-cli


####################
# Add config files #
####################
COPY            ./php.ini /usr/local/etc/php/php.ini
COPY            ./init-container.sh /root/init-container.sh


#######
# Run #
#######
CMD             bash /root/init-container.sh /www && php-fpm
