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
