# IovoxBundle
![CI (master)](https://github.com/Yproximite/IovoxBundle/workflows/CI/badge.svg)
![](https://img.shields.io/badge/php->%208.0-blue)
![](https://img.shields.io/badge/Symfony-%20%5E5.3-blue)

## Installation

```console
$ composer require yproximite/iovox-bundle
```

```php
# in config/bundle.php
return [
    ...
    Yproximite\IovoxBundle\IovoxBundle::class => ['all' => true]
    ...
];
```

```yaml
# in config/packages/iovox.yaml
iovox:
  endpoint: endpoint
  username: username
  secure_key: secureKey
```

# Calling
### [SoundFiles](doc/SoundFiles.md)

# Other

* Use in a live repo

In the composer file:
```
"repositories": [
    {
      "type": "path",
      "url": "__YOUR-PATH__/IovoxBundle",
      "options": {
        "symlink": true
      }
    },
]
```
then
```console
$ composer remove yproximite/iovox-bundle
$ composer require yproximite/iovox-bundle:@dev
```
