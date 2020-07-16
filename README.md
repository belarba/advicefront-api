# Book Repository API

Test application for the position of Backend developer at Advicefront
(https://advicefront.com)

This API is running on the PHP Slim framework (http://www.slimframework.com/).

It returns information about a resource named `Book`. Each book has the following attributes:

```
id
title
isbn
coverUrl
description
```

The API is incomplete and has some conceptual errors. Can you find them?

### List Books

Requests can be made directly to the `/books` endpoint via a GET request.
You can also send a parameter `title` to filter the books you receive based on their title. (`/books?title=Action`)

### View one Book

To receive information about one single book, make a GET request to `/books/{id}` where `{id}` is the ID of the book you wish to read on.

### How to run

Minimum Requirements: PHP 7.2


After you have cloned the repository to your local environment, install all the needed packages with composer running:

```bash
cd advicefront-be-test
composer install
```

To run the application in development, you can run these commands 

```bash
composer start
```

Open `http://localhost:8080` in your browser.

That's it!

Good luck!
