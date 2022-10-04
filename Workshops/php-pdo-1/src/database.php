<?php

require_once "../env.php";

function createPDO(): PDO
{
    return new PDO(DSN, DBUSER, DBPASS);
}
