<?php

namespace Activerecord\app\database\interfaces;

interface UpdateInterface
{
    public function update(ActiveRecordInterface $activeRecordInterface) : void;
    
}