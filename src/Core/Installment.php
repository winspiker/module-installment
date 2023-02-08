<?php

declare(strict_types=1);

namespace OxidEsales\InstallmentModule\Core;

use OxidEsales\Eshop\Core\Price;

class Installment
{
    private Price $fullPrice;
    private Price $firstPayment;
    private Price $monthlyPayment;
    private int $paymentMonths;

    public function __construct(Price $fullPrice, float $firstPayment, int $paymentMonths)
    {
        $this->fullPrice = $fullPrice;
        $this->firstPayment = new Price($firstPayment);
        $this->paymentMonths = $paymentMonths;
        $this->monthlyPayment = $this->calculateMonthlyPayment();
    }

    private function calculateMonthlyPayment(): Price
    {
        $fullPrice = $this->fullPrice->getPrice() * 100;
        $firstPayment = $this->firstPayment->getPrice() * 100;
        $payment = ($fullPrice - $firstPayment) / $this->paymentMonths;

        return new Price($payment/100);
    }

    /**
     * @return \OxidEsales\Eshop\Core\Price|null
     */
    public function getFirstPayment(): Price
    {
        return $this->firstPayment;
    }

    /**
     * @return \OxidEsales\Eshop\Core\Price
     */
    public function getMonthlyPayment(): Price
    {
        return $this->monthlyPayment;
    }

    /**
     * @return int|null
     */
    public function getPaymentMonths(): int
    {
        return $this->paymentMonths;
    }

    /**
     * @return \OxidEsales\Eshop\Core\Price
     */
    public function getFullPrice(): Price
    {
        return $this->fullPrice;
    }
}