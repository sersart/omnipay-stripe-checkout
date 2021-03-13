<?php

namespace DigiTickets\Stripe;

use DigiTickets\Stripe\Messages\CompletePurchaseRequest;
use DigiTickets\Stripe\Messages\PurchaseRequest;
use DigiTickets\Stripe\Messages\RefundRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

class CheckoutGateway extends AbstractGateway
{
    /**
     * Get the gateway API Key (the "secret key").
     *
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->getParameter('apiKey');
    }

    /**
     * Set the gateway API Key.
     *
     * @return AbstractGateway provides a fluent interface.
     */
    public function setApiKey($value): AbstractGateway
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * Get the gateway public Key (the "publishable key").
     *
     * @return string
     */
    public function getPublic(): string
    {
        return $this->getParameter('public');
    }

    /**
     * Set the gateway public Key.
     *
     * @return AbstractGateway provides a fluent interface.
     */
    public function setPublic($value): AbstractGateway
    {
        return $this->setParameter('public', $value);
    }

    public function getName()
    {
        return 'Stripe (Checkout)';
    }

    public function purchase(array $parameters = []): RequestInterface
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = []): RequestInterface
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }

    public function refund(array $parameters = []): RequestInterface
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }
}
