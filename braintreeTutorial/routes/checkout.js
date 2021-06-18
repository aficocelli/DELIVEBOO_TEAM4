const express = require('express');
const router = express.Router();
const braintree = require('braintree');
var submitForSettlement = false;

router.post('/', (req, res, next) => {
  const gateway = new braintree.BraintreeGateway({
    environment: braintree.Environment.Sandbox,
    // Use your own credentials from the sandbox Control Panel here
    merchantId: 'vrb283q9636zqbjb',
    publicKey: 'wwhnc5c4wfcnv5hd',
    privateKey: '5ae7dbaa7ab297c41977be100d0dec3b'
  });

  // Use the payment method nonce here
  const nonceFromTheClient = req.body.paymentMethodNonce;
  // Create a new transaction for $10
  let newTransaction = gateway.transaction.sale({
    amount: '30.00',
    paymentMethodNonce: nonceFromTheClient,
    options: {
      // This option requests the funds from the transaction
      // once it has been authorized successfully
      submitForSettlement: true
    }
  }, (error, result) => {
      if (result) {
        res.send(result);
      } else {
        res.status(500).send(error);
      }
  });
});

module.exports = router;
