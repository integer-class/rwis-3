<?php

namespace App\enum;


enum StatusIssueReport: string
{
    
    case Todo = 'To do';
    case OnGoing = 'On Going';
    case Solved = 'Solved';
    case Invalid = 'Invalid';

}
