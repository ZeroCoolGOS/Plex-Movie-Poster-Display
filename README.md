# Plex Movie Poster Display
Scraps the Plex sessions page to display the current playing movie or TV show poster on a screen.

Disclaimer – I am a network engineer not a programmer. I play around with code. I am publishing this to give back to the communities that has helped me learn. There may be better ways of scraping the Plex Posters, but this is the way I chose to do it. I am open to suggestions. Use at your own risk.

I decided to rewrite the program in PHP and make it browser based. This allows me to have the Raspberry Pi boot to the desktop, automatically start a browser in kiosk mode, and open the PHP site.

This script scraps http://IP_ADDRESS_OF_PLEX_SERVER>:32400/status/sessions for clients and displays the poster of the currently playing movie or TV show. If nothing is currently playing it will pull a random poster of an unwatched movie.

## My Setup
Plex Media Server is running on a dedicated server.
Plex Movie Poster Display is running on separate Raspberry Pi 3 connected to a screen via HDMI. On boot up the Pi launches Chromium in kiosk mode and loads the Plex Movie Poster Display URL.

## Help
https://www.mattsshack.com/plex-movie-poster-display/


## Local Installation

### **PMPD Installation**
<p>
<blockquote>
Sorry, there is no upgrade path from PMPD version 1 to version 2. There
 are just to many changes. Please backup your PMPD directory and 
install fresh.
</blockquote><p>

Download and install Raspbian Buster with desktop onto SD card.
(This is outside the scope of the how-to. If you need help please follow the installation instructions [here](https://www.raspberrypi.org/documentation/installation/installing-images/).)

To enable ssh you will need to create a blank file called ‘ssh’ on the SD Card before installing it into you Raspberry Pi.

To enable wireless and ssh on your Raspberry Pi without a monitor, check out my howto [here](https://www.mattsshack.com/headless-raspbian-setup/).

_**Note:** I recommend changing the default Raspberry Pi password before continuing._

_Install Required software packages:_

    sudo apt update && sudo apt upgrade -y
    sudo apt-get install nginx php-fpm php-xml git unclutter -y

### **Setup PHP with NGINX**

    cd /etc/nginx
    sudo nano sites-enabled/default
<p>

- Add `index.php` to line with `index index.html index.htm index.nginx-debian.html;`
    _(Around line 44)_

Scroll Down, uncomment the following lines, and save the file.

    location ~ \.php$ {
      include snippets/fastcgi-php.conf;
      fastcgi_pass unix:/run/php/php7.3-fpm.sock;
    }

Setup PHP information file:

    cd /var/www/html/
    sudo mv index.nginx-debian.html index.php
    sudo nano index.php
- Add `<?php echo phpinfo(); ?>` to top of the file.
- Save file.

Restart / Start NGINX and Test

    sudo /etc/init.d/nginx reload

Opening a browser to http://<ip_address_of_your_raspberry_pi> . If everything is installed correctly. you should see the php information screen similar to this ( PHP 7.3.4-2 has been tested and works ).


Example PHP Info Page:
![](documentation\phpinfo-example.png)

_Increase NGINX File Size Limitation_

By default NGINX limits the file size you can upload (I think it defaults to 1MB). I recommend increasing the allowed file size so you can upload larger custom images.

    sudo nano /etc/nginx/nginx.conf

- add the follow in the http section after `types_hash_max_size 2048;`\
`client_max_body_size 25M;`

Restart NGINX:

    sudo /etc/init.d/nginx reload

Opening a browser to http://<ip_address_of_your_raspberry_pi> and make sure NGINX is still working properly.

_Increase PHP upload_max_filesize_

    sudo nano /etc/php/7.3/fpm/php.ini

- Change `upload_max_filesize` _(Around line 845)_
`upload_max_filesize = 25M`

- Save File
- Reboot Raspberry Pi (Might not need to reboot, but I had to for change to work).
 
## Install Plex Movie Poster Display

Get Code from GitHub:

    cd /your_preferred_directory 
    sudo git clone https://github.com/MattsShack/Plex-Movie-Poster-Display.git
    cd Plex-Movie-Poster-Display
    sudo cp -R * /var/www/html
    
- You can replace index.php used for in the testing above.
 
Permissions:

    sudo chmod -R 774 /var/www/html/
    sudo chown -R pi:www-data /var/www/html/

First Time Use:

Open Browser to http://<ip_of_raspberry_pi>/admin.php and login with username **_admin_** and password **_password1_**.

Login Page:

![](documentation\login-example.png)


## Chromium Kiosk Mode on Startup

**Pre Raspbian Buster**: Create a .desktop file with the correct configuration to hide the mouse pointer (**needs unclutter installed**), start chromium in kiosk mode, and display posters.

    sudo nano /etc/xdg/autostart/chromium.desktop

    - Add the following to the file:
    
    [Desktop Entry]
    Type=Application
    Exec=/usr/bin/unclutter & /usr/bin/chromium-browser --noerrdialogs --disable-session-crashed-bubble --disable-infobars --kiosk http://IP_ADDRESS_OF_RASPBERRY_PI
    Hidden=false
    X-GNOME-Autostart-enabled=true
    Name[en_US]=AutoChromium
    Name=AutoChromium
    Comment=Start Chromium

- Save File
- Reboot to Test
 
**Raspbian Buster**: After upgrading to Raspbian Buster I was not able to use the .desktop file method to auto start Chromium. Instead I had to create a directory and file. I am not sure if this method needs unclutter installed so I left it in the instructions.

    mkdir -p /home/pi/.config/lxsession/LXDE-pi/
    nano /home/pi/.config/lxsession/LXDE-pi/autostart

    - Add the following:
    
    @chromium-browser --kiosk [PMPD IP Address]

- Save File
- Reboot to Test
 
 ## Raspberry Pi Boot Config Settings -- Use at own risk --

    sudo nano /boot/config.txt
    
    -Remove black border from around screen. Uncomment:
    disable_overscan=1
    
    - Rotate Screen 90 Degrees:
    display_rotate=1
    
    - Remove Raspberry Pi Power Warning:
    avoid_warnings=2
    
    - Fix color depth on Raspberry Pi:
    framebuffer_depth=32
    framebuffer_ignore_alpha=1

## Description Scrolling Example

[![](https://img.youtube.com/vi/7BrXlbvWOo4/0.jpg)](https://www.youtube.com/watch?v=7BrXlbvWOo4)

## Change Logs
**v2 Beta 1**\
PHP7 compatibility.\
Support for multiple Movie Sections.\
Completely new admin page.\
Basic username and password protection of admin page.\
New options for font size and colors.\
New options for font outline size and colors.\
New poster stats and cache clearing.\
New custom image stats and cache clearing.\
New options for multiple custom images uploaded. (Can still only select one for now).\
First try at installation documentation.\

**v2 Beta 2**\
Login page now shows message if username / password does not match.\
New Progress bar for Movies and TV Shows.\
New options for Progress Bar size and colors.\
Add menu to admin page with links to sections.\
Optimized some code. Still need to do more…\

**v2 Beta 3**\
Add custom poster transition timer.\
Changed font size from select to input. (This will allow for a lot more customization.)\
Fixed “Use of undefined constant” error.\
Clean up unused assets.\
More optimization.\

**v2 Beta 4**\
A lot of changes in this release. Prior Beta releases refresh the top, middle, and bottom divs every time the Poster Transition Speed timer expired. This would cause scrolling bottom text to refresh also, cutting off text or causing bad transition. I am working on a solution, but so far I am not happy with it.\
Code optimization:

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;– Movies and TV Show parsing is no longer two different sections.\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;– Rearranged some code.

Add status.php to keeps status / stats of script. Will be used more in the future.\
Add Scrolling bottom text.\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;– Using jquery.marquee and jquery.easing
Move Poster Transition Speed location.\
Change Free space is now shown in GB.\
Logging into admin page and saving config, even without changing anything, will upgrade the config file.

**v2 RC1**\
Recommend a fresh Plex Movie Poster Display install with this release.\
Add Username and Password change to admin page.\
Add change font size and color for bottom text while scrolling is enabled.\
Add Coming Soon selection for UnWatched, All, Recently Added, and Newest.\
Fix more typos.\
Fix clean cache directory error message.\
More optimization.\

**v2 RC2**\
Add no-cache, no-store, must-revalidate options to admin.php page.\
Fix blank image while playing media with no art (Example: Live TV).\

**v2 Final**\
RC2 is now v2 Final.

### Website Changes
**9.16.2019**\
Updated instruction to match Raspbian Buster with desktop.\
Updated Chromium Kiosk Mode on Startup.\
Added PHP 7.3 tested version.\
Fix typos.

**5.6.2019**\
Add Increase NGINX File Size Limitation to page.\
Add Screenshots.\
Fix some Typos.

**5.7.2019**\
More Typos.\
Add Increase PHP upload_max_filesize to page.

**5.10.2019**\
Add unclutter to required software packages. This will hide the mouse.\
Move Raspberry Pi Settings ( Use at own risk ) to Raspberry Pi Boot Config Settings.\
Add Uncomment disable_overscan to Raspberry Pi Boot Config Settings.\
Add Chromium Kiosk Mode How-to|

**5.12.2019**\
Beta 4 Release\
Add jquery.marquee to credits.

**5.13.2019**\
Add Beta 5 Section. Maybe the last beta with new features. Need to move to RC1 and do some polish / optimizations before final 2.0 release.

**5.14.2019**\
Beta 4 now RC1.\
Updated First Time Use section.\
This maybe the final release before the final.

**5.18.2019**\
Update About Section\
Add Description Scrolling Example video.

**5.24.2019**\
Change v2 RC2 to v2 Final.\
Change To Do to v2.1 To Do.\
Add Future To Do.\
Add Ideas for Future Releases.

**5.29.2019**\
Update Ideas for Future Releases

**5.6.2019**\
Add Increase NGINX File Size Limitation to page.\
Add Screenshots.\
Fix setup username / password typo.

**5.7.2019**\
More Typos.\
Add Increase PHP upload_max_filesize to page.

**5.10.2019**\
Add unclutter to required software packages. This will hide the mouse.\
Move Raspberry Pi Settings ( Use at own risk ) to Raspberry Pi Boot Config Settings.\
Add Uncomment disable_overscan to Raspberry Pi Boot Config Settings.\
Add Chromium Kiosk Mode How-to|

**5.12.2019**\
Beta 4 Release\
Add jquery.marquee to credits.

**5.13.2019**\
Add Beta 5 Section. Maybe the last beta with new features. Need to move to RC1 and do some polish / optimizations before final 2.0 release.

**5.14.2019**\
Beta 4 now RC1.\
Updated First Time Use section.\
This maybe the final release before the final.

**5.18.2019**\
Update About Section\
Add Description Scrolling Example video.

**5.24.2019**\
Change v2 RC2 to v2 Final.\
Change To Do to v2.1 To Do.\
Add Future To Do.\
Add Ideas for Future Releases.

**5.29.2019**\
Update Ideas for Future Releases

**v2.1 To Do**\
Font Outline Size and Color for the Bottom Text.\
Installation script for Raspberry Pi.

**Ideas for Future Releases:**\
Art mode.\
Options to display audio and video information.\
Aspect ratio detection / fix (Example 3:2).\
Information from items being played from music section.

**Credits**\
Plex Movie Poster Display is built using Bootstrap , JQuery, Popper.js, jQuery – Marquee and bootstrap-colorpicker. The admin page is based on the Bootstrap “Checkout Example“.

PLEX, PLEX PASS, myPLEX, PLEX MEDIA SERVER, PLEX MEDIA CENTER, PLEX MEDIA MANAGER, PLEX HOME THEATER, PLEX TV, PLEX.TV, the Plex Play Logo (“>” in stylized format) are trademarks that are the exclusive property of Plex, Inc.