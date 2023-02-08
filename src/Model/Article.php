<?php

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
        return ($this->getFirstPayment() !== 0.0) && ($this->getPaymentMonths() !== 0);
    }

    public function getFirstPayment(): ?float
    {
        return (float)$this->getFieldData('OXFIRSTPAYMENT');
    }

    public function getPaymentMonths(): ?int
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
                $this->installment = new Installment(
                            $this->getPrice(),
                         $this->getFirstPayment(),
                       $this->getPaymentMonths()
                );
            }

            return true;
        }

        return false;
    }
}

