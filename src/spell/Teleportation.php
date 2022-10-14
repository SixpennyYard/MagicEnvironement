<?php

namespace SixpennyYard\MagicEnvironment\spell;

use pocketmine\player\Player;
use pocketmine\scheduler\ClosureTask;
use pocketmine\world\Position;
use SixpennyYard\MagicEnvironment\Loader;
use SixpennyYard\MagicEnvironment\task\FastTpParticle;
use pocketmine\math\Vector3;

class Teleportation {

    /**
     * @var array
     */
    public static array $spell = [];

    /**
     * @var array
     */
    public static array $teleportationMark = [];

    /**
     * @var array
     */
    public static array  $coordinateMark = [];

    /**
     * @param Player $player
     * @return bool
     */
    public static function isTeleportationPower(Player $player): bool
    {
        if (isset(self::$spell[$player->getName()])){
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param Player $player
     * @return bool
     */
    public static function hasTpMark(Player $player): bool
    {
        if (isset(self::$teleportationMark[$player->getName()]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param Player $player
     * @param Position $position
     * @return void
     */
    public static function addMark(Player $player, Position $position): void
    {
        self::$teleportationMark[$player->getName()] = $player->getName();
        self::$coordinateMark[$player->getName()] = $position;

        Loader::getInstance()->getScheduler()->scheduleRepeatingTask(new FastTpParticle($player, $position), 10);
        Loader::getInstance()->getScheduler()->scheduleDelayedTask(new ClosureTask(function () use($player): void
        {
            $player->sendMessage("§l[§cMagicEnvironment§r§l] §4Votre marque de téléportation viens de disparaitre !");
            self::removeMark($player);
        }), 2400);
    }

    /**
     * @param Player $player
     * @return void
     */
    public static function removeMark(Player $player): void
    {
        unset(self::$teleportationMark[$player->getName()]);
        unset(self::$coordinateMark[$player->getName()]);

        Loader::getInstance()->getScheduler()->cancelAllTasks();
    }

    /**
     * @param Player $player
     * @return mixed
     */
    public static function getMark(Player $player): mixed
    {
        return self::$coordinateMark[$player->getName()];
    }

    /**
     * @param Player $player
     * @return void
     */
    public static function tpMark(Player $player): void
    {
        $coordinate = self::getMark($player);
        $x = $coordinate->getX();
        $y = $coordinate->getY();
        $z = $coordinate->getZ();

        if (self::hasTpMark($player))
        {
            $player->teleport(new Vector3($x, $y + 1, $z));
            self::removeMark($player);
        }
    }

    /**
     * @param Player $player
     * @return void
     */
    public static function removePower(Player $player): void
    {
        unset(self::$spell[$player->getName()]);
        self::removeMark($player);
    }

    /**
     * @param Player $player
     * @return void
     */
    public static function addPower(Player $player): void
    {
        self::$spell[$player->getName()] = $player->getName();
    }
}