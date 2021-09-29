# GetCountries

```php
use Yproximite\IovoxBundle\Api\Numbering\Countries\GetCountriesInterface;

public function example(GetCountriesInterface $getCountries)
{
    // return Collection with code + name
    $countries = $getCountries->executeQuery($options); 
}
```
