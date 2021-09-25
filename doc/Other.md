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
