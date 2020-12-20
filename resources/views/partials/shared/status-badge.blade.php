<?php

use App\Tables\BaseTable;

$classes = BaseTable::$classes;

?>

<span class="badge badge-pill {{$classes[$status]}}">{{ucfirst($status)}}</span>
