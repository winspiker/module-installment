[{$smarty.block.parent}]

<tr>
    <td class="edittext">
        [{oxmultilang ident="ARTICLE_MAIN_INSTALLMENT"}] ([{$oActCur->sign}]/[{oxmultilang ident="ARTICLE_MAIN_INSTALLMENT_MONTHS"}])
    </td>
    <td class="edittext" nowrap>
        <input type="text" class="editinput" size="8" maxlength="[{$edit->oxarticles__oxfirstpayment->fldmax_length}]" name="editval[oxarticles__oxfirstpayment]" value="[{$edit->oxarticles__oxfirstpayment->value}]" [{$readonly}]>[{$oActCur->sign}]

        <input type="text" class="editinput" size="8" maxlength="[{$edit->oxarticles__oxmonths->fldmax_length}]" name="editval[oxarticles__oxpaymentmonths]" value="[{$edit->oxarticles__oxpaymentmonths->value}]" [{$readonly}]>[{oxmultilang ident="ARTICLE_MAIN_INSTALLMENT_MONTHS"}]
        [{oxinputhelp ident="HELP_ARTICLE_MAIN_INSTALLMENT"}]
    </td>
</tr>
