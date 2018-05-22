<?php
namespace Worldpay;
?>

<?php
/**
 * PHP library version: 2.1.0
 */

require_once('./init.php');
class Worldpay1
{
    public function wpayment($val)
    {

       $worldpay = new Worldpay("T_S_434c67b7-27eb-4ee8-938e-fca157cf5a4d");

//print_r($worldpay);exit;
//echo "in create order";exit;
// Sometimes your SSL doesnt validate locally
// DONT USE IN PRODUCTION
$worldpay->disableSSLCheck(true);

$directOrder = isset($val['direct-order']) ? $val['direct-order'] : false;
$token = (isset($val['token'])) ? $val['token'] : null;
$name = $val['name'];
$shopperEmailAddress = $val['shopper-email'];

$amount = 0;
if (isset($val['amount']) && !empty($val['amount'])) {
    $amount = is_numeric($val['amount']) ? $val['amount']*100 : -1;
}

$orderType = $val['order-type'];

$_3ds = (isset($val['3ds'])) ? $val['3ds'] : false;
$authorizeOnly = (isset($val['authorizeOnly'])) ? $val['authorizeOnly'] : false;
$customerIdentifiers = (!empty($val['customer-identifiers'])) ? json_decode($val['customer-identifiers']) : array();

include('header.php');

// Try catch
try {
    // Customers billing address
    $billing_address = array(
        "address1"=> $val['delivery-address1'],
        "address2"=> $val['delivery-address2'],
        "address3"=> '',
        "postalCode"=> $val['delivery-postcode'],
        "city"=> $val['delivery-city'],
        "state"=> $val['delivery-state'],
        "countryCode"=>'', 
        "telephoneNumber"=> $val['delivery-telephoneNumber']
    );
//$val['delivery-countryCode'],
    // Customers delivery address
    $delivery_address = array(
        "firstName" => $val['delivery-firstName'],
        "lastName" => $val['delivery-lastName'],
        "address1"=> $val['delivery-address1'],
        "address2"=> $val['delivery-address2'],
        "address3"=> '',
        "postalCode"=> $val['delivery-postcode'],
        "city"=> $val['delivery-city'],
        "state"=> $val['delivery-state'],
        "countryCode"=> '',
        "telephoneNumber"=> $val['delivery-telephoneNumber']
    );

    if ($orderType == 'APM') {

        $obj = array(
            'orderDescription' => $val['description'], // Order description of your choice
            'amount' => $amount, // Amount in pence
            'currencyCode' => $val['currency'], // Currency code
            'settlementCurrency' => $val['settlement-currency'], // Settlement currency code
            'name' => $name, // Customer name
            'shopperEmailAddress' => $shopperEmailAddress, // Shopper email address
            'billingAddress' => $billing_address, // Billing address array
            'deliveryAddress' => $delivery_address, // Delivery address array
            'customerIdentifiers' => (!is_null($customerIdentifiers)) ? $customerIdentifiers : array(), // Custom indentifiers
            'statementNarrative' => $val['statement-narrative'],
            'orderCodePrefix' => $val['code-prefix'],
            'orderCodeSuffix' => $val['code-suffix'],
            'customerOrderCode' => $val['customer-order-code'], // Order code of your choice
            'successUrl' => $val['success-url'], //Success redirect url for APM
            'pendingUrl' => $val['pending-url'], //Pending redirect url for APM
            'failureUrl' => $val['failure-url'], //Failure redirect url for APM
            'cancelUrl' => $val['cancel-url'] //Cancel redirect url for APM
        );

        if ($directOrder) {
            $obj['directOrder'] = true;
            $obj['shopperLanguageCode'] = isset($val['language-code']) ? $val['language-code'] : "";
            $obj['reusable'] = (isset($val['chkReusable']) && $val['chkReusable'] == 'on') ? true : false;

            $apmFields = array();
            if (isset($val['swiftCode'])) {
                $apmFields['swiftCode'] = $val['swiftCode'];
            }

            if (isset($val['shopperBankCode'])) {
                $apmFields['shopperBankCode'] = $val['shopperBankCode'];
            }

            if (empty($apmFields)) {
                $apmFields =  new stdClass();
            }

            $obj['paymentMethod'] = array(
                  "apmName" => $val['apm-name'],
                  "shopperCountryCode" => $val['countryCode'],
                  "apmFields" => $apmFields
            );
        }
        else {
            $obj['token'] = $token; // The token from WorldpayJS
        }

        $response = $worldpay->createApmOrder($obj);

        if ($response['paymentStatus'] === 'PRE_AUTHORIZED') {
            // Redirect to URL
            $_SESSION['orderCode'] = $response['orderCode'];
            ?>
            <script>
                window.location.replace("<?php echo $response['redirectURL'] ?>");
            </script>
            <?php
        } else {
            // Something went wrong
            echo '<p id="payment-status">' . $response['paymentStatus'] . '</p>';
            throw new WorldpayException(print_r($response, true));
        }

    }
    else {

        $obj = array(
            'orderDescription' => $val['description'], // Order description of your choice
            'amount' => $amount, // Amount in pence
            'is3DSOrder' => $_3ds, // 3DS
            'authorizeOnly' => $authorizeOnly,
            'siteCode' => $val['site-code'],
            'orderType' => $val['order-type'], //Order Type: ECOM/MOTO/RECURRING
            'currencyCode' => $val['currency'], // Currency code
            'settlementCurrency' => $val['settlement-currency'], // Settlement currency code
            'name' => ($_3ds && true) ? '3D' : $name, // Customer name
            'shopperEmailAddress' => $shopperEmailAddress, // Shopper email address
            'billingAddress' => $billing_address, // Billing address array
            'deliveryAddress' => $delivery_address, // Delivery address array
            'customerIdentifiers' => (!is_null($customerIdentifiers)) ? $customerIdentifiers : array(), // Custom indentifiers
            'statementNarrative' => $val['statement-narrative'],
            'orderCodePrefix' => $val['code-prefix'],
            'orderCodeSuffix' => $val['code-suffix'],
            'customerOrderCode' => $val['customer-order-code'] // Order code of your choice
        );

        if ($directOrder) {
            $obj['directOrder'] = true;
            $obj['shopperLanguageCode'] = isset($val['language-code']) ? $val['language-code'] : "";
            $obj['reusable'] = (isset($val['chkReusable']) && $val['chkReusable'] == 'on') ? true : false;
            $obj['paymentMethod'] = array(
                  "name" => $val['name'],
                  "expiryMonth" => $val['expiration-month'],
                  "expiryYear" => $val['expiration-year'],
                  "cardNumber"=>$val['card'],
                  "cvc"=>$val['cvc']
            );
        }
        else {
            $obj['token'] = $token; // The token from WorldpayJS
        }

        $response = $worldpay->createOrder($obj);

        return $response;
        // if ($response['paymentStatus'] === 'SUCCESS' ||  $response['paymentStatus'] === 'AUTHORIZED') {
        //     // Create order was successful!
        //     $worldpayOrderCode = $response['orderCode'];
        //     echo '<p>Order Code: <span id="order-code">' . $worldpayOrderCode . '</span></p>';
        //     echo '<p>Token: <span id="token">' . $response['token'] . '</span></p>';
        //     echo '<p>Payment Status: <span id="payment-status">' . $response['paymentStatus'] . '</span></p>';
        //     echo '<pre>' . print_r($response, true). '</pre>';
        //     // TODO: Store the order code somewhere..
        // } elseif ($response['is3DSOrder']) {
        //     // Redirect to URL
        //     // STORE order code in session
        //     $_SESSION['orderCode'] = $response['orderCode'];
            ?>
            
            <?php
        // } else {
        //     // Something went wrong
        //     echo '<p id="payment-status">' . $response['paymentStatus'] . '</p>';
        //     throw new WorldpayException(print_r($response, true));
        // }
    }
} catch (WorldpayException $e) { // PHP 5.3+
	return $e;
//     // Worldpay has thrown an exception
//     echo 'Error code: ' . $e->getCustomCode() . '<br/>
//     HTTP status code:' . $e->getHttpStatusCode() . '<br/>
//     Error description: ' . $e->getDescription()  . ' <br/>
//     Error message: ' . $e->getMessage();
 }

    }
}