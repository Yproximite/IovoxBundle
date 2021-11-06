# GetNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\GetNodesInterface;

public function example(GetNodesInterface $getNodes)
{
    $nodes = $getNodes->executeQuery($options); 
} 
```

see [GetNodes](../../src/Api/AccountSetup/Nodes/GetNodes.php) for available options

# GetNodeDetails

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\GetNodeDetailsInterface;

public function example(GetNodeDetailsInterface $getNodeDetails)
{
    $nodeDetails = $getNodeDetails->executeQuery([GetNodeDetails::QUERY_PARAMETER_NODE_ID => 'node_id']); 
} 
```

see [GetNodeDetails](../../src/Api/AccountSetup/Nodes/GetNodeDetails.php) for available options

# CreateNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\CreateNodesInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;

public function example(CreateNodesInterface $createNodes)
{
    $payload = new NodesPayload([
        new NodePayload('node_id', 'node_name', 'node_type'),
        new NodePayload('node_id', 'node_name', 'node_type', 'node_date'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createNodes->executeQuery($payload); 
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\CreateNodesInterface;

public function example(CreateNodesInterface $createNodes)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
    <node>
       <node_id>Westbourne Apartments</node_id>
       <node_name>150 Westbourne Grove</node_name>
       <node_type>Property</node_type>
       <node_date>2008-11-19 14:10:46</node_date>
    </node>
    <node>
       <node_id>Tyler's Hairdressers</node_id>
       <node_name>71 Upper Walthamstow Road</node_name>
       <node_type>Business</node_type>
       <node_date>2008-11-19 14:10:46</node_date>
    </node>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createNodes->executeXmlStringQuery($xmlString); 
}
```

# CreateNodeFull

```php
use Doctrine\Common\Collections\ArrayCollection;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\CreateNodeFullInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\AssignVoxnumberPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\CategoryPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\LinkPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;

public function example(CreateNodeFullInterface $createNodeFull)
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

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\CreateNodeFullInterface;

public function example(CreateNodeFullInterface $createNodeFull)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
     <node>
         <node_id>AUTOINCREMENT()</node_id>
         <node_name>Tom Business</node_name>
         <node_type>Business</node_type>
         <node_date>2008-11-19 14:10:46</node_date>
         <links>
             <link>
                 <link_id>AUTOINCREMENT()</link_id>
                 <link_name>Media News</link_name>
                 <link_type>Newspaper</link_type>
                 <link_date>2008-11-19 15:15:45</link_date>
                 <click_to_call>1</click_to_call>
                 <!-- for more information how to get the rules_variables go to getVariableRulesOfTemplate API method -->
                 <rules_variable>
                    <rule>
                         <rule_id>call</rule_id>
                         <rule_type>call</rule_type>
                         <rule_label>Call</rule_label>
                         <contact>
                             <contact_id>23113123</contact_id>
                             <business_phone>449789122233</business_phone>
                         <!-- any other fields from createContacts API method -->
                         </contact>
                         <caller_message>
                             <sound_files>
                                 <sound_file>sound group 1|whisper called</sound_file>
                             </sound_files>
                         </caller_message>
                         <called_message>
                             <sound_files>
                                 <sound_file>sound group 1|whisper caller</sound_file>
                                 <sound_file>sound group 2|Whisper to the Business</sound_file>
                             </sound_files>
                         </called_message>
                     </rule>
                 </rules_variable>
                 <rule_template_name>Call Sales</rule_template_name>
                 <assign_voxnumber>
                     <method>BY AREA</method>
                     <voxnumber_idd>44</voxnumber_idd>
                     <area_code>20</area_code>
                 </assign_voxnumber>
                 <categories>
                     <category>
                         <parent_category_id>1</parent_category_id>
                         <category_id>10</category_id>
                         <value>London</value>
                     </category>
                     <category>
                         ....
                     </category>
                 </categories>
             </link>
         </links>
     </node>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createNodeFull->executeXmlStringQuery($xmlString); 
}
```

# UpdateNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\UpdateNodesInterface;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodesPayload;
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\Payload\NodePayload;

public function example(UpdateNodesInterface $updateNodes)
{
    $payload = new NodesPayload([
        new NodePayload('node_id', 'node_name', 'node_type'),
        new NodePayload('node_id', 'node_name', 'node_type', 'node_date', null, 'new_node_id'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $updateNodes->executeQuery($payload); 
}
```

OR

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\UpdateNodesInterface;

public function example(UpdateNodesInterface $updateNodes)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
     <node>
         <node_id>ext1</node_id>
         <new_node_id>ext12</new_node_id>
         <node_name>My first updated API node</node_name>
         <node_type>My updated Node Type</node_type>
         <node_date>2008-11-19 14:10:46</node_date>
     </node>
     <node>
         ...
     </node>
</request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $updateNodes->executeXmlStringQuery($xmlString); 
}
```

# DeleteNodes

```php
use Yproximite\IovoxBundle\Api\AccountSetup\Nodes\DeleteNodesInterface;

public function example(DeleteNodesInterface $deleteNodes)
{
    // true if ok else BadResponseReturnException
    $result = $deleteNodes->executeQuery([DeleteNodesInterface::QUERY_PARAMETER_NODE_IDS => 'node_ids']); 
} 
```

see [DeleteNodes](../../src/Api/AccountSetup/Nodes/DeleteNodes.php) for available options
