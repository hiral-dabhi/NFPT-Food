<div class="relative z-50 hidden modal" id="add_credit" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div
                class="relative custom-modal text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            Add Credit
                        </h3>
                        <button
                            class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                            type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <form class="add-credit" action="{{ route('user.credit.add', $user->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-12 ">
                                <div class="col-span-12">
                                    <div class="mb-4 flex flex-row items-center">
                                        <label for="username"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right mr-2">UserName:
                                        </label>
                                        <span>{{ $user->username }}</span>
                                    </div>
                                    <div class="mb-4 flex flex-row items-center">
                                        <label for="service"
                                            class="block  text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right mr-2">Service:
                                        </label>
                                        <span>{{ $user->userDetail->serviceDetail->s_name ?? '' }}</span>
                                    </div>
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-500" aria-label="table">
                                            <tbody>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Rate (Down / up)
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ !empty($user->userDetail->serviceDetail->s_uprate) ? $user->userDetail->serviceDetail->s_uprate . ' kbps /' : '' }}
                                                        {{ !empty($user->userDetail->serviceDetail->s_downrate) ? $user->userDetail->serviceDetail->s_downrate . ' kbps' : '' }}
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Total Data Limit Per Unit
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $user->userDetail->serviceDetail->s_totallimit ?? '' }}
                                                        {{ isset($user->userDetail->serviceDetail) ? getMiscTitle($user->userDetail->serviceDetail->dataunit) ?? '' : '' }}

                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Expiration Data Limit Per Unit
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $user->userDetail->serviceDetail->s_datelimit ?? '' }}
                                                        {{ isset($user->userDetail->serviceDetail) ? getMiscTitle($user->userDetail->serviceDetail->exprunit) ?? '' : '' }}
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Uptime Data Limit Per Unit
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $user->userDetail->serviceDetail->s_onlinelimit ?? '' }}
                                                        {{ isset($user->userDetail->serviceDetail) ? getMiscTitle($user->userDetail->serviceDetail->uptimeunit) ?? '' : '' }}

                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Daily Uptime Per Unit
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        @if (!empty($user->userDetail->serviceDetail))
                                                            {{ $user->userDetail->serviceDetail->s_dailyonline ?? 'Unlimited' }}
                                                            {{ isset($user->userDetail->serviceDetail) ? getMiscTitle($user->userDetail->serviceDetail->dailyonlineunit) ?? '' : '' }}
                                                        @endif
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Daily Data Per Unit
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        @if (!empty($user->userDetail->serviceDetail))
                                                            {{ $user->userDetail->serviceDetail->s_dailyquota ?? 'Unlimited' }}
                                                            {{ isset($user->userDetail->serviceDetail) ? getMiscTitle($user->userDetail->serviceDetail->dailyquotaunit) ?? '' : '' }}
                                                        @endif
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Inclusive All Tax
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        @if (!empty($user->userDetail->serviceDetail))
                                                            Yes
                                                        @endif
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Price Per Unit (With All Taxes)
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {!! !empty($user->userDetail->serviceDetail->s_price) ? '<i class="bx bx-rupee"></i>' . $user->userDetail->serviceDetail->s_price : '' !!}
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        <label for="manual_unit_price"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Manual
                                            Unit Price</label>
                                        <input type="number" name="manual_unit_price" id="manual_unit_price"
                                            class="border border-gray-100 placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 disabled"
                                            disabled value="0" min="0">
                                        <input type="checkbox"
                                            class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 ckb-manual_unit_enable"
                                            name="manual_unit_enable"
                                            {{ old('manual_unit_price', $user->userDetail->manual_unit_enable) === '0' ? 'checked' : '' }}
                                            value="0">
                                        <div class="manual_unit_price_error"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="quantity"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Quantity</label>
                                        <input type="number" name="quantity" id="quantity"
                                            class="border border-gray-100 placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="0" min="0">
                                        <div class="quantity_error"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="sub_total"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Sub
                                            Total</label>
                                        <input type="number" name="sub_total" id="sub_total"
                                            class="disabled border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            readonly value="0" min="0">
                                        <i class="bx bx-rupee"></i>
                                        <div class="sub_total_error"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="grand_total"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Grand
                                            Total</label>
                                        <input type="number" name="grand_total" id="grand_total"
                                            class="disabled border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            readonly value="0" min="0">
                                        <i class="bx bx-rupee"></i>
                                        <div class="grand_total_error"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="client_tax_no"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Tax
                                            No.</label>
                                        <input type="text" name="client_tax_no" id="client_tax_no" placeholder="Client Tax No."
                                            class="border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">
                                        <div class="client_tax_no_error"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="comment"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Comment</label>
                                        <textarea type="text" name="comment" id="comment" placeholder="Comment"
                                            class="border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"></textarea>
                                        <div class="comment_error"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="is_paid"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Payment
                                            Status<span class="text-sm text-red-600">*</span></label>
                                        <div class="mt-1 flex items-center">
                                            <div class="flex items-center" style="margin-right: 10px">
                                                <input type="radio" id="is_paid1" name="is_paid" value="0"
                                                    {{ old('is_paid') == '0' ? 'checked' : '' }} checked
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="is_paid1"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Pending</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="radio" id="is_paid2" name="is_paid" value="1"
                                                    {{ old('is_paid') == '1' ? 'checked' : '' }}
                                                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <label for="is_paid2"
                                                    class="ml-2 block text-sm leading-5 text-gray-700">Paid</label>
                                            </div>
                                        </div>
                                        @error('is_paid')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4 payment_mode hidden">
                                        <label for="payment_mode"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Payment
                                            Type<span class="text-sm text-red-600">*</span></label>
                                        <select name="payment_mode" id="payment_mode"
                                            class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">
                                            <option value="">Select Payment Mode</option>
                                            @foreach ($paymentMode as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == old('payment_mode', '') ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_mode')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Additional
                                            Data</label>
                                    </div>
                                    <div class="ml-5 mb-5 flex">
                                        <div class="mr-2 mt-2">
                                            <label for="expiration_val"
                                                class="text-sm font-medium text-gray-700">Expiration:</label>
                                        </div>
                                        <div class="mr-2">
                                            <input type="number" id="expiration_val" name="expiration_val"
                                                value="{{ old('expiration_val', 0) }}"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 data-limiter-enable">
                                        </div>
                                        <div class="mr-2 mt-2">Day(s)</div>
                                    </div>
                                    <div class="ml-5 mb-5 flex">
                                        <div class="mr-2 mt-2">
                                            <label for="uptime_val"
                                                class="text-sm font-medium text-gray-700">Uptime:</label>
                                        </div>
                                        <div class="mr-2">
                                            <input type="number" id="uptime_val" name="uptime_val"
                                                value="{{ old('uptime_val', 0) }}"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 data-limiter-enable">
                                        </div>
                                        <div class="mr-2 mt-2">Hour(s)</div>
                                    </div>
                                    <div class="ml-5 mb-5 flex">
                                        <div class="mr-2 mt-2">
                                            <label for="data_val"
                                                class="text-sm font-medium text-gray-700">Data:</label>
                                        </div>
                                        <div class="mr-2">
                                            <input type="number" id="data_val" name="data_val"
                                                value="{{ old('data_val', 0) }}"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100 data-limiter-enable">
                                        </div>
                                        <div class="mr-2 mt-2">MB</div>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 p-5 space-x-2 border-t rounded-b border-gray-50 dark:border-zinc-600">
                                        @if ($user->userDetail->serviceDetail)
                                            <button type="{{ count($checkDeposite) < 1 ? 'button' : 'submit' }}"
                                                class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50 {{ count($checkDeposite) < 1 ? 'disabled' : '' }}">Submit</button>
                                        @else
                                            <button type="button"
                                                class="mr-1 font-medium text-white border-transparent btn bg-violet-200 w-28 hover:bg-violet-100 focus:bg-violet-100 focus:ring focus:ring-violet-50">Submit</button>
                                        @endif
                                        <button type="button"
                                            class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                            data-tw-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative z-50 hidden modal" id="add_deposit" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div
                class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            Add Deposit
                        </h3>
                        <button
                            class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                            type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <form class="add-deposit" id="add_deposit"
                            action="{{ route('user.deposit.add', $user->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-12 ">
                                <div class="col-span-12">
                                    <div class="mb-4 flex flex-row items-center">
                                        <label for="username"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right mr-2">UserName:
                                        </label>
                                        <span>{{ $user->username }}</span>
                                    </div>
                                    <div class="mt-4">
                                        <label for="amount"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Amount</label>
                                        <input type="number" name="amount" id="amount"
                                            class="border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="0" min="0">
                                        <i class="bx bx-rupee"></i>
                                    </div>
                                    <div class="mt-4">
                                        <label for="comment"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Comment</label>
                                        <textarea type="text" name="comment" id="comment" placeholder="Comment Here..."
                                            class="border border-gray-100 w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"></textarea>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 p-5 space-x-2 border-t rounded-b border-gray-50 dark:border-zinc-600">
                                        <button type="submit"
                                            class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                        <button type="button"
                                            class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                            data-tw-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="relative z-50 hidden modal" id="override_bandwidth" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div
                class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            Override Bandwidth
                        </h3>
                        <button
                            class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                            type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-6 space-y-6 ltr:text-left rtl:text-right">
                        <form action="{{ route('user.bandwidth.save', $user->id) }}" method="POST"
                            class="form-override-bandwidth">
                            @csrf
                            <div class="mb-4">
                                <label for="down_rate"
                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">DataRate (kbps)
                                    (DL / UL)<span class="text-sm text-red-600">*</span></label>
                                <input type="number" class="p-2 border border-gray-300 rounded-md" id="down_rate"
                                    name="down_rate" value="{{ $user->overRideBandwidth->down_rate ?? 0 }}">
                                @error('down_rate')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <span>/</span>
                                <input type="number" class="p-2 border border-gray-300 rounded-md" id="up_rate"
                                    name="up_rate" value="{{ $user->overRideBandwidth->up_rate ?? 0 }}">
                                @error('up_rate')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                    for="formrow-customCheck">Enable Burst Mode</label>
                                <input type="checkbox"
                                    class="ckb-burst-enable align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 "
                                    name="is_enable_burst_mode" value="0"
                                    {{ isset($user->overRideBandwidth->is_enable_burst_mode) && $user->overRideBandwidth->is_enable_burst_mode == '1' ? 'checked' : '' }}>
                            </div>
                            <div
                                class="burst-fields-div {{ isset($user->overRideBandwidth->is_enable_burst_mode) && $user->overRideBandwidth->is_enable_burst_mode == '1' ? '' : 'hidden' }}">
                                <div class="mb-4">
                                    <label for="burst_limit"
                                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Burst
                                        Limit
                                        (kbps)(DL / UL)</label>
                                    <input type="number" class="p-2 border border-gray-300 rounded-md"
                                        id="burst_limit" name="burst_limit"
                                        value="{{ $user->overRideBandwidth->burst_limit ?? 0 }}">
                                    @error('burst_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span>/</span>
                                    <input type="number" class="p-2 border border-gray-300 rounded-md"
                                        id="from_burst_limit" name="from_burst_limit"
                                        value="{{ $user->overRideBandwidth->from_burst_limit ?? 0 }}">
                                    @error('from_burst_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="threshold_limit"
                                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Threshold
                                        Limit
                                        (kbps)</label>
                                    <input type="number" class="p-2 border border-gray-300 rounded-md"
                                        id="threshold_limit" name="threshold_limit"
                                        value="{{ $user->overRideBandwidth->threshold_limit ?? 0 }}">
                                    @error('threshold_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span>/</span>
                                    <input type="number" class="p-2 border border-gray-300 rounded-md"
                                        id="from_threshold_limit" name="from_threshold_limit"
                                        value="{{ $user->overRideBandwidth->from_threshold_limit ?? 0 }}">
                                    @error('from_threshold_limit')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="burst_time"
                                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Burst
                                        Time
                                        (Seconds)(DL / UL)</label>
                                    <input type="number" class="p-2 border border-gray-300 rounded-md"
                                        id="burst_time" name="burst_time"
                                        value="{{ $user->overRideBandwidth->burst_time ?? 0 }}">
                                    @error('burst_time')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <span>/</span>
                                    <input type="number" class="p-2 border border-gray-300 rounded-md"
                                        id="from_burst_time" name="from_burst_time"
                                        value="{{ $user->overRideBandwidth->from_burst_time ?? 0 }}">
                                    @error('from_burst_time')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="priority"
                                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Priority</label>
                                    <input type="number" class="p-2 border border-gray-300 rounded-md"
                                        id="priority" name="priority"
                                        value="{{ $user->overRideBandwidth->priority ?? 0 }}">
                                    @error('priority')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="flex items-center gap-3 p-5 space-x-2 border-t rounded-b border-gray-50 dark:border-zinc-600">
                                <button type="submit"
                                    class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                <button type="button"
                                    class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                    data-tw-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative z-50 hidden modal" id="add_schedule" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div
                class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            Schedule Recharge
                        </h3>
                        <button
                            class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                            type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <form class="add-schedule" id="add_schedule"
                            action="{{ route('user.schedule.add', $user->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-12 ">
                                <div class="col-span-12">
                                    <div class="mb-4 flex flex-row items-center">
                                        <label for="username"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right mr-2">UserName:
                                        </label>
                                        <span>{{ $user->username }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <label for="service_id"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Service /
                                            Plan<span class="text-sm text-red-600">*</span></label>
                                        <select name="service_id" id="service_id"
                                            class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="{{ old('service_id') }}">
                                            <option value="">Select Service</option>
                                            @foreach ($services as $key => $value)
                                                <option value="{{ $key }}">
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="schedule_date"
                                            class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Schedule On
                                            Date<span class="text-sm text-red-600">*</span></label>
                                        <input type="date" name="schedule_date" id="schedule_date"
                                            placeholder="Select expiry date"
                                            class="w-full border-gray-100 rounded placeholder:text-13 text-13 py-1.5 focus:border focus:ring focus:ring-violet-500/20 focus:border-violet-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"
                                            type="datetime-local" value="{{ old('schedule_date') }}">
                                        @error('schedule_date')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <label for="comment"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Comment</label>
                                        <textarea type="text" name="comment" id="comment" placeholder="Comment Here..."
                                            class="border border-gray-100 w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"></textarea>
                                    </div>

                                    <div class="mt-4">
                                        <label for="discount"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Discount</label>
                                        <input type="number" name="discount" id="discount"
                                            class="border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                            value="0" min="0">
                                        <i class="mdi mdi-percent"></i>
                                    </div>
                                    <div class="mt-4">
                                        <label for="other_charges"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">Other
                                            Charges</label>
                                        <input type="number" name="other_charges" id="other_charges"
                                            class="border border-gray-100  placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20   dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                            value="0" min="0">
                                        <i class="bx bx-rupee"></i>
                                    </div>
                                    <div class="mb-4">
                                        <label class="font-medium text-gray-700 ltr:mr-2 rtl:ml-2 dark:text-zinc-100"
                                            for="formrow-customCheck">Paid</label>
                                        <input type="checkbox"
                                            class="ckb-burst-enable align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500 "
                                            name="is_paid" value="1"
                                            {{ old('is_paid') == '1' ? 'checked' : '' }}>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 p-5 space-x-2 border-t rounded-b border-gray-50 dark:border-zinc-600">
                                        <button type="submit"
                                            class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                        <button type="button"
                                            class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                            data-tw-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
