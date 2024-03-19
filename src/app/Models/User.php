<?php

namespace App\Models;

use App\Entities\UserEntity;
use Floky\Models\Model;

class User extends Model
{

    protected $entity = UserEntity::class;

    protected $fillable = ['*'];

}