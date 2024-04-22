<?php

namespace App\enum;

enum MarriageStatusResident: string
{
    case BelumKawin = 'Belum Kawin';
    case Kawin = 'Kawin';
    case CeraiHidup = 'Cerai Hidup';
    case CeraiMati = 'Cerai Mati';
}
