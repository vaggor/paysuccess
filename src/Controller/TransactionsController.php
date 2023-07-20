<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\SettingsTable;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * Transactions Controller
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {   
        //$sess = $this->request->getSession()->read('Auth.User');
        $merchant_id = 1;
        $transactionsTbl = TableRegistry::get('Transactions');
        $statusesTbl = TableRegistry::get('Statuses');
        $settingsTbl = TableRegistry::get('Settings');
        $merchant_amt = $settingsTbl->getAmount($merchant_id=1);
        $statuses = $statusesTbl->listStatuses();

        $merchant_charge = 0.01 * $merchant_amt;
        if (!$this->request->is('post')) {
            $res = $transactionsTbl->getTodaysPayment($merchant_id);
        }
        else {
            $data = $this->request->getData();
            //print_r($data['start_date']);exit;
            $res = $transactionsTbl->getReport($data['start_date'], $data['end_date'], $merchant_id);
        }
        $this->set(compact('res','statuses','merchant_charge'));
    }


    /**
     *  checkout method
     *  Renders a checkout view
     * 
     */
     public function checkout($token=null)
     {
        //$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6InRlc3RAZ21haWwuY29tIiwiZmlyc3RfbmFtZSI6IkpvaG4iLCJsYXN0X25hbWUiOiJEb2UiLCJhbW91bnQiOiIyMDAiLCJpYXQiOjE1MTYyMzkwMjJ9.HqvfdkGUwiSCC07kBa1yaWop7uo5fSl7xuGaKKzTioM';
        if(!$token){
            print_r('Ooops something is wrong. You have not been charge');
            exit;
        }

        try{
            $settings = new SettingsTable();
            $key = $settings->getSecretKay($merchant_id=1);
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            //print_r($decoded);exit;
            $email = $decoded->email;
            $fname = $decoded->first_name;
            $lname = $decoded->last_name;
            $amount = $decoded->amount * 100;
            //print_r($decoded);
            //exit;
            $page_title = 'Checkout';
            //$settings = TableRegistry::get('Settings');
            $public_key = $settings->getPublicKay($merchant_id=1);
            //print_r($public_key);exit;
            $this->set(compact('page_title','public_key','email','fname','lname','amount'));
        }
        catch(Exception $e){
            print_r('Sorry something went wrong');
            exit;
        }
        
     }



    /**
     * webhook method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function webhook()
    {
        /*$input = @file_get_contents("php://input");
        $webhookLogsTbl = TableRegistry::get('WebhookLogs');
        $lastInsertedId = $webhookLogsTbl->logPayload($input);
        $log_id = (int)$lastInsertedId;
        exit;*/

        $input = 'input val init';
        $webhookLogsTbl = TableRegistry::get('WebhookLogs');
        //$lastInsertedId = $webhookLogsTbl->logPayload($input);


        // only a post with paystack signature header gets our attention
        if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) {
            $input = 'payload has no paystack signature in header';
            $lastInsertedId = $webhookLogsTbl->logPayload($input);
            http_response_code(403);
            exit();
        }

        // Retrieve the request's body
        $input = @file_get_contents("php://input");
        $settings = new SettingsTable();
        $secret_key = $settings->getSecretKay($merchant_id=1);
        define('PAYSTACK_SECRET_KEY',$secret_key);
        //$this->log(PAYSTACK_SECRET_KEY,'debug');

        // validate event do all at once to avoid timing attack
        if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY)){
            $input = 'payload has wrong paystack signature in header';
            $lastInsertedId = $webhookLogsTbl->logPayload($input);
            http_response_code(403);
            exit();
        }

        http_response_code(200);

        $lastInsertedId = $webhookLogsTbl->logPayload($input);
        $log_id = (int)$lastInsertedId;

        // parse event (which is json string) as object
        // Do something - that will not take long - with $event
        $event = json_decode($input);

        $payment_id = $event->data->id;
        $ref = $event->data->reference;
        $amount = $event->data->amount;
        $currency = $event->data->currency;
        $ip = $event->data->ip_address;
        $name = $event->data->customer->first_name.' '.$event->data->customer->last_name;
        $email = $event->data->customer->email;
        $phone = $event->data->customer->phone;
        $payment_date = $event->data->paid_at;
        $last_four = $event->data->authorization->last4;
        $merchant_id = 1;
        //print_r($log_id);exit;

        if ($event->event == 'charge.success') {
          // Fulfill any orders, e-mail receipts, etc
          // To cancel the payment you will need to issue a Refund (https://stripe.com/docs/api/refunds)
            $status_id = 1;
            $this->Transactions->logPayment($payment_id,$ref,$log_id,$last_four,$amount,$currency,$name,$email,$phone,$payment_date,$status_id,$ip,$merchant_id);
        }
        else if ($event->type == 'charge.failed') {
            $status_id = 2;
            $this->Transactions->logPayment($payment_id,$ref,$log_id,$last_four,$amount,$currency,$name,$email,$phone,$payment_date,$status_id,$ip,$merchant_id);
        }

        exit();
    }

    
}
