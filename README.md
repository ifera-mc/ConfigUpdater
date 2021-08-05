# ConfigUpdater

| Discord | Poggit | License |
|:--:|:--:|:--:|
|[![Chat](https://img.shields.io/badge/chat-on%20discord-7289da.svg)](https://discord.gg/urQt6ETgYu)|[![Poggit-CI](https://poggit.pmmp.io/ci.shield/ifera-mc/ConfigUpdater/ConfigUpdater)](https://poggit.pmmp.io/ci/ifera-mc/ConfigUpdater/ConfigUpdater)|[![GitHub license](https://img.shields.io/github/license/ifera-mc/ConfigUpdater.svg)](https://github.com/ifera-mc/ConfigUpdater/blob/master/LICENSE)|

### A handy virion for PocketMine-MP plugin developers that checks if a new version of config is available. If so then it notifies the user about the new update and updates the config.

### Features

- Super simple virion to be used in your plugins.
- It checks if a new version of config is available and if so it then updates and notifies the user.

### API

```php
    JackMD\ConfigUpdater\ConfigUpdater::checkUpdate(Plugin $plugin, Config $config, string $configKey, int $latestVersion, string $updateMessage = "");
```

- **$plugin** is the plugin whom you are calling the function from.
- **$config** is the config you want to update.
- **$configKey** is the version key that needs to be checked in the config.
- **$latestVersion** is the latest version of the config. Needs to be integer.
- **$updateMessage** is the update message that would be shown on console if the plugin is outdated.

<br />

- For information regarding how to use a virion in a plugin please refer [here](https://poggit.github.io/support/virion.html)


### Poggit Setup

Edit the `.poggit.yml` in your repository and set it up like shown below.

```yml
--- 
branches:
- master
projects:
  PLUGIN_NAME:
    libs:
      - src: ifera-mc/ConfigUpdater/ConfigUpdater
        version: ^1.2.0
...
```

### Disclaimer

This plugin is designed to be used only by PocketMine-MP developers who wish to provide their users with the info of when an update to the config is available.
