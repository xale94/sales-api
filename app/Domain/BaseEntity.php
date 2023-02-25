<?php

namespace App\Domain;

use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Model;

class BaseEntity extends Model
{
    use CanGetTableNameStatically;
}
