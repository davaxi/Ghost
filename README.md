# Ghost
A PHP client library for accessing Ghost's APIs

[![Latest Stable Version](https://poser.pugx.org/davaxi/ghost/v/stable)](https://packagist.org/packages/davaxi/ghost)
[![Total Downloads](https://poser.pugx.org/davaxi/ghost/downloads)](https://packagist.org/packages/davaxi/ghost)
[![Latest Unstable Version](https://poser.pugx.org/davaxi/ghost/v/unstable)](https://packagist.org/packages/davaxi/ghost)
[![License](https://poser.pugx.org/davaxi/ghost/license)](https://packagist.org/packages/davaxi/ghost)

## Installation

This page contains information about installing the Library for PHP.

### Requirements

- PHP version 7.0.0 or greater
- The Curl PHP extension
- The Json PHP extension

#### Using Composer

You can install the library by adding it as a dependency to your composer.json.

```shell
$ composer require davaxi/ghost
```

or

```json
{
  "require": {
    "davaxi/ghost": "^1.0"
  }
}
```

## Usage

### Configure client authentication

Use official documentation for create tokens : https://ghost.org/docs/content-api/

#### Use environment to set credentials

Replace with your values

```dotenv
GHOST_API_URL=XXXXXX
GHOST_ADMIN_API_KEY=YYYYYY
GHOST_CONTENT_API_KEY=ZZZZZZZ
```

In your PHP

```php
<?php

$client = new Davaxi\Ghost\Client();
$client->loadFromEnvironment();

```

#### Set directly credentials

In your PHP

```php
<?php

$client = new Davaxi\Ghost\Client();
$client->setApiUrl('YOUR_GHOST_API_URL');

// If you are using Admin APIs
$client->setAdminApiKey('YOUR_ADMIN_API_KEY');

// If you are using Content APIs
$client->setContentApiKey('YOUR_CONTENT_API_KEY');

```

## Documentation

### Ghost Admin APIs

#### Posts
```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\AdminApi\Posts($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('POST_ID');
$response = $service->findBySlug('POST_SLUG');
$response = $service->create(['YOUR_POSTS_DATA']);
$response = $service->createOne(['YOUR_POST_DATA']);
$response = $service->update('POST_ID', ['YOUR_POST_DATA']);
$response = $service->delete('POST_ID');
```

#### Pages
```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\AdminApi\Pages($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('PAGES_ID');
$response = $service->findBySlug('PAGES_SLUG');
$response = $service->create(['YOUR_PAGES_DATA']);
$response = $service->createOne(['YOUR_PAGES_DATA']);
$response = $service->update('PAGE_ID', ['YOUR_PAGE_DATA']);
$response = $service->delete('PAGE_ID');
```


#### Tags
```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\AdminApi\Tags($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('TAGS_ID');
$response = $service->findBySlug('TAGS_SLUG');
$response = $service->create(['YOUR_TAGS_DATA']);
$response = $service->createOne(['YOUR_TAGS_DATA']);
$response = $service->update('TAG_ID', ['YOUR_TAG_DATA']);
$response = $service->delete('TAG_ID');
```

#### Webhooks
```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\AdminApi\Webhooks($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('WEBHOOKS_ID');
$response = $service->findBySlug('WEBHOOKS_SLUG');
$response = $service->create(['YOUR_WEBHOOKS_DATA']);
$response = $service->createOne(['YOUR_WEBHOOKS_DATA']);
$response = $service->update('WEBHOOK_ID', ['YOUR_WEBHOOK_DATA']);
$response = $service->delete('WEBHOOK_ID');
```

#### Themes
```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\AdminApi\Themes($client);
$response = $service->upload('path/to/your/theme/zip/file');
$response = $service->activate('YOUR_THEME_NAME');
```

#### Images
```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\AdminApi\Images($client);
$response = $service->upload('path/to/your/image/file');
```

#### Site
```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\AdminApi\Site($client);
$response = $service->get();
```

### Ghost Content APIs

#### Posts

```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\ContentApi\Posts($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('POST_ID');
$response = $service->findBySlug('POST_SLUG');
```

#### Pages

```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\ContentApi\Pages($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('PAGE_ID');
$response = $service->findBySlug('PAGE_SLUG');
```

#### Authors

```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\ContentApi\Authors($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('AUTHOR_ID');
$response = $service->findBySlug('AUTHOR_SLUG');
```

#### Tags

```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\ContentApi\Tags($client);
$response = $service->find(['YOUR_PARAMS']);
$response = $service->findById('TAG_ID');
$response = $service->findBySlug('TAG_SLUG');
```

#### Settings

```php
<?php

$client = new Davaxi\Ghost\Client();

// ...

$service = new Davaxi\Ghost\Service\ContentApi\Settings($client);
$response = $service->get();
```