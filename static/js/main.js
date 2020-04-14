let ajax_form = function (e) {
    if (e.target.classList.contains('ajax-form')) {
        e.preventDefault();
        if ( !e.target.querySelectorAll('input:invalid').length ) {
            if (e.target.dataset.action) {
                let data = new FormData(e.target);
                fetch(e.target.dataset.action, {
                    body: data,
                    method: e.target.attributes.getNamedItem('method').value
                })
                    .then((response) => response.json())
                    .then(function (response) {
                        check_redirect(response);
                        if (response.replace_id) {
                            let repalaced = document.querySelectorAll('.task[data-id]');
                            let replace_item;
                            repalaced.forEach(function (elem) {
                                if (elem.dataset.id == response.replace_id) {
                                    replace_item = elem;
                                }
                            });
                            console.log(replace_item);
                            if (replace_item) {
                                replace_item.outerHTML = response.replace;
                            }
                        }
                        if (response.html) {
                            e.target.outerHTML = response.html;
                        }
                    })
            }
        }
    }
};

let modal = function (e) {
    if ( e.target.classList.contains('in-modal') ) {
        let url = e.target.dataset['url'];
        if (url) {
            e.preventDefault();
            fetch(url)
                .then((response) => response.json())
                .then(function (response) {
                    check_redirect(response);
                    if (response.html) {
                        let modal = document.querySelector('.modal-c .modal__content');
                        if (modal) {
                            document.querySelector('.modal-c').classList.add('opened');
                            document.querySelector('body').classList.add('no-scroll');
                            modal.innerHTML = response.html;
                        }
                    }
                });
        }
    }
    let close = function () {
        document.querySelector('.modal-c').classList.remove('opened');
        document.querySelector('body').classList.remove('no-scroll');
    };

    if ( e.target.classList.contains('modal__close') ) {
        close();
    }
    if (document.querySelector('.modal-c').classList.contains('opened')) {
        if ( !e.target.classList.contains('modal__canvas') && !e.target.closest('.modal__canvas') ) {
            close();
        }
    }
};
let edited = function(e) {
    if ( e.target.classList.contains('js-edit') ) {
        let element = e.target.closest('.js-edited');
        if (element) {
            if (element.classList.contains('editable')) {
                element.classList.remove('editable');
            } else {
                element.classList.add('editable');
            }
        }
    }
};

let check_redirect = function(response) {
    if (response.reload) {
        location.reload();
    }
    if (response.redirect) {
        location.href = response.redirect;
    }
};

let sort = function(e) {
    if (e.target.classList.contains('sorted')) {
        location.href = e.target.selectedOptions.item(0).value
    }
}
document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('submit', ajax_form);
    document.addEventListener('click', edited);
    document.addEventListener('click', modal);
    document.addEventListener('change', sort);
});