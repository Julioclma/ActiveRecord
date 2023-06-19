<?php

namespace Activerecord\app\database\interfaces;

interface ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface) : void;

}
