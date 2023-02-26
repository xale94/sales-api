<?php namespace App\Traits;

trait CanGetTableNameStatically
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}