(function ($) {
    let tableAction = $('.table-action'),
        actionForm = $('.action-form'),
        actionModal = $('.action-modal'),
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

        actionForm.attr('action', $(this).data('url'));
    });
})(jQuery);
