# Levenshtein-PHP

A well known algorithm is originally made for search services in websites.


## Table of Contents

1. [Usage](#Usage)
1. [Requirements](#requirements)
1. [Development](#development)
    1. [Installing Dependencies](#installing-dependencies)
    1. [Tasks](#tasks)
1. [Contributing](#contributing)

## Usage

> Add a and b strings
> Click on submit
> Check how many operations you need if you choose Levenshtein or Hamming(substitution) methods

## Requirements

- phpunit (https://phpunit.de/getting-started/phpunit-7.html)
- composer (https://getcomposer.org/download/)

## Development
### Open Server
From within the root directory at terminal:

```
php -S localhost:8000 -t app
in browser: http://localhost:8000/openSooq.html
```
### Testing
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/test.php
```

### CLI
```
php -f /Applications/MAMP/htdocs/opensooq/app/calculations.php Issa Anagreh
note: "Issa" and "Anagreh" are changable

```

