# GetSoundFiles

```php
use Yproximite\IovoxBundle\Api\SoundFiles\GetSoundFiles;

public function example(GetSoundFiles $getSoundFiles)
{
    $soundFiles = $getSoundFiles->executeQuery($options); 
} 
```

see [GetSoundFiles](../src/Api/SoundFiles/GetSoundFiles.php) for available options

# GetSoundFileData

```php
use Yproximite\IovoxBundle\Api\SoundFiles\GetSoundFileData;

public function example(GetSoundFileData $getSoundFileData)
{
    $soundFileMp3 = $getSoundFileData->executeQuery([GetSoundFileData::QUERY_PARAMETER_SOUND_LABEL => 'label']); 
} 
```

see [GetSoundFileData](../src/Api/SoundFiles/GetSoundFileData.php) for available options

# CreateSoundFiles

```php
use Yproximite\IovoxBundle\Api\SoundFiles\CreateSoundFiles;
use Yproximite\IovoxBundle\Api\SoundFiles\Payload\SoundFilesPayload;
use Yproximite\IovoxBundle\Api\SoundFiles\Payload\SoundFilePayload;

public function example(CreateSoundFiles $createSoundFiles)
{
    $payload = new SoundFilesPayload([
        new SoundFilePayload('sound label 1', 'binary sound file base64 encoded'),
        new SoundFilePayload('sound label 2', 'binary sound file base64 encoded', 'sound group', 'notes'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $createSoundFiles->executeQuery($payload); 
} 
```

# UpdateSoundFiles

```php
use Yproximite\IovoxBundle\Api\SoundFiles\UpdateSoundFiles;
use Yproximite\IovoxBundle\Api\SoundFiles\Payload\SoundFilesPayload;
use Yproximite\IovoxBundle\Api\SoundFiles\Payload\SoundFilePayload;

public function example(UpdateSoundFiles $updateSoundFiles)
{
    $payload = new SoundFilesPayload([
        new SoundFilePayload('sound label 1', null, null, null, 'new label', 'new group'),
    ]);
    
    // true if ok else BadResponseReturnException
    $result = $updateSoundFiles->executeQuery($payload); 
} 
```

# DeleteSoundFiles

```php
use Yproximite\IovoxBundle\Api\SoundFiles\DeleteSoundFiles;

public function example(DeleteSoundFiles $deleteSoundFiles)
{
    // true if ok else BadResponseReturnException
    $result = $deleteSoundFiles->executeQuery([DeleteSoundFiles::QUERY_PARAMETER_SOUND_FILES => 'sound label 1']); 
} 
```

see [DeleteSoundFiles](../src/Api/SoundFiles/DeleteSoundFiles.php) for available options
