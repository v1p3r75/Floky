<?php

namespace App\Entities;

use DateTime;
use Nexa\Attributes\Common\AutoIncrement;
use Nexa\Attributes\Common\Nullable;
use Nexa\Attributes\Common\PrimaryKey;
use Nexa\Attributes\Common\Unique;
use Nexa\Attributes\Dates\DateAndTime;
use Nexa\Attributes\Entities\Entity;
use Nexa\Attributes\Numbers\SmallInt;
use Nexa\Attributes\Strings\Strings;

#[Entity]
class UserEntity
{

    #[PrimaryKey]
    #[SmallInt]
    #[AutoIncrement]
    public int $id;


    #[Strings]
    public string $firstname;


    #[Strings]
    public string $lastname;


    #[Strings]
    #[Unique]
    public string $email;

    #[Strings]
    public string $password;

    #[Strings]
    #[Nullable]
    public string $address;


    #[DateAndTime]
    #[Nullable]
    public DateTime $created_at;


    #[DateAndTime]
    #[Nullable]
    public DateTime $updated_at;


    #[DateAndTime]
    #[Nullable]
    public DateTime $deleted_at;
}
