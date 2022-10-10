<?php

namespace SixpennyYard\MagicEnvironment\Utils;

interface Spell{

    // Basic Attack = [<Spell Name>, <Mana Cost>, <Damage>, <Spell Class>]
    const BASIC_ATTACK = ["Damage Amplification", 3, 4, 1];
    // Arrow = [<Spell Name>, <Mana Cost>, <Damage>, <Spell Class>]
    const ARROW = ["Elf Arrow", 10, 12, 1];
    // Heroic = [<Spell Name>, <Mana Cost>, <Damage>, <Radius>, <Enemy Slowness Time>, <Spell Class>]
    const HEROIC = ["Heroic Spell", 20, 16, 6, 4, 2];
    // Fear = [<Spell Name>, <Mana Cost>, <Damage>, <Radius>, <Enemy Slowness Time>, <Spell Class>]
    const FEAR = ["Demon Fear", 40, 15, 15, 10, 3];
    // Heal = [<Spell Name>, <Mana Cost>, <Hearth Heal>, <Spell Class>]
    const HEAL = ["Healing", 5, 5, 1];

    // Time = [<Spell Name>, <Mana Cost>, <Radius>, <Enemy Slowness Time>, <Spell Class>]
    const TIME = ["Time Breaker", 1000, 37, 30, 7];

    const TELEPORTATION = ["Fast Teleportation", 50, 10, 7];

}