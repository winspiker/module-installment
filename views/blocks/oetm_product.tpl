[{assign var="isActive" value=$oDetailsProduct->isInstallmentActive()}]

[{if $isActive}]

    [{assign var="oInstallment" value=$oDetailsProduct->getInstallment()}]
    [{assign var="oPaymentMonths" value=$oInstallment->getPaymentMonths()}]
    [{assign var="oFirstPayment" value=$oInstallment->getFirstPayment()}]
    [{assign var="oMonthlyPayment" value=$oInstallment->getMonthlyPayment()}]
    [{assign var="oFullPrice" value=$oInstallment->getFullPrice()}]

    [{oxscript include=$oViewConf->getModuleUrl('oe_installment','out/src/js/jquery.magnific-popup.min.js')}]
    [{oxscript include=$oViewConf->getModuleUrl('oe_installment','out/src/js/jquery.installment_popup.js')}]
    [{oxstyle include=$oViewConf->getModuleUrl('oe_installment','out/src/css/jquery.magnific-popup.css')}]
    [{oxstyle include=$oViewConf->getModuleUrl('oe_installment','out/src/css/popup.css')}]



    <div>
        <ui id="inline-popups">
            <a href="#test-popup" data-effect="mfp-zoom-in">
        <img src="[{$oViewConf->getModuleUrl('oe_installment','out/img/')}]installment_logo.png"
             width=60 alt="logo">
            </a>
        </ui>


        <div id="test-popup" class="white-popup mfp-with-anim mfp-bg mfp-hide">
            <div class="wrapper">
                <div class="title">
                    <img src="[{$oViewConf->getModuleUrl('oe_installment','out/img/')}]installment.jpg" alt="installment">
                    <header>[{oxmultilang ident="INSTALLMENT_TITLE"}]</header>
                </div>
                <div class="content">
                    <div class="popupText">
                        <div class="block1 ">
                            [{oxmultilang ident="INSTALLMENT_FIRST_PAYMENT"}]
                        </div>
                        <div class="block2">
                            [{$oFirstPayment->getPrice()}] [{$currency->sign}]
                        </div>
                    </div>
                    <div class="popupText">
                        <div class="block1 ">
                            [{oxmultilang ident="INSTALLMENT_NUMBER_OF_PAYMENT"}]
                        </div>
                        <div class="block2">
                            [{$oPaymentMonths}] [{oxmultilang ident="MONTHS"}]
                        </div>
                    </div>
                    <div class="popupText">
                        <div class="block1 ">
                            [{oxmultilang ident="INSTALLMENT_MONTHLY_PAYMENT"}]
                        </div>
                        <div class="block2">
                            [{$oMonthlyPayment->getPrice()}] [{$currency->sign}]
                        </div>
                    </div>
                    <div class="fullPrice popupText">
                        <p>[{oxmultilang ident="INSTALLMENT_FULL_PRICE"}]</p>
                        <p>[{$oFullPrice->getPrice()}] [{$currency->sign}]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

[{/if}]
[{$smarty.block.parent}]
