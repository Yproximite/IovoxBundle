<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Tests\phpunit\Api\AccountSetup\Categories;

use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategories;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategoriesInterface;
use Yproximite\IovoxBundle\Exception\Api\BadQueryParameterException;
use Yproximite\IovoxBundle\Exception\Api\InvalidQueryParameterException;
use Yproximite\IovoxBundle\Model\Categories\CategoryModel;
use Yproximite\IovoxBundle\Tests\phpunit\Api\AbstractMockClient;

class GetCategoriesTest extends AbstractMockClient
{
    private const TEST_DIRECTORY = 'Categories/GetCategories';

    private GetCategoriesInterface $getCategories;

    protected function setUp(): void
    {
        parent::setUp();
        $this->getCategories = new GetCategories($this->client);
    }

    public function testExecuteQueryWithBadField(): void
    {
        static::expectException(BadQueryParameterException::class);
        $this->getCategories->executeQuery(['none exist param' => 'test']);
    }

    public function testExecuteQueryWithBadFieldType(): void
    {
        static::expectException(InvalidQueryParameterException::class);
        $this->getCategories->executeQuery(['parent_category_id' => 1]);
    }

    public function testBasicExecuteQuery(): void
    {
        $this->clientMustReturnResponse($this->findFixture('basic-response.json', static::TEST_DIRECTORY));
        $this->getCategories = new GetCategories($this->client);
        $categories = $this->getCategories->executeQuery();

        static::assertEquals(1, $categories->currentPage);
        static::assertEquals(1, $categories->totalPages);
        static::assertEquals(4, $categories->totalResults);
        static::assertEquals(4, $categories->results->count());

        static::assertEquals(CategoryModel::create([
            'category_id' => 'platform',
            'label'       => 'Plateforme',
            'value'       => 'Plateforme',
            'child_count' => '3',
        ]), $categories->results->first());

        static::assertEquals(CategoryModel::create([
            'category_id' => 'Detach Date',
            'label'       => 'Detach Date',
            'value'       => 'Detach Date',
            'child_count' => '1',
        ]), $categories->results->last());
    }

    public function testExecuteQueryWithParentCategory(): void
    {
        $this->clientMustReturnResponse($this->findFixture('parent-response.json', static::TEST_DIRECTORY));
        $this->getCategories = new GetCategories($this->client);
        $categories = $this->getCategories->executeQuery([
            'parent_category_id' => 'platform',
        ]);

        static::assertEquals(1, $categories->currentPage);
        static::assertEquals(1, $categories->totalPages);
        static::assertEquals(3, $categories->totalResults);
        static::assertEquals(3, $categories->results->count());

        static::assertEquals(CategoryModel::create([
            'category_id' => '13266',
            'label'       => 'Plateforme',
            'value'       => 'Platform 1',
            'child_count' => '0',
        ]), $categories->results->first());

        static::assertEquals(CategoryModel::create([
            'category_id' => '11405',
            'label'       => 'Plateforme',
            'value'       => 'Platform 3',
            'child_count' => '0',
        ]), $categories->results->last());
    }

    public function testExecuteQueryWithoutFields(): void
    {
        $this->clientMustReturnResponse($this->findFixture('response-without-fields.json', static::TEST_DIRECTORY));
        $this->getCategories = new GetCategories($this->client);
        $categories = $this->getCategories->executeQuery([
            'req_fields' => '',
        ]);

        static::assertEquals(1, $categories->currentPage);
        static::assertEquals(1, $categories->totalPages);
        static::assertEquals(3, $categories->totalResults);
        static::assertEquals(3, $categories->results->count());

        static::assertEquals(CategoryModel::create([
            'category_id' => null,
            'label'       => null,
            'value'       => null,
            'child_count' => null,
        ]), $categories->results->first());

        static::assertEquals(CategoryModel::create([
            'category_id' => null,
            'label'       => null,
            'value'       => null,
            'child_count' => null,
        ]), $categories->results->last());
    }
}
