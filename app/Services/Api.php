<?php

namespace App\Services;

class Api
{
    private $api_url;
    private $api_key;

    public function __construct($api_url, $api_key)
    {
        $this->api_url = $api_url;
        $this->api_key = $api_key;
    }
    /** API URL */
    //public $api_url = 'https://drd3m.me/api/v2';
    /** Your API key */
    //  public $api_key = '698537e2ce4e3e8069ce577ee8ed160e';

    /** Get services */
    public function services()
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'services',
            ])
        );
    }

    ///////////////////////// Add Order ////////////////////////
    public function order($data)
    {
        $post = array_merge(['key' => $this->api_key, 'action' => 'add'], $data);
        return json_decode($this->connect($post));
    }

    ######################### Order Status ###################
    public function status($order_id)
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'status',
                'order' => $order_id
            ])
        );
    }

    ########################## Refill Order ##################
    public function refill($order_id)
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'refill',
                'order' => $order_id,
            ])
        );
    }

    ######################## Cancel Order ######################
    public function cancel($order_id)
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'cancel',
                'order' => $order_id,
            ]),
            true,
        );
    }

    /** Connect to API */
    private function connect($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
