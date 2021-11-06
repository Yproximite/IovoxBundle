# GetCategoryId

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategoryIdInterface;

public function example(GetCategoryIdInterface $getCategoryId)
{
    $categoryIds = $getCategoryId->executeQuery($options); 
} 
```

see [GetCategoryId](../../src/Api/AccountSetup/Categories/GetCategoryId.php) for available options

# GetCategories

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategoriesInterface;

public function example(GetCategoriesInterface $getCategories)
{
    $categories = $getCategories->executeQuery($options); 
} 
```

see [GetCategories](../../src/Api/AccountSetup/Categories/GetCategories.php) for available options

# CreateCategoryConfigurations

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\CreateCategoryConfigurationsInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoryPayload;

public function example(CreateCategoryConfigurationsInterface $createCategoryConfigurations)
{
    $payload = new CategoriesPayload([
        new CategoryPayload('category id', 'label'),
        new CategoryPayload('other category id', 'label', null, null, 'type', 'hexadecimal colour'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createCategoryConfigurations->executeQuery($payload); 
} 

```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\CreateCategoryConfigurationsInterface;

public function example(CreateCategoryConfigurationsInterface $createCategoryConfigurations)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <category>
        <label>Location</label>
        <category_id>Location</category_id>
        <type>Tree</type>
    </category>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createCategoryConfigurations->executeXmlStringQuery($xmlString); 
}
```

# CreateCategories

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\CreateCategoriesInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoriesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\Payload\CategoryPayload;

public function example(CreateCategoriesInterface $createCategories)
{
    $payload = new CategoriesPayload([
        new CategoryPayload('category id', 'label', 'value'),
        new CategoryPayload('other category id', 'label', 'value', 'parent category id'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createCategories->executeQuery($payload); 
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\CreateCategoriesInterface;

public function example(CreateCategoriesInterface $createCategories)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
     <category>
         <parent_category_id>1</parent_category_id>
         <category_id>10</category_id>
         <label>Location</label>
         <value>London</value>
     </category>
     <category>
         ....
     </category>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createCategories->executeXmlStringQuery($xmlString); 
}
```

# DeleteCategoryConfigurations

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\DeleteCategoryConfigurationsInterface;

public function example(DeleteCategoryConfigurationsInterface $deleteCategoryConfigurations)
{
    // true if ok else BadResponseReturnException
    $result = $deleteCategoryConfigurations->executeQuery([DeleteCategoryConfigurationsInterface::QUERY_PARAMETER_CATEGORIES_IDS => 'category id']); 
} 
```

see [DeleteCategoryConfigurations](../../src/Api/AccountSetup/Categories/DeleteCategoryConfigurations.php) for available options

# DeleteCategories

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\DeleteCategoriesInterface;

public function example(DeleteCategoriesInterface $deleteCategories)
{
    // true if ok else BadResponseReturnException
    $result = $deleteCategories->executeQuery([DeleteCategoriesInterface::QUERY_PARAMETER_CATEGORIES => 'category id']); 
} 
```

see [DeleteCategories](../../src/Api/AccountSetup/Categories/DeleteCategories.php) for available options
