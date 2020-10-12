# FROM debian:latest
FROM debian:stable-slim
# FROM alpine:latest

LABEL maintainer="MattsShack <mattsshack@gmail.com>"

#region Settings
ARG localconfig=/dockerimageconfigs/
ARG buildconfig=/build/

ARG nginxpath=/etc/nginx/

ARG htmldefault=/var/www/html/
ARG htmlbackup=${htmldefault}backup/
#endregion

# --- Debian ---
#region Install Required software packages
RUN apt-get update -y
RUN apt-get upgrade -y

# RUN apt-get install dialog -y
# RUN apt-get install apt-utils -y

RUN apt-get install nginx -y
RUN apt-get install php-fpm -y
RUN apt-get install php-xml -y

RUN apt-get install supervisor -y

# RUN apt-get install git -y
# RUN apt-get install nano -y
# RUN apt-get install python3 -y
#endregion

# # --- Alpine/Ubuntu ---
# #region Install Required software packages
# RUN apk update 
# RUN apk upgrade

# # RUN apk add dialog
# # RUN apk add apt-utils

# RUN apk add nginx
# RUN apk add php-fpm
# RUN apk add php-xml

# RUN apk add supervisor

# # RUN apk add git
# # RUN apk add nano
# # RUN apk add python3
# #endregion

#region Setup PHP with NGINX
WORKDIR ${nginxpath}/sites-enabled/

# RUN mv default default.old
RUN rm default
COPY ${localconfig}${nginxpath}/sites-enabled/default ${nginxpath}/sites-enabled/default

# RUN sed -i "s|index index.html index.htm index.nginx-debian.html;|index index.html index.htm index.nginx-debian.html index.php; |g" /etc/nginx/sites-enabled/default

# RUN sed -i "s|`#location ~ \.php$ {| location ~ \.php$ { |g" /etc/nginx/sites-enabled/default
# RUN sed -i "s|`#include snippets/fastcgi-php.conf;| include snippets/fastcgi-php.conf; |g" /etc/nginx/sites-enabled/default
# RUN sed -i "s|`#fastcgi_pass unix:/run/php/php7.3-fpm.sock;| fastcgi_pass unix:/run/php/php7.3-fpm.sock; |g" /etc/nginx/sites-enabled/default
# RUN sed -i "s|`#} | } |g" /etc/nginx/sites-enabled/default
#endregion

#region Setup PHP information file.
RUN mkdir -p ${htmlbackup}
WORKDIR ${htmlbackup}
RUN mv ${htmldefault}/index.nginx-debian.html ${htmlbackup}/index.nginx-debian.html

RUN cp index.nginx-debian.html index.html
RUN cp index.nginx-debian.html index.php
RUN sed -i '1s/^/<?php echo phpinfo(); ?>\n/' index.php
#endregion

#region Increase NGINX File Size Limitation
    # By default NGINX limits the file size you can upload (I think it defaults to 1MB). I recommend increasing the allowed file size so you can upload larger custom images.
    # sudo nano /etc/nginx/nginx.conf

    # - add the follow in the http section after types_hash_max_size 2048;
    # client_max_body_size 25M;

COPY ${localconfig}${nginxpath}/nginx.conf ${nginxpath}/nginx.conf
#endregion

#region Increase PHP upload_max_filesize
    # - Change upload_max_filesize (Around line 845)
    # upload_max_filesize = 25M

RUN sed -i "s|upload_max_filesize = 2M|upload_max_filesize = 25M|g" /etc/php/7.3/fpm/php.ini
#endregion

#region Install Plex Movie Poster Display
    # Get Code from GitHub
    # cd /your_preferred_directory
    # sudo git clone https://github.com/MattsShack/Plex-Movie-Poster-Display.git
    # cd Plex-Movie-Poster-Display
    # sudo cp -R * /var/www/html
    #   - You can replace index.php used for in the testing above.

COPY /app/ ${htmldefault}

# Restore Pre Existing Config
RUN rm ${htmldefault}/config.php
ADD _backupConfig/config.php ${htmldefault}/config.php

# Permissions
# sudo chmod -R 774 /var/www/html/
RUN chmod -R 774 ${htmldefault}

# sudo chown -R pi:www-data /var/www/html/
RUN chown -R root:www-data ${htmldefault}
#endregion

#endregion

#region RUNNER
WORKDIR /home/
# service php7.3-fpm start

# CMD ["nginx", "-g", "daemon off;"]

COPY ${localconfig}/start.sh start.sh
COPY ${buildconfig}/Setup.sh Setup.sh
CMD ["/bin/bash","start.sh"]
#endregion

#TODO:
# - Move/redirect config file to volume
# - Request/add import/export of config file