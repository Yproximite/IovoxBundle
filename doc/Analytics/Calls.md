# GetCallData

```php
use Yproximite\IovoxBundle\Api\Analytics\Calls\GetCallData;

public function example(GetCallData $getCallData)
{
    $callData = $getCallData->executeQuery([GetCallData::QUERY_PARAMETER_REQ_FIELDS => 'id,cs,ce,co,coe,col,vn,cd,detail,ct,cts,tt,tts,ctype,call_res,rule_res,nid,nname,ntype,lid,lname,ltype,has_rec,es,cat_id,cat_lbl,cat_v,call_cat_id,call_cat_lbl,call_cat_v,node_cat_id,node_cat_lbl,node_cat_v,contact_cat_id,contact_cat_lbl,contact_cat_v,direction']);
}
```

see [GetCallData](../../src/Api/Analytics/Calls/GetCallData.php) for available options
