<?php

declare(strict_types=1);

namespace App\Enums;

enum RegistrationStatus: string
{

    case Pending = 'pending';

    case Launched = 'launched';

    case Finished = 'finished';
}
