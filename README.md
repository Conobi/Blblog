# Blblog
Blblog is a minimalist blog using just markdown files. It is strongly inspired by [Telegra.ph](https://telegra.ph), [Medium](https://medium.com) or [Hexo](https://hexo.io).
This project has been created for a personnal usage, but you are welcome to make this project better!
## How to install?
Simply use 
`git clone https://github.com/Donokami/Blblog.md.git` or [download here](https://github.com/Donokami/Blblog.md/archive/master.zip) the archive and extract into you web server root.

## Configuration
You must configure the `./include/Config.php` file according to your own web server and the data of your future blog (read the comments for more help).
Also, replace `./assets/img/static/bg.jpg` & `./assets/img/meta/cover.jpg` by yours own assets

## How to write an article?
Create a new file in articles folder, like `wow.md`. The .md is really important, if the extension isn't here, your file won't be read.  
Now, in your file, you need to write an header, like this:
```
title: Hey, Read me !
desc: Here is the description of the article, where you can write some informations.
author: Kiyoshi`
cover: assets/img/author/bg.jpg //(Optional) It can be either a file or an url.
tags: configuration blblog markdown php //(Optional)
---
Here is the content of _your article_
```
And that is all !

## To do
- [ ] Add custom configuration for nginx and apache
- [ ] Support for favicons
- [ ] Parallax cover in article page
- [ ] Menu buttons
