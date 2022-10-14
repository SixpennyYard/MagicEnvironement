<?php

namespace SixpennyYard\MagicEnvironment\task;

use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\scheduler\Task;
use pocketmine\world\particle\RedstoneParticle;
use pocketmine\world\particle\WaterParticle;
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
        $x = round($this->position->getX());
        $y = $this->position->getY() + 1.3;
        $z = round($this->position->getZ());

        $player->getWorld()->addParticle(new Vector3($x + 0.01, $y, $z + 0.01), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x, $y + 0.01, $z), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x, $y - 0.01, $z), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x, $y + 0.001, $z), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x, $y - 0.001, $z), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x - 0.01, $y, $z - 0.01), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x + 0.001, $y, $z + 0.001), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x - 0.001, $y, $z - 0.001), new WaterParticle());
        $player->getWorld()->addParticle(new Vector3($x + 0.1, $y, $z + 0.1), new RedstoneParticle());
        $player->getWorld()->addParticle(new Vector3($x + 0.2, $y, $z + 0.2), new RedstoneParticle());
        $player->getWorld()->addParticle(new Vector3($x + 0.3, $y, $z + 0.3), new RedstoneParticle());
        $player->getWorld()->addParticle(new Vector3($x - 0.1, $y, $z - 0.1), new RedstoneParticle());
        $player->getWorld()->addParticle(new Vector3($x - 0.2, $y, $z - 0.2), new RedstoneParticle());
        $player->getWorld()->addParticle(new Vector3($x - 0.3, $y, $z - 0.3), new RedstoneParticle());
        $player->getWorld()->addParticle(new Vector3($x, $y + 0.1, $z), new RedstoneParticle());
        $player->getWorld()->addParticle(new Vector3($x, $y - 0.1, $z), new RedstoneParticle());
    }
}