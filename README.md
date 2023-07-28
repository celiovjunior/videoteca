<h1 align="center">🎥 Videoteca 🎥</h1>

> *Status: in development*.

## About

Web app where the user can **create**, **read**, **update** and **delete** their favorite videos from Youtube.<br>

## Main tools

- [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [PHP](https://www.php.net/docs.php) ```^8.0```
- [SQLite](https://www.php.net/manual/en/book.sqlite3.php) ```^3.0```

## User actions

- Can login;
- Can register a new video;
- Can update/edit video details;
- Can delete a video;
- Can se the list of registered videos.

## Features to be added

- [x] Login/authentication feature;
- [ ] Sign Up feature;
- [ ] Dockerize the project;

## Running locally

> Before install the project, make sure you have PHP, Node, GIT and Composer already installed in your computer.

In your preferable terminal, follow the instructions below:

```bash
# 1: clone the repository
git clone git@github.com:celiovjunior/videoteca.git

# 2: install dependencies
composer install

# 3: start the project
php -S localhost:8000 -public
```

Project will run at http://localhost:8000
