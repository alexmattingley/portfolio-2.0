Grizzly Starter Build Part I: Local setup
===========


1. Initial Setup
---

Use one of the following two methods, depending upon whether or not you're starting from scratch or picking up in the middle of a new project. Additional information regarding plugins etc. to come. *Note: you must be using the latest version of composer to support the carat version declaration used by the WordPress install. use `composer self-update` to accomplish this.*

* `cd path/to/your/project/folder`
* `git clone git@bitbucket.org:madebygrizzly/grizzly-starter-build.git ./`
* `composer install`



-or-

* `cd path/to/your/project/folder`
* `git clone git@bitbucket.org:madebygrizzly/[enter project build on Grizzly Core] ./`
* `rm -rf wp-content/vendor`
* `rm composer.lock` (I think)
* `composer install`



2. Cut ties to starter build repo (only applies to new install):
---	
* create new empty BitBucket (or github) remote repo
* making sure you're in the project root, `git remote set-url origin [your new blank remote repo]`
* `rm -rf wp-content/themes/grizzly-theme/.git` and `rm wp-content/themes/grizzly-theme/.gitignore`

3. Update wp-config.php & local-config.php
---
* rename `local-config-sample.php` to `local-config.php`
* add local configuration
* edit `wp-config.php` to reflect other server (can be overridden by using additional local-config.php on dev/stg server if necessary)
* update WordPress Salts ([https://api.wordpress.org/secret-key/1.1/salt/](https://api.wordpress.org/secret-key/1.1/salt/))

4. Update Theme info for client
---
* change name of theme directory 
* update information in `style.css` to reflect client

5. CD to wp-content/themes/[client-theme]:
---
* `npm install`
* `bower install`
* CD to assets/manifest.json, change `http://localdevurl.dev` to your dev url
* `gulp` to compile initial changes and generate a browserSync url
* `gulp watch` to work with the sass
* update the secrets.json file with the staging server and prod server info (only required to use `gulp deploy-xxx` command)
```
"rsyncDest": "serverpilot@xxx.xxx.xxx.xx:apps/{APPNAME}/public/wp-content/themes/{THEMENAME}/dist"
```
*** Note: if hosting on Prod on SiteGround, the `gulp deploy-prod` will require changing `args: ['-azP']` to `args: ['-azP -e "ssh -p 18765"']` in order to work. ***

6. Theme & WordPress Install
---
*On new installs* we need to initialize the Node Package Manager and compile the Bower dependencies. This will require the use of [Bower](http://bower.io/) and [Gulp](http://gulpjs.com/) via [Node Package Manager (NPM)](https://www.npmjs.com/). You will use bower to add new component/plugin libraries to the theme, so it would be good to take a moment to familiarize yourself with them. After the theme is ready to work with, we'll install WordPress and activate the new theme, which will in turn automatically install the required plugins. 

* `cd path/to/wp-content/themes/{THEMENAME}`
* Install Node packages: `npm install`
* Install Bower dependencies: `bower install`
* open up the project in your code editor and edit `assets/manifest.json` to update your local dev URL. e.g.:
```
...
  "config": {
    "devUrl": "http://project-name.dev"
  }
...
```
* Install WordPress using the default world-famous 5-minute install; take care to use an email that is not your regular email. You'll be deleting that user almost immediately. ***DO NOT USE `admin` as your user, and for pete's sake use a strong password. Don't be lazy.***


7. Carry out initial Admin tasks
---
Do this once you've setup WordPress and can access the settings in the admin. 

* Activate {THEMENAME} and install dependencies
* Remove /wp from the Site Address (URL) field. 
* Create another user for yourself
* Delete the user you created on install. 

8. Grab Remote images on local via .htaccess
---
Add following to local .htaccess. (if no .htaccess file exists currently, add one in the project root directory)

```
# ----------------------------------------------------------------------
# BEGIN dev redirect requests for stuff in the uploads dir
# ----------------------------------------------------------------------
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_URI} (/wp-content/uploads/)
RewriteRule ^(.*)$ http://[project-url]/$1 [QSA,L]
# END dev redirect requests for stuff in the uploads dir
```

9. Verify Git functionality/Push to Repo
---
At this point, if you've been working on a fresh build it's time to add & commit everything and push it up to the repo. You should know how to do this, however I will mention that it's important to verify exactly what repo you're pushing to using `git remote -v`. if that URL is not your new repo, ***don't push up***.



Grizzly Starter Build Part II: The Server
===========
Again, this is only really required if this is a fresh build. More details to follow.

1. Set up Dev remote server
--- 

2. Connect Dev server to BitBucket
---
* generate ssh key on dev server - `ssh-keygen -t rsa -b 4096 -C "your_email@example.com"`
* `cat ~/.ssh/id_rsa.pub` and copy the entire key 
* navigate to the repo on BitBucket > Settings > Deploy Keys > Add new key

3. Clone Project repo to the dev server's http_docs or apps/[app name]/public or whatever
---
* `git clone [your project repo address] ./` (note the ./ at the end there – key.)

4. Run Remote WordPress Install as normal
---

5. Git pull to verify that is connecting properly
---