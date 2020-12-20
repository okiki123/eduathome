<?php

/* @properties */
/* @string $id */
/* @string $url */
/* @string $title */
/* @string $content */
/* @string $saveBtnText */
/* @string $closeBtnText */
/* @array $attributes */

?>

<form action="{{ $url }}" method="post" class="action-form">
    @csrf
    @method('PUT')

    <div class="modal fade action-modal"
         id="{{ $id }}"
         tabindex="-1" role="dialog"
         aria-labelledby="{{ $id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ $content }}</p>
                    @foreach($attributes as $attribute)
                        <input type="hidden" data-attribute="{{ $attribute }}" name="{{ $attribute }}">
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $closeBtnText ?? 'Close' }}</button>
                    <button type="submit" class="btn btn-primary">{{ $saveBtnText ?? 'Save' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
