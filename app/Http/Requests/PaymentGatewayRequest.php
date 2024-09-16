<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentGatewayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $requestData = $this->request->all();
        $paymentGatewayType = $requestData['payment_gateway_type'];
        $rules = [];
        $rules = [
            'payment_gateway_type' => 'required',
            'status' => 'required',
        ];
        if ($paymentGatewayType === 'payumoney') {
            $rules = [
                'base_url_payuMoney' => 'required',
                'merchant_key_payumoney' => 'required',
                'salt_payumoney' => 'required',
                'service_provider_payuMoney' => 'required',
            ];
        } elseif ($paymentGatewayType === 'ccavenue') {
            $rules = [
                'base_url_ccavenue' => 'required',
                'merchant_id_ccavenue' => 'required',
                'working_key_ccavenue' => 'required',
                'access_code_ccavenue' => 'required',
                'ccavenue_currency' => 'required',
            ];
        } elseif ($paymentGatewayType === 'paytm') {
            $rules = [
                'base_url_paytm' => 'required',
                'status_url_paytm' => 'required',
                'merchant_id_paytm' => 'required',
                'merchant_key_paytm' => 'required',
                'merchant_web_paytm' => 'required',
                'industry_paytm' => 'required',
            ];
        } elseif ($paymentGatewayType === 'instamojo') {
            $rules = [
                'base_url_instamojo' => 'required',
                'api_key_instamojo' => 'required',
                'auth_token_instamojo' => 'required',
                'salt_instamojo' => 'required',
            ];
        } elseif ($paymentGatewayType === 'razorpay') {
            $rules = [
                'key_id_razorpay' => 'required',
                'key_secret_razorpay' => 'required',
                'razorpay_currency' => 'required',
            ];
        }

        return $rules;
    }
}
