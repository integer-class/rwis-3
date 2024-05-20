<?php

namespace App\enum;

enum RangeIncome: string
{
    case Group1 = 'Rp0';
    case Group2 = 'Rp1 - Rp1.000.000';
    case Group3 = 'Rp1.000.001 - Rp3.000.000';
    case Group4 = 'Rp3.000.001 - Rp5.000.000';
    case Group5 = 'Rp5.000.001 - Rp10.000.000';
    case Group6 = '> Rp10.000.000';
}
