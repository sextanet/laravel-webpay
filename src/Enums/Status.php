<?php

namespace SextaNet\LaravelWebpay\Enums;

enum Status: string
{
    case INITIALIZED = 'INITIALIZED';
    case AUTHORIZED = 'AUTHORIZED';
    case REVERSED = 'REVERSED';
    case FAILED = 'FAILED';
    case NULLIFIED = 'NULLIFIED';
    case PARTIALLY_NULLIFIED = 'PARTIALLY_NULLIFIED';
    case CAPTURED = 'CAPTURED';

    public function getDescription(): string
    {
        return match ($this) {
            self::INITIALIZED => 'Inicializada',
            self::AUTHORIZED => 'Autorizada',
            self::REVERSED => 'Reversada',
            self::FAILED => 'Fallida',
            self::NULLIFIED => 'Anulada',
            self::PARTIALLY_NULLIFIED => 'Parcialmente Anulada',
            self::CAPTURED => 'Capturada',
            default => 'Desconocido',
        };
    }
}
