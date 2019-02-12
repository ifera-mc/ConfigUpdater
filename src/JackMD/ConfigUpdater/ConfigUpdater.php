<?php
declare(strict_types = 1);

/**
 *  _____              __ _       _   _           _       _
 * /  __ \            / _(_)     | | | |         | |     | |
 * | /  \/ ___  _ __ | |_ _  __ _| | | |_ __   __| | __ _| |_ ___ _ __
 * | |    / _ \| '_ \|  _| |/ _` | | | | '_ \ / _` |/ _` | __/ _ \ '__|
 * | \__/\ (_) | | | | | | | (_| | |_| | |_) | (_| | (_| | ||  __/ |
 *  \____/\___/|_| |_|_| |_|\__, |\___/| .__/ \__,_|\__,_|\__\___|_|
 *                           __/ |     | |
 *                          |___/      |_|
 *
 * ConfigUpdater, a updater virion for PocketMine-MP
 * Copyright (c) 2018 JackMD  < https://github.com/JackMD >
 *
 * Discord: JackMD#3717
 * Twitter: JackMTaylor_
 *
 * This software is distributed under "GNU General Public License v3.0".
 *
 * ConfigUpdater is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License v3.0 for more details.
 *
 * You should have received a copy of the GNU General Public License v3.0
 * along with this program. If not, see
 * <https://opensource.org/licenses/GPL-3.0>.
 * ------------------------------------------------------------------------
 */

namespace JackMD\ConfigUpdater;

use pocketmine\plugin\Plugin;
use pocketmine\scheduler\ClosureTask;
use pocketmine\utils\Config;

class ConfigUpdater{

	/**
	 * @param Plugin $plugin          The plugin you are calling this from.
	 * @param Config $config          The config you want to update.
	 * @param string $configPath      If the config is located in some other folder in the resources folder then use this to add the folder.
	 * @param string $configName      The name of the config without its extension.
	 * @param string $configExtension The extension of the config without the dot.
	 * @param string $configKey       The version key that needs to be checked in the config.
	 * @param int    $latestVersion   The latest version of the config. Needs to be integer.
	 * @param string $updateMessage   The update message that would be shown on console if the plugin is outdated.
	 */
	public static function checkUpdate(Plugin $plugin, Config $config, string $configPath, string $configName, string $configExtension, string $configKey, int $latestVersion, string $updateMessage = ""){
		if(($config->exists($configKey)) && ((int) $config->get($configKey) === $latestVersion)){
			return;
		}
		if(trim($updateMessage) === ""){
			$updateMessage = "Your " . $configName . "." . $configExtension . " file is outdated. Your old " . $configName . "." . $configExtension . " has been saved as " . $configName . "_old." . $configExtension . " and a new " . $configName . "." . $configExtension . " file has been generated. Please update accordingly.";
		}

		rename($plugin->getDataFolder() . $configPath . $configName . "." . $configExtension, $plugin->getDataFolder() . $configPath . $configName . "_old." . $configExtension);

		$plugin->saveResource($configPath . $configName . "." . $configExtension);

		$task = new ClosureTask(function(int $currentTick) use ($plugin, $updateMessage): void{
			$plugin->getLogger()->critical($updateMessage);
		});

		/* This task is here so that the update message can be sent after full server load */
		$plugin->getScheduler()->scheduleDelayedTask($task, 3*20);
	}
}
