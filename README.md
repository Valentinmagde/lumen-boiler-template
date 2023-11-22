Beachcomber API
===============

Beachcomber API v2 on Lumen 

Installation
============

## Prerequisites

- PHP >= 8.0.
- OpenSSL PHP Extension.
- PDO PHP Extension.
- Mbstring PHP Extension

## VS code

- Follow the following link to install vscode onto your platform:
[vscode install](https://code.visualstudio.com/download)

- Then go to the `Extensions` of your IDE (can be found on the left) and install the following:

 Extension  | Documentation
:----------------|:-------------
 GitBlame        | [GitBlame](https://marketplace.visualstudio.com/items?itemName=waderyan.gitblame)
 GitLens         | [GitLens](https://marketplace.visualstudio.com/items?itemName=eamodio.gitlens)
 GitHistory      | [GitHistory](https://marketplace.visualstudio.com/items?itemName=donjayamanne.githistory)
 Coverage Gutters| [CoverageGutters](https://marketplace.visualstudio.com/items?itemName=ryanluker.vscode-coverage-gutters)
 phpcs           | [phpcs](https://marketplace.visualstudio.com/items?itemName=shevaua.phpcs)

## Install Dependencies

write on `terminal` the following command:
```bash
     composer install
```
Serving Your Application
========================

write on terminal the following command:
```bash
     php -S localhost:8000 -t public
```
Configuration
=============

`DotEnv` [DotEnv](https://github.com/vlucas/phpdotenv) is used for setting up environment variables.
- `.env` file is in gitignore and therefore you need to create it in your root directory.
- Then copy and paste the data in your `.env.example` file into your .env.
- Modify the variables according to your required environement variables.

### Change environment

- Set the `APP_ENV` to either local', 'testing' or 'development'
- When the application will start, the `.env` file corresponding to your set `APP_ENV` will be loaded ovewriting existing environment variables in `.env`

Official Lumen Documentation
============================

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).
