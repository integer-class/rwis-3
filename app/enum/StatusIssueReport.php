<?php

namespace App\enum;


enum StatusIssueReport: string
{

    case Todo = 'todo';
    case OnGoing = 'ongoing';
    case Solved = 'solved';
    case Invalid = 'invalid';

}
