<?php

/* @properties */
/* @string $id */
/* @string $route */
/* @string $modal_title */
/* @string $content */
/* @string $saveBtnText */
/* @string $closeBtnText */
/* @array $attributes */

?>

<form class="action-form" method="Post">
    @csrf

{{--    @method($method ?? "PUT")--}}

    <div class="modal fade action-modal" id="{{ $id }}" role="dialog" aria-labelledby="{{ $id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $modal_title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div>
                        <input type="hidden" name="_method" class="form-input" data-attribute="method">
                    </div>

                    <!-- School Name -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input class="form-control form-input" id="school_name" name="school_name" data-attribute="school_name">
                                <small class="form-text text-danger error"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Entry Year -->
                            <div class="form-group">
                                <label for="entry_year">Entry Year</label>
                                <input type="number" class="form-control form-input" id="entry_year" name="entry_year" data-attribute="entry_year">
                                <small class="form-text text-danger error"></small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Graduation Year -->
                            <div class="form-group">
                                <label for="graduation_year">Graduation Year</label>
                                <input type="number" class="form-control form-input" id="graduation_year" name="graduation_year" data-attribute="graduation_year">
                                <small class="form-text text-danger error"></small>
                            </div>
                        </div>
                    </div>

                    <!-- Degree -->
                    <div class="form-group">
                        <label for="degree">Degree</label>
                        <input class="form-control form-input" id="degree" name="degree" data-attribute="degree">
                        <small class="form-text text-danger error"></small>
                    </div>

                    <!-- Discipline -->
                    <div class="form-group">
                        <label for="discipline">Discipline</label>
                        <input class="form-control form-input" id="discipline" name="discipline" data-attribute="discipline">
                        <small class="form-text text-danger error"></small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                            data-dismiss="modal">{{$closeBtnText ?? "Close"}}</button>
                    <button type="submit" disabled="{{true}}" class="btn btn-primary submit-button">{{$saveBtnText ?? "Save"}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
