<?php

namespace SixpennyYard\MagicEnvironment\event;

use JsonException;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\world\Position;
use SixpennyYard\MagicEnvironment\Loader;
use SixpennyYard\MagicEnvironment\spell\Teleportation;
use SixpennyYard\MagicEnvironment\Utils\Level;
use SixpennyYard\MagicEnvironment\Utils\Spell;

class PlayerListener implements Listener
{

    const HALF_ELF = [
        "exp" => 0,
        "health" => Level::LEVEL_1[1],
        "mana" => Level::LEVEL_1[2] + 10,
        "spell_class" => Level::LEVEL_1[3],
        "max_spell" => Level::LEVEL_1[4] + 1,
        "tier" => "half-elf",
        "spell" => [
            Spell::BASIC_ATTACK[0],
            Spell::HEAL[0],
        ],
        "death" => 0,
    ];

    const ELF = [
        "exp" => 0,
        "health" => Level::LEVEL_1[1] + 10,
        "mana" => Level::LEVEL_1[2] + 40,
        "spell_class" => Level::LEVEL_1[3],
        "max_spell" => Level::LEVEL_1[4] + 2,
        "tier" => "elf",
        "spell" => [
            Spell::BASIC_ATTACK[0],
            Spell::ARROW[0],
            Spell::HEAL[0],
        ],
        "death" => 0
    ];
    const HERO = [
        "exp" => 0,
        "health" => Level::LEVEL_1[1] + 40,
        "mana" => Level::LEVEL_1[2] + 40,
        "spell_class" => Level::LEVEL_1[3] + 1,
        "max_spell" => Level::LEVEL_1[4] + 3,
        "tier" => "hero",
        "spell" => [
            Spell::BASIC_ATTACK[0],
            Spell::ARROW[0],
            Spell::HEROIC[0],
            Spell::HEAL[0],
        ],
        "death" => 0
    ];

    const DEMON = [
        "exp" => 0,
        "health" => Level::LEVEL_1[1] + 90,
        "mana" => Level::LEVEL_1[2] + 50,
        "spell_class" => Level::LEVEL_1[3] + 2,
        "max_spell" => Level::LEVEL_1[4] + 4,
        "tier" => "demon",
        "spell" => [
            Spell::BASIC_ATTACK[0],
            Spell::ARROW[0],
            Spell::HEROIC[0],
            Spell::HEAL[0],
            Spell::FEAR[0],
        ],
        "death" => 0
    ];

    const GOD = [
        "exp" => 0,
        "health" => Level::LEVEL_100[1],
        "mana" => Level::LEVEL_100[2],
        "spell_class" => Level::LEVEL_100[3],
        "max_spell" => Level::LEVEL_100[4],
        "tier" => "god",
        "spell" => [
            Spell::BASIC_ATTACK[0],
            Spell::ARROW[0],
            Spell::HEROIC[0],
            Spell::HEAL[0],
            Spell::FEAR[0],
            Spell::TIME[0],
            Spell::TELEPORTATION[0],
        ],
        "death" => 0
    ];

    const DEFAULT_CONFIG = [
        "exp" => 0,
        "health" => Level::LEVEL_1[1],
        "mana" => Level::LEVEL_1[2],
        "spell_class" => Level::LEVEL_1[3],
        "max_spell" => Level::LEVEL_1[4],
        "tier" => "human",
        "spell" => [
            Spell::BASIC_ATTACK[0],
        ],
        "death" => 0,
    ];


    /**
     * @param PlayerJoinEvent $event
     * @return void
     * @throws JsonException
     */
    public function onJoin(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();

        if (!$player->hasPlayedBefore())
        {
            $plconfig = new Config(Loader::getInstance()->getDataFolder() . "player/{$player->getName()}.yml", Config::YAML);
            Loader::getInstance()->saveResource("player/{$player->getName()}.yml");
            $plconfig->setAll(self::DEFAULT_CONFIG);
            $plconfig->save();

            $rand = mt_rand(1, 50);
            $rand2 = mt_rand(1, 100);
            $rand3 = mt_rand(1, 500);
            $rand4 = mt_rand(1, 1000);
            if ($rand == 34 or $rand == 41)
            {
                $plconfig->setAll(self::HALF_ELF);
                $plconfig->save();

                Server::getInstance()->broadcastMessage("§l§8[§cNewsEvent§8] §r§7Un Semi-Elf est née dans ce monde ! \n§r§l->§r {$player->getName()} §r§l<-§r");
            }
            elseif($rand2 == 81 or $rand2 == 64)
            {
                $plconfig->setAll(self::ELF);
                $plconfig->save();

                Server::getInstance()->broadcastMessage("§l§8[§cNewsEvent§8] §r§7Un §aElf§7 est née dans ce monde ! \n§r§l->§r §a{$player->getName()} §r§l<-§r");
            }
            elseif($rand3 == 156 or $rand3 == 18 or $rand3 == 385)
            {
                $plconfig->setAll(self::HERO);
                $plconfig->save();

                Server::getInstance()->broadcastMessage("§l§8[§cNewsEvent§8] §r§bUn nouveau §3héro§b est née dans ce monde ! \n§r§l->§r §3{$player->getName()} §r§l<-§r");
            }
            elseif($rand4 == 944 or $rand4 == 48 or $rand4 == 516)
            {
                $plconfig->setAll(self::DEMON);
                $plconfig->save();

                Server::getInstance()->broadcastMessage("§l§8[§cNewsEvent§8] §r§bUn nouveau §4démon§b est née dans ce monde ! \n§r§l->§r §4{$player->getName()} §r§l<-§r");
            }
            elseif ($player->getName() == "SixpennyYard339")
            {
                $plconfig->setAll(self::GOD);
                $plconfig->save();

                Server::getInstance()->broadcastMessage("§l§8[§cNewsEvent§8] §r§9Un nouveau §6Dieu§b est apparue dans ce monde ! \n§r§l->§r §dSixpennyYard339 §r§l<-§r");
            }
        }

    }

    /**
     * @param PlayerDeathEvent $event
     * @return void
     */
    public function onDeath(PlayerDeathEvent $event): void
    {
        $player = $event->getPlayer();
        $config = new Config(Loader::getInstance()->getDataFolder() . "player/{$player->getName()}.yml", Config::YAML);

        $count = $config->get("death") + 1;
        $config->set("death", $count);
    }

    /**
     * @param PlayerInteractEvent $event
     * @return void
     */
    public function onClick(PlayerInteractEvent $event): void
    {
        $player = $event->getPlayer();
        $block = $event->getBlock();

        if ($event->getAction() === PlayerInteractEvent::RIGHT_CLICK_BLOCK)
        {

            if ($player->getInventory()->getItemInHand()->getId() == 0)
            {

                $config = new Config(Loader::getInstance()->getDataFolder() . "player/{$player->getName()}.yml", Config::YAML);

                if (Teleportation::isTeleportationPower($player)) {
                    foreach ($config->get("spell") as $spell) {
                        if ($spell == Spell::TELEPORTATION[0]) {
                            if (!Teleportation::hasTpMark($player)) {
                                $position = new Position($block->getPosition()->getX(), $block->getPosition()->getY(), $block->getPosition()->getZ(), $block->getPosition()->getWorld());
                                Teleportation::addMark($player, $position);
                            } else {
                                Teleportation::removeMark($player);
                            }
                            break;
                        }
                    }
                }
            }
        }elseif ($event->getAction() === PlayerInteractEvent::LEFT_CLICK_BLOCK)
        {
            if ($player->getInventory()->getItemInHand()->getId() == 0)
            {
                if (Teleportation::hasTpMark($player)) {
                    Teleportation::tpMark($player);
                }
            }
        }
    }

    public function handleUseItemTransaction(UseItemTransactionData $data) : void
    {
        if ($data->getActionType() == UseItemTransactionData::ACTION_CLICK_AIR)
        {
            if ($player->getInventory()->getItemInHand()->getId() == 0)
            {
                if (Teleportation::hasTpMark($player)) {
                    Teleportation::tpMark($player);
                }
            }
        }
    }

}
