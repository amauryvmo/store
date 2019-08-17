(function($, window, document) {

    $(function() {

        $form = $('form');


        const formOnSubmit = function(e) {
            e.preventDefault();


            axios.post('/cart/addItem')
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log('error: ', error);
                })
                .finally(function () {
                    console.log('finally');
                });
        };

        $form.submit(formOnSubmit);
    });
}(window.jQuery, window, document));
