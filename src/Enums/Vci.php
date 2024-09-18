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

    public function getDescription(): string
    {
        return match ($this->value) {
            self::TSY => 'Autenticación exitosa',
            self::TSN => 'Autenticación rechazada',
            self::NP => 'No participa, sin autenticación',
            self::U3 => 'Falla de conexión, autenticación rechazada',
            self::INV => 'Datos inválidos',
            self::A => 'Intentó',
            self::CNP1 => 'Comercio no participa',
            self::EOP => 'Error operacional',
            self::BNA => 'BIN no adherido',
            self::ENA => 'Emisor no adherido',
        };
    }
}
