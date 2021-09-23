# IovoxBundle
![CI (master)](https://github.com/Yproximite/IovoxBundle/workflows/CI/badge.svg)
![](https://img.shields.io/badge/php->%208.0-blue)
![](https://img.shields.io/badge/Symfony-%20%5E5.3-blue)

## Installation

```console
$ composer require yproximite/iovox-bundle
```

# Other

* Use in a live repo

In the composer file:
```
"repositories": [
    {
      "type": "path",
      "url": "__YOUR-PATH__/iovox-bundle",
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
