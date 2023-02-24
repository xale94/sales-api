<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;

class BaseEntity extends Model
{
    public static function getTableName()
    {
        return (new self())->getTable();
    }
}
