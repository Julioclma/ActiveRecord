<?php

function formatExcetion(Throwable $throw)
{
    var_dump("erro no arquivo {$throw->getFile()} na linha {$throw->getLine()} messagem {$throw->getMessage()}");
}