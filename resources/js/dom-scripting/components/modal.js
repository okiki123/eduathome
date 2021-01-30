(function ($) {
    let tableAction = $('.table-action'),
        actionForm = $('.action-form'),
        actionModal = $('.action-modal'),
        addBtn = $('.add-btn'),
        formInput = $('.form-input'),
        submitButton = $('.submit-button'),
        methodInput = $('[name="_method"]')
        field = actionModal.find('[data-attribute]');

    tableAction.on('click', function () {
        let that = $(this);
        field.each(function() {
            let attribute = $(this).data('attribute');
            let tagName = $(this).prop('tagName');
            if (tagName === 'INPUT') {
                $(`[data-attribute=${attribute}]`).val(that.data(attribute));
            } else if (tagName === 'P') {
                $(`[data-attribute=${attribute}]`).text(that.data(attribute));
            } else if (tagName === 'IMG') {
                $(`[data-attribute=${attribute}]`).attr('src', that.data(attribute));
            } else if (tagName === "A") {
                $(`[data-attribute=${attribute}]`).attr('href', that.data(attribute));
            }
        });

        formInput.trigger('change');

        actionModal.find('.modal-title').html($(this).data('title'))
        actionForm.attr('action', $(this).data('url'));
    });

    addBtn.on('click', function () {
        actionForm.trigger('reset');
        actionModal.find('.modal-title').html($(this).data('title'))
        actionForm.attr('action', $(this).data('url'));

        methodInput.val($(this).data('method'));
    });

    formInput.on('change keyup', function () {
       if (!$(this).val()) {
           $(this).addClass('is-invalid');
           $(this).prev().addClass('text-danger');
           $(this).next().html('This field is required');
       } else {
           $(this).removeClass('is-invalid');
           $(this).prev().removeClass('text-danger');
           $(this).next().html('');
       }

        let valid = true;
        actionForm.find('.form-input').each((index, item) => {
            valid = valid && !!($(item).val());

            if (valid) submitButton.attr('disabled', false);
            else submitButton.attr('disabled', true);
       })
    });
})(jQuery);
