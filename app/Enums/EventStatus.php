<?php

declare(strict_types=1);

namespace App\Enums;

enum EventStatus:string
{

    case Setup = 'setup';

    case Pending = 'pending';

    case Launched = 'launched';

}
