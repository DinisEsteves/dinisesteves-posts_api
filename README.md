## Project Initialization

This repo includes scripts to build and preview the contents of this repository.

To build and preview the project, run:

* Clone this repository:
```
$ git clone ...
```
* Create your .env file and setup your database connection:
```
$ cp .env.example .env
```
* Install all composer dependencies:
```
$ composer install
```
* Run the laravel sail:
```
$ sail up -d
```
The result will be available at http://localhost.

## API Example

Testing api post method.

* Signin endpoint sendind a post with user_email and password: http://localhost/api/v1/auth/signin , this will return an acess token.


* http://localhost/api/v1/posts?posts_per_page=5&post_status=draft You have to send you Bearer token returned from signin endpoint in authorization header.




