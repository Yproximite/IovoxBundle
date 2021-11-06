# GetSoundFiles

```php
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\GetSoundFilesInterface;

public function example(GetSoundFilesInterface $getSoundFiles)
{
    $soundFiles = $getSoundFiles->executeQuery($options); 
} 
```

see [GetSoundFiles](../../src/Api/Calling/SoundFiles/GetSoundFiles.php) for available options

# GetSoundFileData

```php
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\GetSoundFileDataInterface;

public function example(GetSoundFileDataInterface $getSoundFileData)
{
    $soundFileMp3 = $getSoundFileData->executeQuery([GetSoundFileDataInterface::QUERY_PARAMETER_SOUND_LABEL => 'label']); 
} 
```

see [GetSoundFileData](../../src/Api/Calling/SoundFiles/GetSoundFileData.php) for available options

# CreateSoundFiles

```php
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\CreateSoundFilesInterface;
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload\SoundFilesPayload;
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload\SoundFilePayload;

public function example(CreateSoundFilesInterface $createSoundFiles)
{
    $payload = new SoundFilesPayload([
        new SoundFilePayload('sound label 1', 'binary sound file base64 encoded'),
        new SoundFilePayload('sound label 2', 'binary sound file base64 encoded', 'sound group', 'notes'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createSoundFiles->executeQuery($payload); 
}
```

OR

```php
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\CreateSoundFilesInterface;

public function example(CreateSoundFilesInterface $createSoundFiles)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
  <sound_file>
     <sound_label>Sound File 1</sound_label>
     <sound_group>Sound Group 1</sound_group>
     <!-- sound_file will contain the binary data, base64 encoded, of the sound file you want to create. //-->
     <sound_file><!-- sound file path here //--></sound_file>
     <notes>awesome notes for this awesome soundfile!</notes>
   </sound_file>
   <sound_file>
     <sound_label>Sound File 2</sound_label>
     <sound_group>Sound Group 1</sound_group>
     <!-- sound_file will contain the binary data, base64 encoded, of the sound file you want to create. //-->
     <sound_file><!-- sound file path here //--></sound_file>
     <notes>awesome notes for this new awesome soundfile!</notes>
   </sound_file>
   <sound_file>
     ...
   </sound_file>
 </request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $createSoundFiles->executeXmlStringQuery($xmlString); 
}
```

# UpdateSoundFiles

```php
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\UpdateSoundFilesInterface;
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload\SoundFilesPayload;
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\Payload\SoundFilePayload;

public function example(UpdateSoundFilesInterface $updateSoundFiles)
{
    $payload = new SoundFilesPayload([
        new SoundFilePayload('sound label 1', null, null, null, 'new label', 'new group'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $updateSoundFiles->executeQuery($payload); 
} 
```

OR

```php
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\UpdateSoundFilesInterface;

public function example(UpdateSoundFilesInterface $updateSoundFiles)
{
    $xmlString = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request>
   <sound_file>
     <sound_label>Sound File 1</sound_label>
     <new_sound_label>Sound File 1 Updated</new_sound_label>
     <sound_group>Sound Group 1</sound_group>
     <new_sound_group>Sound Group 1 Updated</new_sound_group>
     <!-- sound_file will contain the binary data, base64 encoded, of the sound file you want to create. //-->
     <sound_file></sound_file>
     <notes>Updated notes are even more awesome!</notes>
   </sound_file>
   <sound_file>
     <sound_label>Sound File 1</sound_label>
     <new_sound_label>Sound File 1 Updated</new_sound_label>
     <sound_group>Sound Group 1</sound_group>
     <notes>New notes!!!!!</notes>
   </sound_file>
   <sound_file>
     ...
   </sound_file>
 </request>
XML;
    
    // true if ok else BadResponseReturnException
    $result = $updateSoundFiles->executeXmlStringQuery($xmlString); 
}
```

# DeleteSoundFiles

```php
use Yproximite\IovoxBundle\Api\Calling\SoundFiles\DeleteSoundFilesInterface;

public function example(DeleteSoundFilesInterface $deleteSoundFiles)
{
    // true if ok else BadResponseReturnException
    $result = $deleteSoundFiles->executeQuery([DeleteSoundFilesInterface::QUERY_PARAMETER_SOUND_FILES => 'sound label 1']); 
} 
```

see [DeleteSoundFiles](../../src/Api/Calling/SoundFiles/DeleteSoundFiles.php) for available options
