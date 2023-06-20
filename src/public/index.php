<?php
include_once '../../vendor/autoload.php';

use Activerecord\app\database\activerecord\Find;
use Activerecord\app\database\activerecord\Insert;
use Activerecord\app\database\activerecord\Update;
use Activerecord\app\database\models\User;

// $user = new User;

// $user->firstName = 'Julio';
// $user->lastName = 'Mafra';

// var_dump($user->firstName);

$update = new User;

$update->firstName = 'Julio';
$update->lastName = 'Mafra';

$update->execute(new Update('id', '1'));
