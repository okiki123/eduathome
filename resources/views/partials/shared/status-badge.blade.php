<?php
    $classes = [
        'approved' => 'badge-success',
        'unapproved' => 'badge-warning',
        'inactive' => 'badge-secondary',
        'suspended' => 'badge-danger'
    ];
?>

<span class="badge badge-pill {{$classes[$status]}}">{{ucfirst($status)}}</span>
