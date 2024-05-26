<?php

namespace App\Enums;

enum MembershipStatuses: string
{
    case UNPAID = 'unpaid'; // not yet paid
    case PROCESSING = 'processing'; // paid and need to print for board
    case PENDING = 'pending'; // printed and waiting to be approved by board - no vote possible
    case ACTIVE = 'active'; // approved by board - voting is possible
    case EXPIRING = 'expiring'; // no vote possible - but renewing is possible
    case EXPIRED = 'expired'; // no vote - no renewal. Need a new one.
    case CANCELLED = 'cancelled'; // cancelled by the user
    case REVOKED = 'revoked'; // revoked by the board - no new approval possible

}
