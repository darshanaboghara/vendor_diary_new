<?php

require '/home/smi654cvvbw5/public_html/vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51IuVBWSA2MkNlAEjqVqvfw46PdNpd5z3FfQCSRaqqoACSQMG4RvePohJzRhfj91f4xptYcSvPfpOAegIrc0MQ93N00uAD41Psh');

header('Content-Type: application/json');

$YOUR_DOMAIN = base_url();

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'aud',
      'unit_amount' => 2000,
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

echo json_encode(['id' => $checkout_session->id]);