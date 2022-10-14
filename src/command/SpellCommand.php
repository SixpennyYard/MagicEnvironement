<?php

namespace SixpennyYard\MagicEnvironment\command;

use EasyUI\element\Button;
use EasyUI\variant\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\DefaultPermissionNames;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use SixpennyYard\MagicEnvironment\Loader;
use SixpennyYard\MagicEnvironment\spell\Teleportation;
use SixpennyYard\MagicEnvironment\Utils\Spell;

class SpellCommand extends Command
{

    public function __construct()
    {
        parent::__construct("spell", "Open The Spell Interface", "§cusage: /spell");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player)
        {
            if (empty($args[0])) {
                $this->spellInterface($sender);
            }
            elseif (Loader::getInstance()->getServer()->getPlayerByPrefix($args[0]) instanceof Player)
            {
                var_dump(Loader::getInstance()->getServer()->getPlayerByPrefix($args[0]));
                if ($sender->hasPermission(DefaultPermissionNames::GROUP_OPERATOR))
                {
                    $this->spellInterface($sender, $args[0]);
                }
                else
                {
                    $sender->sendMessage($this->getUsage());
                }
            }
        }
    }

    private function spellInterface(Player $player, $user = null)
    {
        if ($user !== null)
        {
            var_dump($user);
            $config = new Config(Loader::getInstance()->getDataFolder() . "player/{$user}.yml", Config::YAML);
        }
        else
        {
            $config = new Config(Loader::getInstance()->getDataFolder() . "player/{$player->getName()}.yml", Config::YAML);
        }
        $form = new SimpleForm("Spell");
        foreach ($config->get("spell") as $spell)
        {
            $form->addButton(new Button($spell, null, function (Player $player) use ($spell)
            {
                $player->sendMessage($spell . " choisi !");
                Teleportation::removePower($player);
                if ($spell == Spell::TELEPORTATION[0])
                {
                    Teleportation::addPower($player);
                }
            }));
        }
        $player->sendForm($form);
    }
}