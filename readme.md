# Base Plugin

[![Commit](https://github.com/vatu-team/base-plugin/actions/workflows/commit.yml/badge.svg)](https://github.com/vatu-team/base-plugin/actions/workflows/commit.yml)

## Introduction

I'm a 'base plugin' template to be used to build custom plugins from.
I'm a living project, not to be used as a dependency for your plugin.

My core principles are:

- Keep It Simple
- Object Oriented PHP with features built as Services
- Limited build tools based upon WordPress Scripts
- Vanilla CSS
- Vanilla JS

## [Documentation](https://github.com/vatu-team/base-plugin/blob/trunk/docs/index.md)

### Directory Structure

The aim of the directory structure for this plugin is to keep everything well-organized.

```
├── .github
├── assets
│   ├── css
│   ├── fonts
│   │── js
│   └── svg
├── build
├── src
│   ├── Application
│   ├── Domain
│   ├── Infrastructure
│   │── Plugin.php
│   └── PluginFactory.php
├── tests
├── tools
├── vendor
├── package.json
└── composer.json
```

- `/.github/`
- `/assets/` Compiled assets such as CSS, Fonts, JavaScript, and SVG.
- `/build/` Compiled block assets.
- `/src/`
  - `/src/Application/` Exposes the functionality of the domain to other application layers as hooks and filters (an API).
  - `/src/Domain/` Modules of code based upon the business needs
    - `/src/Domain/Service` A layer which aims to organize the services ito a set of logical layers. Services within a layer share a smilar set of activities.
      - `/src/Domain/Service/Prover.php`
      - `/src/Domain/Service/Service.php`
  - `/src/Infrastructure/`
  - `/src/Plugin.php` This file is respobnsible for loading and instantiating one or more `ServiceProvider` objects.
  - `/src/PluginFactory.php`
- `/tests/` Project tests and configutation related to testing the projects.
- `/tools/` Development tools not specific to the project.
- `/base-plugin.php` Bootstrap file for WordPress to load.
- `/composer.json` Configuration for our PHP dependencies.
- `/package.json` Configuration for our Node/NPM dependencies.

### Service Provider

Is a collection of services grouped by responsibility. This can be thought of as similar to a plugin with the exception that a plugin can contain more than one Service Provider. For example we might have a `UsersProvider` that is tasked with initializing services that relate to the WordPress User post type.

Services are added to the Provider via the Service Collection array:

```php
protected array $service_collection = [
	ExampleOne::class,
	ExampleTwo::class,
];
```

### Service Structure

A service is a grouping of functionality. An example of a `Service` could include the methods for handling a Form submission along side functionality it needs such as requirement checks, validation, and error handling.

Services can run hooks upon Registration by `implements Registrable`.
This requires a `register()` method be used when WordPress actions and fillters can be added.

## Base Plugin Development

### Install

```sh
npm install && composer install
```

### Development

- `npm run start` – Watch and compiles the blocks
- `npm run build` – Build a production ready instance of the blocks

## Test

Build a test instance of WordPress to test this theme.

- `npm run wp-env start` – Start the development environment
- `npm run wp-env start -- --xdebug` – Start the development environment with xDebug configured
- `npm run wp-env stop` – Stop the development environment
- `npm run wp-env distroy` – Distroy the development environment
