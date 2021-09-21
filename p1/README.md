# Project 1 
+ By: *Rose Mikan*
+ [URL:](http://e2p1.metrognome.me)
> ## 5x5 Go!
> Basic PHP game simulator inspired by my childhood favorite board game 'Snakes and Ladders'*

## Game planning

## Outside resources

## Notes for instructor
- Link file paths with the subdomain, specifically an image, no display with the following url configurations:
+ e2p1.metrognome.me/public_html
+ e2p1.metrognome.me/public_html/var/www/
+ e2p1.metrognome.me/public_html/var/www/e2/p1/
+ e2p1.metrognome.me/public_html/var/www/e2p1/
+ e2p1.metrognome.me/var/www/
+ e2p1.metrognome.me/e2/p1/
+ metrognome.me/public_html/e2/p1/
+ metrognome.me/public_html/var/www/e2/p1/
+ metrognome.me/var/www/e2/p1/
+ metrognome.me/e2/p1/

have resulted in just seeing the image in the browser. I realize that php is not client side, but ordinarily I can see an image that is on the server.
I have also worked in terminal using ls -la and setting permissions, only to remove all permissions for my test image that I have included with index-view.php. So I replaced them and they reverted. 
Command Line permissions now:
```bat
root@hes:/var/www# ls
e2  html
root@hes:/var/www# cd e2
root@hes:/var/www/e2# ls
README.md  p1  practice
root@hes:/var/www/e2# cd p1
root@hes:/var/www/e2/p1# ls -a
.                                               index-view.php
..                                              index.php
5x5_forward-backward_game_ai-vector-visual.png  sketch1idea_IMG-3446.jpg
5x5_forward-backward_game_visual.png            sketch2plan_IMG-3447.jpg
README.md
root@hes:/var/www/e2/p1# ls -la
total 3028
drwxr-xr-x 2 root root    4096 Sep 21 20:11 .
drwxr-xr-x 5 root root    4096 Sep 18 21:38 ..
-rw-r--r-- 1 root root   45444 Sep 20 18:26 5x5_forward-backward_game_ai-vector-visual.png
-rw-r--r-- 1 root root   37251 Sep 20 17:53 5x5_forward-backward_game_visual.png
-rw-r--r-- 1 root root    1788 Sep 21 20:48 README.md
-rw-r--r-- 1 root root     520 Sep 21 20:22 index-view.php
-rw-r--r-- 1 root root      46 Sep 18 22:13 index.php
-rw-r--r-- 1 root root  511530 Sep 21 20:11 sketch1idea_IMG-3446.jpg
-rw-r--r-- 1 root root 2474030 Sep 21 20:11 sketch2plan_IMG-3447.jpg
root@hes:/var/www/e2/p1# 
```

Please clarify a path that works. These are three images in the e2p1 subdomain:
- Pencil sketch: [idea:] (http://e2p1.metrognome.me/public_html/e2/p1/sketch1idea_IMG-3446.jpg), [planning:] (http://e2p1.metrognome.me/public_html/e2/p1/sketch2plan_IMG-3447.jpg)
- Vector sketch:[design:] (http://e2p1.metrognome.me/public_html/e2/p1/5x5_forward-backward_game_ai-vector-visual.png)

> I have included a test link to the image within the html code of the index-view.php that so far has not displayed an image.
```html
<img src="http://e2p1.metrognome.me/e2/p1/sketch1idea_IMG-3446.jpg" alt="">
```

Most recently I have tried relative directory variations such as what is there now:

'''html
<img src='../../e2/p1/sketch1idea_IMG-3446.jpg' width='1080' height='810' alt="">
```