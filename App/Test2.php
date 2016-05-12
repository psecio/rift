<?php

namespace App;

class Test2
{
    public function __destruct()
    {
        echo '<b>Way to go!</b> You found out the danger behind serialized data where the user can control it!';
    }
}
