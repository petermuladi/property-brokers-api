<?php

namespace App\Enums;

enum PropertyTypesEnum: string
{
    case SINGLE = 'Single-home';
    case TOWNHOUSE = 'Town-home';
    case MULTIFAMILY = 'Multi-home';
    case BUNGALOW = 'Bungalow-home';
}