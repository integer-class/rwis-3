<?php

namespace App\Enum;


enum StatusIssueReport: string
{
    case Todo = 'todo';
    case OnGoing = 'ongoing';
    case Solved = 'solved';
    case Invalid = 'invalid';
}
