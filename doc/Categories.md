# GetCategoryId

```php
use Yproximite\IovoxBundle\Api\Categories\GetCategoryId;

public function example(GetCategoryId $getCategoryId)
{
    $categoryIds = $getCategoryId->executeQuery($options); 
} 
```

see [GetCategoryId](../src/Api/Categories/GetCategoryId.php) for available options

# GetCategories

```php
use Yproximite\IovoxBundle\Api\Categories\GetCategories;

public function example(GetCategories $getCategories)
{
    $categories = $getCategories->executeQuery($options); 
} 
```

see [GetCategories](../src/Api/Categories/GetCategories.php) for available options

# CreateCategoryConfigurations

```php
use Yproximite\IovoxBundle\Api\Categories\CreateCategoryConfigurations;
use Yproximite\IovoxBundle\Api\Categories\Payload\CategoriesPayload;
use Yproximite\IovoxBundle\Api\Categories\Payload\CategoryPayload;

public function example(CreateCategoryConfigurations $createCategoryConfigurations)
{
    $payload = new CategoriesPayload([
        new CategoryPayload('category id', 'label'),
        new CategoryPayload('other category id', 'label', null, null, 'type', 'hexadecimal colour'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createCategoryConfigurations->executeQuery($payload); 
} 

```

# CreateCategories

```php
use Yproximite\IovoxBundle\Api\Categories\CreateCategories;
use Yproximite\IovoxBundle\Api\Categories\Payload\CategoriesPayload;
use Yproximite\IovoxBundle\Api\Categories\Payload\CategoryPayload;

public function example(CreateCategories $createCategories)
{
    $payload = new CategoriesPayload([
        new CategoryPayload('category id', 'label', 'value'),
        new CategoryPayload('other category id', 'label', 'value', 'parent category id'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createCategories->executeQuery($payload); 
} 
```

# DeleteCategoryConfigurations

```php
use Yproximite\IovoxBundle\Api\Categories\DeleteCategoryConfigurations;

public function example(DeleteCategoryConfigurations $deleteCategoryConfigurations)
{
    // true if ok else BadResponseReturnException
    $result = $deleteCategoryConfigurations->executeQuery([DeleteCategoryConfigurations::QUERY_PARAMETER_CATEGORIES_IDS => 'category id']); 
} 
```

see [DeleteCategoryConfigurations](../src/Api/Categories/DeleteCategoryConfigurations.php) for available options

# DeleteCategories

```php
use Yproximite\IovoxBundle\Api\Categories\DeleteCategories;

public function example(DeleteCategories $deleteCategories)
{
    // true if ok else BadResponseReturnException
    $result = $deleteCategories->executeQuery([DeleteCategories::QUERY_PARAMETER_CATEGORIES => 'category id']); 
} 
```

see [DeleteCategories](../src/Api/Categories/DeleteCategories.php) for available options
