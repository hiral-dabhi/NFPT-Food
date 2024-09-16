<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        .s1 {
            color: #AA3939;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10pt;
        }

        h1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 20pt;
        }

        .s2 {
            color: #AA3939;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9pt;
        }

        .s3 {
            color: #313131;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9pt;
        }

        h2 {
            color: #313131;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10pt;
        }

        p {
            color: #636363;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
            margin: 0pt;
        }

        .a {
            color: #636363;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s5 {
            color: #313131;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8pt;
        }

        .s6 {
            color: #787878;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7pt;
        }

        h4 {
            color: #505050;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8pt;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }
    </style>
</head>

<body>
    <p>
        <span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"><img style="margin: 20px 0px 0px 20px;" width="200" src="{{ $logoUrl }}"
                            alt="NFPT communication Pvt. Ltd." /></td>
                    <td align="right">
                        @if ($invoice->status == 0)
                            <h1
                                style="margin: 20px 0px 0px 282px; text-indent: 0pt;line-height: 22pt;text-align: left;">
                                PROFORMA INVOICE</h1>
                        @else
                            <h1
                                style="margin: 20px 0px 0px 384px; text-indent: 0pt;line-height: 22pt;text-align: left;">
                                TAX INVOICE</h1>
                        @endif
                        <div style="margin: 10px 0px 0px 285px;">
                            <p class="s2" style="margin: 5px 0px 0px 50px; text-indent: 0pt;text-align: left;">NO:
                                <span class="s3"
                                    style="margin: 5px 0px 0px 92px;">{{ $invoice->invoice_number ?? '' }}</span>
                            </p>
                            <p class="s2" style="margin: 5px 0px 0px 50px; text-indent: 0pt;text-align: left;">
                                GENERATED: <span class="s3"
                                    style="margin: 5px 0px 0px 34px;">{{ $invoice->status == 0 ? date('d-M-Y H:i') : ($invoice->generated_at ? date('d-M-Y H:i', strtotime($invoice->generated_at)) : '') }}</span>
                            </p>
                            <p class="s2" style="margin: 5px 0px 0px 50px; text-indent: 0pt;text-align: left;">
                                PRINTED: <span class="s3"
                                    style="margin: 5px 0px 0px 56px;">{{ date('d-M-Y H:i') }}</span></p>
                            <p class="s2" style="margin: 5px 0px 0px 50px; text-indent: 0pt;text-align: left;">
                                DUE DATE: <span class="s3"
                                    style="margin: 5px 0px 0px 47px;">{{ date('d-M-Y H:i') }}</span></p>
                        </div>
                    </td>
                </tr>
            </table>
        </span>
    </p>
    <p>
        <span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p class="s1" style="margin: 50px 0px 0px 25px;">BILLING FROM</p>
                    </td>
                    <td>
                        <p class="s1" style="margin: 50px 0px 0px 25px;">BILLING TO</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr class="s1" width="360px" style="margin: 5px 0px 0px 20px;" />
                    </td>
                    <td>
                        <hr class="s1" width="370px" style="margin: 5px 0px 0px 20px;" />
                    </td>
                </tr>
            </table>
        </span>
    </p>

    <p>
        <span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <h2 style="margin: 20px 0px 0px 25px; width:356px;">{{ $companyDetails['company_name'] ?? '' }}
                        </h2>
                    </td>
                    <td>
                        <h2 style="margin: 20px 0px 0px 30px; width:356px;">{{ $invoice->userData->name ?? '' }}</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin: 10px 0px 0px 25px; width:356px;">{{ $companyDetails['address'] ?? '' }}</p>
                        <p style="margin: 0px 0px 0px 25px; width:356px;">{{ $companyDetails['city'] ?? '' }}</p>
                        <p style="margin: 0px 0px 0px 25px; width:356px;">Contact No.: +91
                            {{ $companyDetails['contact'] ?? '' }}</p>
                        <p style="margin: 0px 0px 0px 25px; width:356px;">Mail: {{ $companyDetails['email'] ?? '' }}
                        </p>
                        <p style="margin: 0px 0px 0px 25px; width:356px;">GST No.: N/A</p>
                    </td>
                    <td>
                        <p style="margin: 10px 0px 0px 30px; width:356px;">{{ $invoice->userData->address ?? '' }},
                        </p>
                        <p style="margin: 0px 0px 0px 30px; width:356px;"> {{ $invoice->userData->city ?? '' }}</p>
                        <p style="margin: 0px 0px 0px 30px; width:356px;">
                            {{ ($invoice->userDetail->state ?? '') . '-' . $invoice->userDetail->zip_code }}.
                        </p>
                        <p style="margin: 0px 0px 0px 30px; width:356px;">Contact No.: +91
                            {{ $invoice->userDetail->mobile_no ?? 'N/A' }}</p>
                        <p style="margin: 0px 0px 0px 30px; width:356px;">Mail:
                            {{ $invoice->userData->email ?? '---' }}</p>
                        <p style="margin: 0px 0px 0px 30px; width:356px;">GST No.:
                            {{ $invoice->userDetail->gst_no ?? 'N/A' }}</p>
                    </td>
                </tr>
            </table>
        </span>
    </p>

    <p>
        <span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <h2 width="390px" style="margin: 50px 0px 0px 25px;">PLAN</h2>
                    </td>
                    <td>
                        <h2 width="100px" style="margin: 50px 0px 0px 25px; text-align: center;">QTY</h2>
                    </td>
                    <td>
                        <h2 width="100px" style="margin: 50px 0px 0px 25px; text-align: center;">RATE</h2>
                    </td>
                    <td>
                        <h2 width="155px" style="margin: 50px 0px 0px 25px; text-align: center;">AMOUNT</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr class="s1" width="390px" style="margin: 5px 0px 0px 20px;" />
                    </td>
                    <td>
                        <hr class="s1" width="100px" style="margin: 5px 0px 0px 0px;" />
                    </td>
                    <td>
                        <hr class="s1" width="100px" style="margin: 5px 0px 0px 0px;" />
                    </td>
                    <td>
                        <hr class="s1" width="155px" style="margin: 5px 0px 0px 0px;" />
                    </td>
                </tr>
            </table>
        </span>
    </p>

    <p>
        <span>
            <table>
                <tr style="height:63pt">
                    <td>
                        <p class="s5" style="margin: 10px 0px 10px 25px; width:390px;">
                            {{ $invoice->serviceData->service_name ?? '' }}</p>
                        <p class="s6" style="margin: 0px 0px 0px 25px; width:390px;">Expiration:
                            {{ $invoice->expiration_limit ?? '' }}</p>
                        <p class="s6" style="margin: 0px 0px 0px 25px; width:390px;">DATA:
                            {{ $invoice->total_data_limit ?? '' }}</p>
                        <p class="s6" style="margin: 0px 0px 0px 25px; width:390px;">OnlineTime:
                            {{ $invoice->daily_uptime_limit ?? '' }}</p>
                        <p class="s6" style="margin: 0px 0px 0px 25px; width:390px;">Expiry Date:
                            {{ $invoice->userDetail->expiration_date ?? '' }}</p>
                    </td>
                    <td>
                        <p class="s5"
                            style="margin: 35px 0px 10px 25px; width:70px; text-align: center; vertical-align: middle;">
                            {{ $invoice->quantity ?? '0' }}</p>
                    </td>
                    <td>
                        <p class="s5"
                            style="margin: 35px 0px 10px 25px; width:75px; text-align: center; vertical-align: middle;">
                            INR {{ $invoice->manual_unit_price ?? ($invoice->unit_price ?? '0') }}
                        </p>
                    </td>
                    <td>
                        <p class="s5"
                            style="margin: 35px 0px 10px 45px; width:75px; text-align: center; vertical-align: middle;">
                            INR
                            {{ $invoice->sub_total ?? '0' }}</p>
                    </td>
                </tr>
            </table>
        </span>
    </p>

    <p>
        <span>
            <table>
                <tr style="height:63pt">
                    @if ($invoice->status == 0 || $invoice->status == 1)
                        <td>
                            <p class="s5" style="margin: 10px 0px 10px 540px; width:75px; text-align: center;">Sub
                                Total</p>
                            <p class="s5" style="margin: 10px 0px 10px 540px; width:75px; text-align: center;">
                                CGST {{ $invoice->cgst_percentage ?? '0' }} %</p>
                            <p class="s5" style="margin: 10px 0px 10px 540px; width:75px; text-align: center;">
                                GGST {{ $invoice->ggst_percentage ?? '0' }} %</p>
                            @if ($invoice->is_manual === 1)
                                @if ($invoice->discount_percentage > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 540px; width:75px; text-align: center;">
                                        Discount {{ $invoice->discount_percentage ?? '0' }} %
                                    </p>
                                @endif

                                @if ($invoice->other_charges > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 540px; width:75px; text-align: center;">
                                        Other Charges
                                    </p>
                                @endif
                            @endif
                            <p class="s5"
                                style="margin: 10px 0px 10px 540px; padding:10px 10px 10px 0px; width:75px; background-color:#AA3939; color:#FFFFFF; text-align: center;">
                                Grand Total</p>
                        </td>
                        <td>
                            <p class="s5" style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">INR
                                {{ $invoice->sub_total ?? '0' }}</p>
                            <p class="s5" style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">INR
                                {{ $invoice->cgst ?? '0' }}</p>
                            <p class="s5" style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">INR
                                {{ $invoice->ggst ?? '0' }}</p>
                            @if ($invoice->is_manual === 1)
                                @if ($invoice->discount_percentage > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">
                                        INR {{ $invoice->discount ?? '0' }}
                                    </p>
                                @endif

                                @if ($invoice->other_charges > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">
                                        INR {{ $invoice->other_charges ?? '0' }}
                                    </p>
                                @endif
                            @endif
                            <p class="s5"
                                style="margin: 10px 0px 10px 35px; padding:10px 10px 10px 0px; width:75px; background-color:#AA3939; color:#FFFFFF; text-align: center;">
                                INR {{ $invoice->grand_total ?? '0' }}</p>
                        </td>
                    @elseif($invoice->status == 2)
                        <td>
                            <img style="margin: 10px 0px 10px 35px;" width="75" height="75"
                                src="{{ $paidUrl }}" alt="Paid Image" />
                        </td>
                        <td>
                            <p class="s5" style="margin: 10px 0px 10px 428px; width:75px; text-align: center;">Sub
                                Total</p>
                            <p class="s5" style="margin: 10px 0px 10px 428px; width:75px; text-align: center;">
                                CGST {{ $invoice->cgst_percentage ?? '0' }} %</p>
                            <p class="s5" style="margin: 10px 0px 10px 428px; width:75px; text-align: center;">
                                GGST {{ $invoice->ggst_percentage ?? '0' }} %</p>
                            @if ($invoice->is_manual === 1)
                                @if ($invoice->discount_percentage > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 428px; width:75px; text-align: center;">
                                        Discount {{ $invoice->discount_percentage ?? '0' }} %
                                    </p>
                                @elseif ($invoice->other_charges > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 428px; width:75px; text-align: center;">
                                        Other Charges
                                    </p>
                                @endif
                            @endif
                            <p class="s5"
                                style="margin: 10px 0px 10px 428px; padding:10px 10px 10px 0px; width:75px; background-color:#AA3939; color:#FFFFFF; text-align: center;">
                                Grand Total</p>
                        </td>
                        <td>
                            <p class="s5" style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">INR
                                {{ $invoice->sub_total ?? '0' }}</p>
                            <p class="s5" style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">INR
                                {{ $invoice->cgst ?? '0' }}</p>
                            <p class="s5" style="margin: 10px 0px 10px 35px; width:75px; text-align: center;">INR
                                {{ $invoice->ggst ?? '0' }}</p>
                            @if ($invoice->is_manual === 1)
                                @if ($invoice->discount_percentage > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 428px; width:75px; text-align: center;">
                                        Discount {{ $invoice->discount ?? '0' }} %
                                    </p>
                                @elseif ($invoice->other_charges > 0)
                                    <p class="s5"
                                        style="margin: 10px 0px 10px 428px; width:75px; text-align: center;">
                                        INR {{ $invoice->other_charges ?? '0' }}
                                    </p>
                                @endif
                            @endif
                            <p class="s5"
                                style="margin: 10px 0px 10px 35px; padding:10px 10px 10px 0px; width:75px; background-color:#AA3939; color:#FFFFFF; text-align: center;">
                                INR {{ $invoice->grand_total ?? '0' }}</p>
                        </td>
                    @endif
                </tr>
            </table>
        </span>
    </p>

    @if ($invoice->status == 1 || $invoice->status == 2)
        <p>
            <span>
                <table>
                    <tr>
                        <td>
                            <p style="margin: 10px 0px 10px 550px; width: 250px;">For
                                {{ $companyDetails['company_name'] ?? '' }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin: 50px 0px 10px 550px; width: 250px;">Authorized Signatory</p>
                        </td>
                    </tr>
                </table>
            </span>
        </p>
    @endif


    <p>
        <span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        @if ($invoice->status == 0)
                            <h2 style="margin: 20px 0px 0px 25px; width:500px;">IMPORTANT NOTICE</h2>
                        @elseif($invoice->status == 1 || $invoice->status == 2)
                            <h2 style="margin: 20px 0px 0px 25px; width:500px;"></h2>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr class="s1" width="750px" style="margin: 5px 0px 0px 20px;" />
                    </td>
                </tr>
                <tr>
                    <td>
                        @if ($invoice->status == 0)
                            <h4 style="margin: 20px 0px 0px 25px; width:500px;">This is a computer generated estimate,
                                thus no signature is required.</h4>
                        @elseif($invoice->status == 1 || $invoice->status == 2)
                            <h4 style="margin: 20px 0px 0px 25px; width:500px;">This is a computer generated invoice,
                                subject to {{ $companyDetails['company_name'] ?? '' }}</h4>
                            <h4 class="s5"
                                style="margin: 10px 0px 0px 25px; padding:5px 5px 5px 5px; width:75px; background-color:#AA3939; color:#FFFFFF; text-align: center;">
                                DUPLICATE</h4>
                        @endif
                    </td>
                </tr>
            </table>
        </span>
    </p>

</body>

</html>
