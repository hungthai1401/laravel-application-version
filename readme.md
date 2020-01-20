# Laravel Application Version

## Installation
Require this package with composer. 
```   
composer require hungthai1401/laravel-application-version
```

- #### Laravel 5.5+:
Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php
```
Ht\ApplicationVersion\Providers\ServiceProvider
```

- #### Lumen:
Register a provider in bootstrap/app.php:
```
$app->register(\HT\ApplicationVersion\Providers\ServiceProvider::class);
```

By defaults Facades are not enabled in Lumen, To use ApplicationVersion Facade functions un-comment $app->withFacades(); line from your bootstrap/app.php file and modify it
```
$app->withFacades(true, [
    'HT\ApplicationVersion\Facades\Facade' => 'ApplicationVersion',
]);
```


## Usage
```
ApplicationVersion::viaGoolePlay(PACKAGE_NAME);
ApplicationVersion::viaAppStore(BUNDLE_ID);
```

## References
https://mrvirk.com/how-to-find-app-bundle-id-ios.html

## Note
There are many Google Play applications that need to identify specific devices to retrieve version such as Google Chrome, Facebook, ...
Please read in some archieves:
- https://stackoverflow.com/questions/25459887/google-play-displaying-my-app-version-as-varies-with-device
- http://developer.android.com/google/play/publishing/multiple-apks.html
