<?php

namespace SixpennyYard\MagicEnvironment;

use pocketmine\plugin\PluginBase;
use SixpennyYard\MagicEnvironment\spell\Teleportation;

class Loader extends PluginBase
{

    /**
     * @var Loader
     */
    private static Loader $instance;

    /**
     * @return Loader
     */
    public static function getInstance(): Loader
    {
        return self::$instance;
    }

    /**
     * @return void
     */
    protected function onEnable(): void
    {
        self::$instance = $this;

        @mkdir($this->getDataFolder() . "player/");

        $this->getServer()->getPluginManager()->registerEvents(new event\PlayerListener(), $this);
        $this->getServer()->getCommandMap()->register('SpellInterface', new command\SpellCommand($this));

    }

    protected function onDisable(): void
    {
        foreach ($this->getServer()->getOnlinePlayers() as $player)
        {
            if (Teleportation::hasTpMark($player))
            {
                Teleportation::removeMark($player);
            }
        }
    }

}