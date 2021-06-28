// import { create } from 'braintree-web-drop-in';

// create({ /* options */ }, callback);

var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_fw7m6dc3_3f58gf44rjwx3cz4',
  container: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  });
});
