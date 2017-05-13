# Blblog
Blblog is a minimalist blog using just markdown files. It is strongly inspired by [Telegra.ph](https://telegra.ph), [Medium](https://medium.com) or [Hexo](https://hexo.io).
This project has been created for a personnal usage, but you are welcome to make this project better!
## How to install?
Simply use
`git clone https://github.com/Donokami/Blblog.md.git .` in `/var/www/html/` (or any webserver root) or [download here](https://github.com/Donokami/Blblog.md/archive/master.zip) the archive and extract into you webserver root.
### On Apache2
You will need to enable the Module rewrite, by using `sudo a2enmod rewrite`.
If the url rewriting doesn't works, this is probably due to your configuration of Apache2 ; to correct this, edit your `apache2.conf` file in `/etc/apache2` (on linux based distros) and replace any `AllowOverride None` to `AllowOverride All`.
### On Nginx
Replace `/etc/nginx/sites-available/` by [this configuration](https://gist.github.com/Donokami/363712db9023cbeb72d61312ca07db56),
Then restart Nginx using
```
nginx -t
nginx -s reload
```
## Configuration
You must configure the `./include/Config.php` file according to your own web server and the data of your future blog (read the comments for more help).
Also, replace `./assets/img/static/bg.jpg` & `./assets/img/meta/cover.jpg` by yours own assets

## How to write an article?
Create a new file in articles folder, like `wow.md`. The .md is really important, if the extension isn't here, your file won't be read.
Now, in your file, you need to write an header, like this:
```
title: Hey, Read me !
desc: Here is the description of the article, where you can write some informations.
author: Kiyoshi
cover: assets/img/articles/readme_cover.png //(Optional) It can be either a file or an url.
tags: configuration blblog markdown php //(Optional)
---
_Here is the content of _your article_
```
And that is all !
