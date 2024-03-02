<?php

namespace App\Enums;

enum ListingTypeEnum: string
{
    case OPEN = 'Open-Listing';
    case SELL = 'Sell-Listing';
    case EXCLUSIVE = 'Excslusive-Listing';
}