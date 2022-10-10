<?php

namespace SixpennyYard\MagicEnvironment\task;

use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\scheduler\Task;
use pocketmine\world\particle\RedstoneParticle;
use pocketmine\world\Position;

class FastTpParticle extends Task
{
    /**
     * @var Player
     */
    public Player $player;

    /**
     * @var Position
     */
    public Position $position;

    /**
     * @param Player $player
     * @param Position $position
     */
    public function __construct(Player $player, Position $position)
    {
        $this->player = $player;
        $this->position = $position;
    }

    /**
     * @inheritDoc
     */
    public function onRun(): void
    {
        $player = $this->player;
        $x = $this->position->getX();
        $y = $this->position->getY() + 1.5;
        $z = $this->position->getZ();

        $player->getWorld()->addParticle(new Vector3($x, $y, $z), new RedstoneParticle());
    }
}