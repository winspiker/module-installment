<?php

declare(strict_types=1);

namespace OxidEsales\InstallmentModule\Model;

use OxidEsales\InstallmentModule\Core\Installment;


class Article extends Article_parent
{
    private ?Installment $installment = null;

    public function getInstallment(): ?Installment
    {
        return $this->installment;
    }

    public function isInstallmentActive(): bool
    {
        $fullPrice = $this->getPrice()->getPrice();
        $tooBigFirstPayment = $this->getFirstPayment() > $fullPrice;
        return ($this->getFirstPayment() !== 0.0) && ($this->getPaymentMonths() !== 0) && (!$tooBigFirstPayment);
    }

    public function getFirstPayment(): float
    {
        return (float)$this->getFieldData('OXFIRSTPAYMENT');
    }

    public function getPaymentMonths(): int
    {
        return (int)$this->getFieldData('OXPAYMENTMONTHS');
    }

    public function load($sOXID)
    {
        $this->_blNotBuyableParent = false;

        $aData = $this->_loadData($sOXID);

        if ($aData) {
            $this->assign($aData);

            $this->_saveSortingFieldValuesOnLoad();

            $this->_iStockStatusOnLoad = $this->_iStockStatus;

            $this->_isLoaded = true;

            if ($this->isInstallmentActive()) {
                $currency = $this->getConfig()->getActShopCurrencyObject()->name;
                $fullPrice = $this->getPrice()->getPrice();
                $this->installment = new Installment(
                            $fullPrice,
                         $this->getFirstPayment(),
                       $this->getPaymentMonths(),
                            $currency
                );
            }

            return true;
        }

        return false;
    }
}

