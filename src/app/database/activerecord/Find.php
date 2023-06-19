<?php

namespace Activerecord\app\database\activerecord;
use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;

class Find implements ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface): void
    {
       var_dump($activeRecordInterface->getAttributes());
    }
}
