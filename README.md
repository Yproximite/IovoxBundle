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

# API
### Account Setup
#### [Nodes](doc/AccountSetup/Nodes.md)
#### [Categories](doc/AccountSetup/Categories.md)
#### [Contacts](doc/AccountSetup/Contacts.md)

### Calling
#### [Rules](doc/Calling/Rules.md)
#### [SoundFiles](doc/Calling/SoundFiles.md)

### Numbering
#### [Voxnumbers](doc/Numbering/Voxnumbers.md)
#### [Countries](doc/Numbering/Countries.md)
#### [Purchase](doc/Numbering/Purchase.md)
