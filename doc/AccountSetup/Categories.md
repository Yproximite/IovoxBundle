# GetCategoryId

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategoryId;

public function example(GetCategoryId $getCategoryId)
{
    $categoryIds = $getCategoryId->executeQuery($options); 
} 
```

see [GetCategoryId](../../src/Api/AccountSetup/Categories/GetCategoryId.php) for available options

# GetCategories

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategories;

public function example(GetCategories $getCategories)
{
    $categories = $getCategories->executeQuery($options); 
} 
```

see [GetCategories](../../src/Api/AccountSetup/Categories/GetCategories.php) for available options

# CreateCategoryConfigurations

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\CreateCategoryConfigurations;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoryPayload;

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
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\CreateCategories;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoryPayload;

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
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\DeleteCategoryConfigurations;

public function example(DeleteCategoryConfigurations $deleteCategoryConfigurations)
{
    // true if ok else BadResponseReturnException
    $result = $deleteCategoryConfigurations->executeQuery([DeleteCategoryConfigurations::QUERY_PARAMETER_CATEGORIES_IDS => 'category id']); 
} 
```

see [DeleteCategoryConfigurations](../../src/Api/AccountSetup/Categories/DeleteCategoryConfigurations.php) for available options

# DeleteCategories

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\DeleteCategories;

public function example(DeleteCategories $deleteCategories)
{
    // true if ok else BadResponseReturnException
    $result = $deleteCategories->executeQuery([DeleteCategories::QUERY_PARAMETER_CATEGORIES => 'category id']); 
} 
```

see [DeleteCategories](../../src/Api/AccountSetup/Categories/DeleteCategories.php) for available options
