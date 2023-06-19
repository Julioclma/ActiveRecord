<?php


namespace Activerecord\app\database\models;

use Activerecord\app\database\activerecord\ActiveRecord;

class User extends ActiveRecord
{
    protected ?string $table = 'users';
}
