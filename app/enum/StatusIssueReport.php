<?php

namespace App\enum;

enum StatusIssueReport: string
{
    case Todo = 'To do';
    case Doing = 'Doing';
    case Done = 'Done';
}
