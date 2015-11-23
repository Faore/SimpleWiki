# SimpleWiki

This project was a very barebones wiki developed on top of a lot of open source software for CSCI 215 Ethical Issues in Computer Science by Chris Thomas. The application is built mainly upon the Laravel framework, using Parsedown to parse pages inputted by the user in Markdown. The front end uses Twitter Bootstrap, and Lumen, a theme for Bootstrap. From there, the application layout was heavily customized with my own CSS changes using SASS, an extension language for easily writing and compiling CSS. While there are several other open source projects that played roles in the creation of this application, it would take forever to list them all.

This is not a production-worthy wiki and was intended as a simple class project.

## Installation

This application is built on the [PHP programming language](http://php.net/), with a component written in Ruby. PHP will be needed to run any part of the application. Ruby will only be needed if recompiling CSS. This guide assumes you can setup PHP for use on a command line.

Laravel, and this application rely on several dependencies that will need to be installed with [Composer](https://getcomposer.org/), a PHP package manager similar to NPM, or RubyGems.

From the command line, clone this repository
``` bash
$ git clone https://www.github.com/Faore/SimpleWiki.git
```
Change to the root of the project and install all the dependencies for the application.
``` bash
$ cd ./SimpleWiki
$ composer install
```
For simple viewing, the application is setup with defaults out of the box that do not require an external MySQL server, or an external webserver to operate. For the purpose of evaluation, this works fine. The application is also preloaded with pages for demonstration in the file-based database. To use the built-in server, and existing database run this command:
``` bash
$ php artisan serve
```
If all goes well, you will have the full wiki application running at http://localhost:8000 which you can use and edit.

If you want to start with an empty application, press Ctrl+C to stop the development server. This command will rebuild the database and fill it with empty content.
``` bash
$ php artisan migrate:refresh
```

Since this application is heavily built on the Laravel Framework, the entirety of the Laravel documentation applies to this application. The config directory, in particular is where application settings can be changed to suit different deployments including MySQL server configuration. You can find all that [here](http://www.laravel.com). The application can be served up using Nginx or Apache as a real web server with the document root set as the public folder. Make sure the application is only served at the root of a domain or subdomain as it relies on relative links.

## Application Architecture
