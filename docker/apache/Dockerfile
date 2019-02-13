FROM            php:7.1-apache


####################
# Configure Apache #
####################
RUN             rm /etc/apache2/sites-enabled/000-default.conf \
                && ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled \
                && docker-php-ext-install mysqli \
                && apt-get update \
                && apt-get install -y \
                    git \
                    libfreetype6 \
                    libicu-dev \
                    libjpeg-dev \
                    libpng-dev \
                && docker-php-ext-configure gd --with-jpeg-dir=/usr/ \
                && docker-php-ext-install gd
COPY            ./apache.vhost /etc/apache2/sites-enabled/docker.conf
COPY            ./init-container.sh /root/init-container.sh


#######
# Run #
#######
CMD             bash /root/init-container.sh /www && apache2-foreground
