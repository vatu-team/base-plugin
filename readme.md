# Base Plugin

## Introduction

I'm a 'base plugin' template to be used to build custom plugins from.
I'm a living project, not to be used as a dependency for your plugin.

My core principles are:

- Keep It Simple
- Object Oriented PHP with features built as Services
- Limited build tools based upon WordPress Scripts
- Vanilla CSS
- Vanilla JS

## Setup

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
