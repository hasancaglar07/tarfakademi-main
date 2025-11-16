<?php

namespace App;

enum UserRole: string
{
    case Admin = 'admin';
    case Editor = 'editor';

    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::Editor => 'Editör',
        };
    }
}
