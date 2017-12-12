<?php

namespace Chelout\Robokassa;

use Lexty\Robokassa\Auth;
use Lexty\Robokassa\Payment;

class Robokassa
{

    protected $testMode;
    protected $shopId;
    protected $hashAlgo;
    protected $testPassword1;
    protected $testPassword2;
    protected $password1;
    protected $password2;
    protected $resultUrl;
    protected $successUrl;
    protected $failUrl;

    public $auth;
    public $payment;

    public function __construct()
    {
        $config = config('robokassa');

        if (empty($config)) {
            throw new \Exception('Config is not defined');
        }

        $this->testMode = $config['test_mode'];
        $this->shopId = $config['shop_id'];
        $this->hashAlgo = $config['hash_algo'];
        $this->password1 = $this->testMode ? $config['test_password1'] : $config['password1'];
        $this->password2 = $this->testMode ? $config['test_password2'] : $config['password2'];
        $this->resultUrl = $config['result_url'];
        $this->successUrl = $config['success_url'];
        $this->failUrl = $config['fail_url'];

        $this->auth = new Auth($this->shopId, $this->password1, $this->password2, $this->testMode);
        $this->auth->setHashAlgo($this->hashAlgo);
    
        $this->payment = new Payment($this->auth);
    }

    public function setId($id)
    {
        $this->payment->setId($id);

        return $this;
    }

    public function setSum($sum)
    {
        $this->payment->setSum($sum);

        return $this;
    }

    public function setCulture($culture)
    {
        $this->payment->setCulture($culture);

        return $this;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->payment->setPaymentMethod($paymentMethod);

        return $this;
    }

    public function setEncoding($encoding)
    {
        $this->payment->setEncoding($encoding);

        return $this;
    }

    public function setEmail($email)
    {
        $this->payment->setEmail($email);

        return $this;
    }

    public function setExpirationDate($expirationDate, $format = '')
    {
        $this->payment->setExpirationDate($expirationDate, $format);

        return $this;
    }

    public function setCurrency($currency)
    {
        $this->payment->setCurrency($currency);

        return $this;
    }

    // public function setCustomParams(array $params)
    // {
    //     $this->payment->setCustomParams($params);

    //     return $this;
    // }

    // public function setShp(array $params)
    // {
    //     $this->payment->setShp($params);

    //     return $this;
    // }

    // public function setCustomParam($param)
    // {
    //     $this->payment->setCustomParam($param);

    //     return $this;
    // }

    public function setDescription($description)
    {
        $this->payment->setDescription($description);

        return $this;
    }

    public function getFormUrl($type = null)
    {
        return $this->payment->getFormUrl($type);
    }

    public function getPaymentUrl()
    {
        return $this->payment->getPaymentUrl();
    }
}
