<?php

namespace App\Entities;

use DateTime;
use Nexa\Attributes\Common\AutoIncrement;
use Nexa\Attributes\Common\Comment;
use Nexa\Attributes\Common\DefaultValue;
use Nexa\Attributes\Common\ForeignKey;
use Nexa\Attributes\Common\Nullable;
use Nexa\Attributes\Common\PrimaryKey;
use Nexa\Attributes\Dates\DateAndTime;
use Nexa\Attributes\Entities\Entity;
use Nexa\Attributes\Numbers\Number;
use Nexa\Attributes\Numbers\SmallInt;
use Nexa\Attributes\Strings\Strings;
use Nexa\Nexa;

#[Entity]
class UserEntity
{

    #[PrimaryKey]
    #[SmallInt]
    #[AutoIncrement(true)]
    public int $id;

    #[Strings]
    public string $username;

    #[Number]
    #[Comment('user profile')]
    #[Nullable]
    public int $profile;

    #[DateAndTime]
    public DateTime $created_at;
}
