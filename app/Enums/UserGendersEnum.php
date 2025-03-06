<?php

namespace App\Enums;

enum UserGendersEnum: int
{
    case UNDEFINED = 0;

    case MALE = 1;

    case FEMALE = 2;

    /**
     * Label
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::UNDEFINED => 'Não definido',
            self::MALE => 'Masculino',
            self::FEMALE => 'Feminino',
        };
    }
}
