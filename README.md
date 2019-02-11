# ConfigUpdater

| HitCount | License |
|:--:|:--:|
|[![HitCount](http://hits.dwyl.io/JackMD/ConfigUpdater.svg)](http://hits.dwyl.io/JackMD/ConfigUpdater)|[![GitHub license](https://img.shields.io/github/license/JackMD/ConfigUpdater.svg)](https://github.com/JackMD/ConfigUpdater/blob/master/LICENSE)|

### A handy virion for PocketMine-MP plugin developers that checks if a new version of config is available. If so then it notifies the user about the new update and updates the config.

### Features

- Super simple virion to be used in your plugins.
- It checks if a new release for a plugin is available on Poggit. If so then it notifies the user about the new release.

### API

```php
    JackMD\ConfigUpdater\ConfigUpdater::checkUpdate(Plugin $plugin, Config $config, string $configPath, string $configName, string $configExtension, string $configKey, int $latestVersion, string $updateMessage);
```

- **$plugin** is the plugin whom you are calling the function from.
- **$config** is the config you want to update.
- **$configPath** if the config is located in some other folder in the resources folder then use this to add the folder.
- **$configName** is the name of the config without its extension.
- **$configExtension** is the extension of the config without the dot.
- **$configKey** is the version key that needs to be checked in the config.
- **$latestVersion** is the latest version of the config. Needs to be integer.
- **$updateMessage** is the update message that would be shown on console if the plugin is outdated.

<br />

- For information regarding how to use a virion in a plugin please refer [here](https://poggit.github.io/support/virion.html)

### Disclaimer

This plugin is designed to be used only by PocketMine-MP developers who wish to provide their users with the info of when an update to the config is available.