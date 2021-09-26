# GetCountries

```php
use Yproximite\IovoxBundle\Api\Numbering\Countries\GetCountries;

public function example(GetCountries $getCountries)
{
    // return Collection with code + name
    $countries = $getCountries->executeQuery($options); 
}
```
