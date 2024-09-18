<?php

namespace SextaNet\LaravelWebpay\Enums;

enum Vci: string
{
    case TSY = 'TSY';
    case TSN = 'TSN';
    case NP = 'NP';
    case U3 = 'U3';
    case INV = 'INV';
    case A = 'A';
    case CNP1 = 'CNP1';
    case EOP = 'EOP';
    case BNA = 'BNA';
    case ENA = 'ENA';
}
