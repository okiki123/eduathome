<?php
    $data = session('message') ?? ['data' => ''];
?>

@if($errors->any())
    <?php
        $data = [
            'status' => 'error',
            'message' => $errors->all()[0]
        ]
    ?>
@endif

<div id="toastr-notification" data-props="{{ json_encode($data) }}"></div> <!-- Rendered by react component -->
