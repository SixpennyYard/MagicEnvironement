<?php

namespace SixpennyYard\MagicEnvironment\Utils;

interface Level{

    /**
     * Information: const Level = [<Exp to Next LvL>, <Player Health>, <Player Mana>, <Spell Class Max>, <Spell Count Max>, <Power Gem Max>]
     */

    // Tutorial
    const LEVEL_1 = [100, 10, 10, 1, 1, 1];
    const LEVEL_2 = [200, 10, 15, 1, 1, 1];
    const LEVEL_3 = [400, 15, 15, 1, 2, 2];
    const LEVEL_4 = [600, 20, 15, 1, 2, 2];
    const LEVEL_5 = [800, 20, 20, 1, 2, 2];

    // Beginner
    const LEVEL_6 = [100, 20, 20, 1, 3, 4];
    const LEVEL_7 = [200, 20, 40, 1, 3, 4];
    const LEVEL_8 = [400, 20, 40, 1, 3, 4];
    const LEVEL_9 = [600, 25, 40, 1, 3, 4];
    const LEVEL_10 = [800, 30, 50, 1, 4, 6];

    // Medium
    const LEVEL_11 = [1500, 30, 70, 2, 4, 6];
    const LEVEL_12 = [2000, 30, 70, 2, 4, 6];
    const LEVEL_13 = [2500, 30, 70, 2, 5, 10];
    const LEVEL_14 = [3000, 30, 80, 2, 5, 10];
    const LEVEL_15 = [3500, 30, 80, 2, 5, 10];
    const LEVEL_16 = [4000, 30, 80, 2, 6, 12];
    const LEVEL_17 = [4750, 30, 90, 2, 6, 12];
    const LEVEL_18 = [5500, 30, 90, 2, 6, 12];
    const LEVEL_19 = [6250, 35, 90, 2, 7, 14];
    const LEVEL_20 = [8000, 35, 100, 2, 7, 14];

    // Soldier
    const LEVEL_21 = [9000, 35, 100, 3, 7, 14];
    const LEVEL_22 = [10000, 35, 100, 3, 7, 14];
    const LEVEL_23 = [11000, 35, 150, 3, 7, 14];
    const LEVEL_24 = [12000, 35, 150, 3, 7, 14];
    const LEVEL_25 = [13000, 35, 150, 3, 8, 16];
    const LEVEL_26 = [14500, 35, 150, 3, 8, 16];
    const LEVEL_27 = [16000, 40, 150, 3, 8, 16];
    const LEVEL_28 = [17500, 40, 150, 3, 8, 16];
    const LEVEL_29 = [19000, 40, 200, 3, 8, 16];
    const LEVEL_30 = [20500, 40, 200, 3, 8, 16];

    // Professional
    const LEVEL_31 = [22000, 40, 300, 4, 9, 18];
    const LEVEL_32 = [24000, 40, 300, 4, 9, 18];
    const LEVEL_33 = [26000, 45, 300, 4, 9, 18];
    const LEVEL_34 = [28000, 45, 300, 4, 9, 18];
    const LEVEL_35 = [30000, 45, 300, 4, 9, 18];
    const LEVEL_36 = [32000, 45, 300, 4, 9, 18];
    const LEVEL_37 = [34000, 45, 300, 4, 9, 18];
    const LEVEL_38 = [36000, 45, 300, 4, 9, 18];
    const LEVEL_39 = [38000, 45, 300, 4, 9, 18];
    const LEVEL_40 = [40000, 50, 500, 4, 10, 20];

    // God
    const LEVEL_100 = [0, 100, 1000000, 7, 20, 500];



}