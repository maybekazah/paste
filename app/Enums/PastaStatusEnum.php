<?php

namespace App\Enums;

enum PastaStatusEnum: string
{
    case PUBLIC = 'public';
    case UNLISTED = 'unlisted';
    case PRIVATE = 'private';

}
