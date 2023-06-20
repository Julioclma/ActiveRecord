<?php
include_once '../../vendor/autoload.php';

use Activerecord\app\database\activerecord\Delete;
use Activerecord\app\database\activerecord\Find;
use Activerecord\app\database\activerecord\FindAll;
use Activerecord\app\database\activerecord\Insert;
use Activerecord\app\database\activerecord\Update;
use Activerecord\app\database\models\User;

$update = new User;
$update->firstName = 'João';
$update->lastName = 'Marcos';
$update->execute(new FindAll);
