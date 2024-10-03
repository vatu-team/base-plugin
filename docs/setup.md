# Setup a fresh base plugin

[Download](https://github.com/vatu-team/base-plugin/archive/refs/heads/trunk.zip) project from Github and extract into your project, changing the name for the plugin directory and bootstrap file to match your new plugin slug.

## Modify the plugin files

### Find and Replace:

- `Vatu\Wordpress\Plugin\Client\BasePlugin` – `Vatu\Wordpress\Plugin\{ClientName}\{PluginName}`
- `Client\BasePlugin` – `{ClientName}\{PluginName}`
- `base-plugin` – `{plugin-name}`
- `Base Plugin` – `{Plugin Name}`

## Modify the root project files

The following should be actioned within the project's root config files.
_(Not the new plugin's config files.)_

### Git

- include the plugin in git `.gitignore` excludes list `!/public/app/plugins/{plugin-name}`

### Composer:

- `composer require thoughtsideas/wp-infrastructure` _to be changed to `vatu/wp-infrastructure` in the future_
- Add Autoload to PSR-4 `"{ClientName}\\{PluginName}\\": "public/app/plugins/{plugin-name}/src/"`
- Add Autoload Dev as PSR-4  ` "{ClientName}\\Tests\\Unit\\": "public/app/plugins/{plugin-name}/tests/php/Unit/"`
- Run `composer autoload-dump`
- Add plugin directory to parallel lint test script
- Add plugin directory to phpcs test script
- Add plugin directory to phpcbf test script


### PHP Unit
- Add the Unit Test directory to the `unit` test suite
- Add the `src` directory to include test coverage

### Static Analysis
- Add `public/app/plugins/{plugin-name}/` to `paths`.

### NPM Packages
- `npm install @wordpress/compose @wordpress/create-block @wordpress/plugins @wordpress/scripts`
