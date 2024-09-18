<?php

namespace SextaNet\LaravelWebpay\Enums;

enum PaymentTypeCode: string
{
    case VD = 'VD';
    case VN = 'VN';
    case VC = 'VC';
    case SI = 'SI';
    case S2 = 'S2';
    case NC = 'NC';
    case VP = 'VP';
}
