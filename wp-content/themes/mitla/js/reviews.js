function reviews() {
    // открыть/закрыть блок "оставить отзывы"
    function leaveReview() {
        const btn = document.querySelector('.reviews_button-leave')
        const form = document.querySelector('.reviews_form')

        btn.addEventListener('click', e => {
            e.preventDefault()
            form.classList.toggle('active')
        })
    }
    document.querySelector('.reviews_form') && leaveReview()

    function validationForm(reviewForm) {
        const name = reviewForm.querySelector('#reviews_form-name')
        const contact = reviewForm.querySelector('#reviews_form-telemail')
        const review = reviewForm.querySelector('#reviews_form-text')

        let res = false;

        if (name.value.length <= 0) {
            name.closest('label').classList.add('error')
        } else {
            name.closest('label').classList.remove('error')
        }

        if (contact.value.length <= 0) {
            contact.closest('label').classList.add('error')
        } else {
            contact.closest('label').classList.remove('error')
        }

        if (review.value.length <= 50) {
            review.closest('label').classList.add('error')
            review.closest('label').querySelector('.hint').style.display = 'block';
        } else {
            review.closest('label').classList.remove('error')
            review.closest('label').querySelector('.hint').style.display = 'none';
        }

        for (var i = 0; i < reviewForm.querySelectorAll('label').length; i++) {
            if (reviewForm.querySelectorAll('label')[i].classList.contains('error')) {
                res = false;
                break;
            }

            res = true;
        }

        return res;
    }


    function send() {
        document.addEventListener('DOMContentLoaded', function() {
            const reviewForm = document.getElementById('reviewForm');

            if (reviewForm) {
                reviewForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    if (validationForm(reviewForm)) {

                        let defaultOptions = {
                            duration: 1500,
                            gravity: 'top',
                            position: 'right',
                            backgroundColor: '#b1b425de',
                            stopOnFocus: true,
                            offset: {
                                y: 120
                            },
                        };

                        Toastify({
                            ...defaultOptions,
                            text: 'Обработка запроса!'
                        }).showToast();

                        const button = reviewForm.querySelector('button');

                        button.setAttribute('disabled', 'disabled');
                        button.style.backgroundColor = '#913833';

                        let formData = new FormData(reviewForm);
                        formData.append('action', 'submit_review');

                        fetch('/wp-admin/admin-ajax.php', {
                                method: 'POST',
                                body: formData,
                            })
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(data) {
                                if (data == 1) {
                                    button.removeAttribute('disabled');
                                    button.style.backgroundColor = '#F25E57';

                                    Toastify({
                                        ...defaultOptions,
                                        text: 'Отзыв добавлен!',
                                        backgroundColor: '#47d0d2cc'
                                    }).showToast();
                                } else {
                                    button.removeAttribute('disabled');
                                    button.style.backgroundColor = '#F25E57';

                                    Toastify({
                                        ...defaultOptions,
                                        text: 'Ошибка при отправке!',
                                        backgroundColor: '#ad403bd4'
                                    }).showToast();
                                }
                            })
                            .catch(function(error) {
                                console.error(error);

                                button.removeAttribute('disabled');
                                button.style.backgroundColor = '#F25E57';
                            })
                            .finally(function() {
                                reviewForm.reset();

                                Toastify({
                                    ...defaultOptions,
                                    text: 'Благодарим за отзыв!',
                                    backgroundColor: '#47d0d2cc'
                                }).showToast();
                            });

                        }
                });
            }

        });
    }
    send()
}
reviews()