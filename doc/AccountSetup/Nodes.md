# GetNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\GetNodes;

public function example(GetNodes $getNodes)
{
    $nodes = $getNodes->executeQuery($options); 
} 
```

see [GetNodes](../../src/Api/AccountSetup/Nodes/GetNodes.php) for available options

# GetNodeDetails

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\GetNodeDetails;

public function example(GetNodeDetails $getNodeDetails)
{
    $nodeDetails = $getNodeDetails->executeQuery([GetNodeDetails::QUERY_PARAMETER_NODE_ID => 'node_id']); 
} 
```

see [GetNodeDetails](../../src/Api/AccountSetup/Nodes/GetNodeDetails.php) for available options

# CreateNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\CreateNodes;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;

public function example(CreateNodes $createNodes)
{
    $payload = new NodesPayload([
        new NodePayload('node_id', 'node_name', 'node_type'),
        new NodePayload('node_id', 'node_name', 'node_type', 'node_date'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createNodes->executeQuery($payload); 
} 

```

# CreateNodeFull

```php
use Doctrine\Common\Collections\ArrayCollection;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\CreateNodeFull;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\AssignVoxnumberPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\CategoryPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;

public function example(CreateNodeFull $createNodeFull)
{
    $payload = new NodePayload(
        'node_id',
        'node_name',
        'node_type',
        'node_date',
         new ArrayCollection([
            new LinkPayload(
                'link_id',
                'link_name',
                'link_type',
                'link_date',
                0|1,
                new ArrayCollection([
                    new CategoryPayload('category_id', 'parent_category_id', 'value')
                ]),
                new AssignVoxnumberPayload(
                    'method',// "BY AREA", "BY VOXNUMBER", "BY POSTCODE"
                    'voxnumber_idd',// Examples => France: 33, United Kingdom: 44
                    'area_code',// Examples => London: 020
                    'full_voxnumber',// Examples => France: 33102030405, United Kingdom: 442071002003
                    'voxnumber_country', // "FRANCE", "UNITED KINGDOM"
                    'postcode',
                    15// fallback_area_distance in km
                )
            )
        ])
    );
    
    // true if ok else BadResponseReturnException
    $result = $createNodeFull->executeQuery($payload); 
} 
```

# UpdateNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\UpdateNodes;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;

public function example(UpdateNodes $updateNodes)
{
    $payload = new NodesPayload([
        new NodePayload('node_id', 'node_name', 'node_type'),
        new NodePayload('node_id', 'node_name', 'node_type', 'node_date', null, 'new_node_id'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $updateNodes->executeQuery($payload); 
} 
```

# DeleteNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\DeleteNodes;

public function example(DeleteNodes $deleteNodes)
{
    // true if ok else BadResponseReturnException
    $result = $deleteNodes->executeQuery([DeleteNodes::QUERY_PARAMETER_NODE_IDS => 'node_ids']); 
} 
```

see [DeleteNodes](../../src/Api/AccountSetup/Nodes/DeleteNodes.php) for available options