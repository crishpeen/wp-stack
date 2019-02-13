#!/usr/bin/env sh

# This script is to be executed when the docker container is started


# Set UID of user docker-container-user on guest to match the UID of the user on the host machine
usermod -u $(stat -c "%u" $1) docker-container-user
# Set GID of group docker-container-user on guest to match the GID of the users primary group on the host machine
groupmod -g $(stat -c "%g" $1) docker-container-user

# Allow user docker-container-user to log in to use development tools
usermod -s /bin/bash docker-container-user

# Make homedir of docker-container-user writable for docker-container-user user for usage by development tool caches etc.
chown -R docker-container-user: /var/www
