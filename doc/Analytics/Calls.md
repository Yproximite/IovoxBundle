# GetCallData

```php
use Yproximite\IovoxBundle\Api\Analytics\Calls\GetCallData;

public function example(GetCallData $getCallData)
{
    $callData = $getCallData->executeQuery([GetCallData::QUERY_PARAMETER_REQ_FIELDS => 'id,cs,ce,co,coe,col,vn,cd,detail,ct,cts,tt,tts,ctype,call_res,rule_res,nid,nname,ntype,lid,lname,ltype,has_rec,es,cat_id,cat_lbl,cat_v,call_cat_id,call_cat_lbl,call_cat_v,node_cat_id,node_cat_lbl,node_cat_v,contact_cat_id,contact_cat_lbl,contact_cat_v,direction']);
}
```

see [GetCallData](../../src/Api/Analytics/Calls/GetCallData.php) for available options

# GetCallMetrics

```php
use Yproximite\IovoxBundle\Api\Analytics\Calls\GetCallMetrics;

public function example(GetCallMetrics $getCallMetrics)
{
    $callMetrics = $getCallMetrics->executeQuery([
        GetCallMetrics::QUERY_PARAMETER_REQ_FIELDS => 'id,cs,ce,co,coe,col,vn,cd,detail,ct,cts,tt,tts,ctype,call_res,rule_res,nid,nname,ntype,lid,lname,ltype,has_rec,es,cat_id,cat_lbl,cat_v,call_cat_id,call_cat_lbl,call_cat_v,node_cat_id,node_cat_lbl,node_cat_v,contact_cat_id,contact_cat_lbl,contact_cat_v,direction',
        GetCallMetrics::QUERY_PARAMETER_GROUP_FIELDS => 'cdate,cweekd,cmonth,co,coe,vn,cd,detail,call_res,nid,ntype,lid,lname,ltype',// not all in same time 
    ]);
}
```

see [GetCallMetrics](../../src/Api/Analytics/Calls/GetCallMetrics.php) for available options

# GetCallRecording

```php
use Yproximite\IovoxBundle\Api\Analytics\Calls\GetCallRecording;

public function example(GetCallRecording $getCallRecording)
{
    $recording = $getCallRecording->executeQuery([GetCallRecording::QUERY_PARAMETER_ID => 'recording_id']);
}
```

see [GetCallRecording](../../src/Api/Analytics/Calls/GetCallRecording.php) for available options

# GetVoicemailRecording

```php
use Yproximite\IovoxBundle\Api\Analytics\Calls\GetVoicemailRecording;

public function example(GetVoicemailRecording $getVoicemailRecording)
{
    $recording = $getVoicemailRecording->executeQuery([GetVoicemailRecording::QUERY_PARAMETER_ID => 'recording_id']);
}
```

see [GetVoicemailRecording](../../src/Api/Analytics/Calls/GetVoicemailRecording.php) for available options