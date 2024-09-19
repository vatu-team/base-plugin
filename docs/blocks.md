---
---

# Blocks

## Add a new block

1. Change directory into the service you are adding the block to. Eg, `cd {plugin-path}/src/Domain/{Service}/Blocks`
2. Run the create block script to create a new block. Eg, `npx @wordpress/create-block ${block_slug} --namespace ${project_namespace} --variant dynamic --no-plugin;`
3. Add the block to your projects `package.json`. Eg,
```json
{
  "scripts": {
        "build:scripts:blocks": "run-p \"build:scripts:blocks:{block}\"",
        "build:scripts:blocks:{block}": "wp-scripts build --webpack-src-dir={block-source-path} --output-path={block-output-path}/build",
        "start:scripts:blocks": "run-p \"start:scripts:blocks:{block}\"",
        "start:scripts:blocks:{block}": "wp-scripts build --webpack-src-dir={block-source-path} --output-path={block-output-path}/build"
  }
}
```
4. Run your build script to compile your block. Eg, `npm run build`
5. Add your Block Service. Eg,
```php
<?php
namespace Client\BasePlugin\Domain\ExampleBlocks;

use Client\BasePlugin\Infrastructure\Block;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;

final class ExampleBlock extends Block implements Registrable
{
	protected string $name = 'ExampleBlock';

	/**
	 * @var array<string>
	 */
	protected array $block_path_list = [
		'/example',
	];

  public function register(): void
	{
		add_filter(
			hook_name: '{Client}.{Plugin}.Application.Blocks',
			callback: [ $this, 'registerBlock' ],
			priority: 10,
			accepted_args: 1
		);
	}
}

```
6. Register your Service with your Service Provider. Eg,
```php
<?php
namespace Client\BasePlugin\Domain\ExampleBlocks;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class ExampleBlocksProvider extends ServiceProvider
{
	protected string $identifier = 'ExampleBlocksProvider';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		ExampleBlock::class,
	];
}
```
7. Register the Service Provider with the plugin. Eg,

```php
<?php
namespace Client\BasePlugin;

use ThoughtsIdeas\Wordpress\Infrastructure\Main;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceLocator;

final class Plugin extends ServiceLocator implements Main
{
	protected string $identifier = 'Plugin';

	protected string $name = 'Plugin';

	/**
	 * @var array<string>
	 */
	protected array $provider_collection = [
		Application\ApplicationProvider::class,
		Domain\ExampleProvider::class,
	];
}
```
