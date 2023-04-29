<?php

declare(strict_types=1);

namespace App\Enums;

enum RegistrationStatus:string
{

    case Accepted = 'accepted';

    case Pending = 'pending';

    case Declined = 'declined';

}
