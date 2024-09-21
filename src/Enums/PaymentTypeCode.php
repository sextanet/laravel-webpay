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

    public function getDescription(): string
    {
        return match ($this) {
            self::VD => 'Venta Débito',
            self::VN => 'Venta Normal',
            self::VC => 'Venta en Cuotas',
            self::SI => '3 cuotas sin interés',
            self::S2 => '2 cuotas sin interés',
            self::NC => 'N cuotas sin interés',
            self::VP => 'Venta Prepago',
            default => 'Desconocido',
        };
    }
}
