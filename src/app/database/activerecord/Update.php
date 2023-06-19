<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\interfaces\ActiveRecordInterface;
use Activerecord\app\database\interfaces\UpdateInterface;

class Update implements UpdateInterface
{
    public function update(ActiveRecordInterface $activeRecordInterface) : void
    {
var_dump($activeRecordInterface->getAttributes());
    }

}
