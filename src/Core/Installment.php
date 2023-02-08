<?php

declare(strict_types=1);

namespace OxidEsales\InstallmentModule\Core;

use Brick\Math\Exception\MathException;
use Brick\Math\Exception\NumberFormatException;
use Brick\Math\Exception\RoundingNecessaryException;
use Brick\Math\RoundingMode;
use Brick\Money\Exception\MoneyMismatchException;
use Brick\Money\Exception\UnknownCurrencyException;
use Brick\Money\Money;

class Installment
{
    private Money $fullPrice;
    private Money $firstPayment;
    private Money $monthlyPayment;
    private int $paymentMonths;

    /**
     * @throws RoundingNecessaryException
     * @throws MoneyMismatchException
     * @throws MathException
     * @throws UnknownCurrencyException
     * @throws NumberFormatException
     */
    public function __construct(float $fullPrice, float $firstPayment, int $paymentMonths, string $currency)
    {
        $this->fullPrice = Money::of($fullPrice, $currency);
        $this->firstPayment = Money::of($firstPayment, $currency);
        $this->paymentMonths = $paymentMonths;
        $this->monthlyPayment = $this->calculateMonthlyPayment();
    }

    /**
     * @throws MathException
     * @throws MoneyMismatchException
     */
    private function calculateMonthlyPayment(): Money
    {
        return $this->fullPrice->minus($this->firstPayment)->dividedBy($this->paymentMonths, RoundingMode::UP);
    }

    public function getFirstPayment(): Money
    {
        return $this->firstPayment;
    }

    public function getMonthlyPayment(): Money
    {
        return $this->monthlyPayment;
    }

    public function getFullPrice(): Money
    {
        return $this->fullPrice;
    }

    public function getPaymentMonths(): int
    {
        return $this->paymentMonths;
    }
}