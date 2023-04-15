# WiiMC-IPTV-Streamer-and-Renderer
A fork of RiiTube in PHP instead of Python CGI scripts and also only containing the IPTV part.

# Why publishing it?
Normally that script was meant for only my private personal use to watch my own IPTV provider. In the beginning i found out how to make a playlist file which it worked successfully. But here was one problem... at the time i still used RiiTube's server for IPTV functionality. Thanks to igel with his USB Gecko, i got the full URL address about RiiTube's streaming IPTV url. I replaced it with one of my IPTV service's stream and it worked. Thankfully, Larsenv updated the RiiTube repository and i could make my own fully server.

# How did you made it into PHP and why?
The reason why i want to make it into PHP is because i never got CGI scripts working, no matter what. So before RiiTube's repository was updated i did the playlist first which i found out that it is plaintext in UTF-8. So i recreated it and added `$url = "http://" . $_SERVER['HTTP_HOST'];` to make the playlist automaticly add the ip address/domain of the server so i wouldn't need to change to a new ip address/domain manually every time. and then for the render script or whatever i should call it i did... and i'm also really honest with you, i did converted that one CGI script that has the ffmpeg command to handle convertion in server-sided with ChatGPT. but i also modifed the converted script myself to remove the Youtube and Vimeo functionality.

# Installation
It is easy to setup your own server so here are the steps you do need:

### Requirements
To make your own instance you need:
- [IMPORTANT] A Linux Server
- a webserver like NGINX (i would recommend to use NGINX)
- PHP
- FFMPEG
- git

NGINX, PHP, FFMPEG and git should be in your Linux distribution's package manager.

### Setup
1. First get a Linux server, you can use any Linux distribution.
2. Install NGINX
3. Install PHP
4. Install FFMPEG
5. install git
6. Setup NGINX to work with PHP, Google is your friend if you don't know how to setup it.
7. git clone this repository on your root of your webserver.

Your webserver should run fine and also modify the stream like:

```
echo "File1=" . $url . "/render/?q=http%3A//example.com/stream/index.m3u8&site=iptv\n";

to

echo "File1=" . $url . "/render/?q=http%3A//yourstream.com/stream/index.m3u8&site=iptv\n"; <-- Your IPTV streaming url
```
to add more stream just make like File1, File2, File3 etc. Same goes to `title` and `Length`. just stay `Length` to `9999999`.

# Watching on WIIMC

To watch it one WIIMC first download WIIMC and WIIMC-SS from the Open Shop Channel and then go to WIIMC's directory and open onlinemedia.xml. add this example line but modify it on your domain of your instance:

```
<folder name="folder name of your instance">
<link name="Example Instance name" addr="http://exampleyourinstance.com/index.php" />
</folder>
```
go to WIIMC and look if it worked if it did then congratulations!!!
