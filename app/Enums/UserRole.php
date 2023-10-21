<?php

namespace App\Enums;


enum UserRole:int
{
    case Admin  = 1;
    case Subscriber = 0;
};
