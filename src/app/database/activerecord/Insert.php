<?php

namespace Activerecord\app\database\activerecord;

use Activerecord\app\database\interfaces\ActiveRecordExecuteInterface;
use Activerecord\app\database\interfaces\ActiveRecordInterface;
use Activerecord\app\database\interfaces\InsertInterface;

class Insert implements ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface): void
    {
        echo "inserindo..";
    }

}
