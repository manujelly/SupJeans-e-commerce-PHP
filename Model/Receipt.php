<?php
/**
 * Created by PhpStorm.
 * User: jelly
 * Date: 22/04/2019
 * Time: 09:56
 */

class Receipt
{
    /**
     * @var string
     */
    private $js_name;
    /**
     * @var string
     */
    private $delivery_adress;
    /**
     * @var string
     */
    private $billing_adress;
    /**
     * @var DateTime
     */
    private $transaction_date;

    /**
     * @return string
     */
    public function getJsName(): string
    {
        return $this->js_name;
    }

    /**
     * @param string $js_name
     */
    public function setJsName(string $js_name): void
    {
        $this->js_name = $js_name;
    }

    /**
     * @return string
     */
    public function getDeliveryAdress(): string
    {
        return $this->delivery_adress;
    }

    /**
     * @param string $delivery_adress
     */
    public function setDeliveryAdress(string $delivery_adress): void
    {
        $this->delivery_adress = $delivery_adress;
    }

    /**
     * @return string
     */
    public function getBillingAdress(): string
    {
        return $this->billing_adress;
    }

    /**
     * @param string $billing_adress
     */
    public function setBillingAdress(string $billing_adress): void
    {
        $this->billing_adress = $billing_adress;
    }

    /**
     * @return DateTime
     */
    public function getTransactionDate(): DateTime
    {
        return $this->transaction_date;
    }

    /**
     * @param DateTime $transaction_date
     */
    public function setTransactionDate(DateTime $transaction_date): void
    {
        $this->transaction_date = $transaction_date;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @var int
     */
    private $price;

    /**
     * @var string user
     */
    private $user;


}
