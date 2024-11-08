<div class="relative z-50 hidden modal" id="paid_model" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div
                class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Paid
                        </h3>
                        <button
                            class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                            type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <form class="space-y-4" id="paid_modal_form"
                            action="{{ route('invoice.generated.paid', $invoice->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-12 ">
                                <div class="col-span-12">
                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-4 lg:col-span-1">
                                            <div class="mt-2">
                                                <label
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Grand
                                                    Total:</label>
                                            </div>
                                        </div>
                                        <div class="col-span-8 lg:col-span-1">
                                            <div class="mt-2">
                                                <label
                                                    class="grand_total_amount block mb-2 font-medium text-gray-700 dark:text-gray-100">{{getCurrency()}}
                                                    {{ $invoice->grand_total ?? '0' }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-4 lg:col-span-1">
                                            <div class="mt-2">
                                                <label
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Paid
                                                    Amount:</label>
                                            </div>
                                        </div>
                                        <div class="col-span-8 lg:col-span-1">
                                            <div class="mt-2">
                                                <label
                                                    class="paid_amount block mb-2 font-medium text-gray-700 dark:text-gray-100">{{getCurrency()}}
                                                    {{ $invoice->paid_amount ?? '0' }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-4 lg:col-span-1">
                                            <div class="mt-2">
                                                <label
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Receivable
                                                    Amount:</label>
                                            </div>
                                        </div>
                                        <div class="col-span-8 lg:col-span-1">
                                            <div class="mt-2">
                                                <label
                                                    class="receivable_amount block mb-2 font-medium text-gray-700 dark:text-gray-100">{{getCurrency()}}
                                                    {{ $invoice->unpaid_amount ?? '0' }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-4 lg:col-span-1">
                                            <div class="mt-2">
                                                <label for="amount"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Amount<span
                                                        class="text-sm text-red-600">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-span-6 lg:col-span-1">
                                            <div class="mt-2">
                                                <input type="number"
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    id="amount" name="amount" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-span-2 lg:col-span-1 flex items-center">
                                            <div class="mt-3">
                                                <label for="rupee"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">{{getCurrency()}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-4 lg:col-span-1">
                                            <div class="mt-2">
                                                <label for="discount"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Discount</label>
                                            </div>
                                        </div>
                                        <div class="col-span-8 lg:col-span-1">
                                            <div class="mt-2">
                                                <input type="checkbox" id="discount" name="discount"
                                                    class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                    value="1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 gap-6 discount-label hidden">
                                        <div class="col-span-4 lg:col-span-1">
                                        </div>
                                        <div class="col-span-8 lg:col-span-1">
                                            <div class="mt-2">
                                                <p class="block mb-2 font-medium text-red-700 dark:text-red-100">
                                                    <b>Remaining Amount will be count as Discount</b></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-4 lg:col-span-1">
                                            <div class="mt-2">
                                                <label for="payment_mode"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Modes<span
                                                        class="text-sm text-red-600">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-span-8 lg:col-span-1">
                                            <div class="mt-2">
                                                <select name="payment_mode" id="payment_mode"
                                                    class="w-full rounded placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60">
                                                    <option value="">Select Payment Mode</option>
                                                    @foreach ($paymentMode as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $key == old('payment_mode', '') ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-12 gap-6">
                                        <div class="col-span-4 lg:col-span-1">
                                            <div class="mt-2">
                                                <label for="comments"
                                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Comments</label>
                                            </div>
                                        </div>
                                        <div class="col-span-8 lg:col-span-1">
                                            <div class="mt-2">
                                                <textarea
                                                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                    id="comments" name="comments" placeholder="Comment..."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 col-span-6 sm:col-span-4 flex items-center justify-center">
                                        <button type="submit"
                                            class="mr-1 font-medium text-white border-transparent btn bg-green-500 w-28 hover:bg-green-700 focus:bg-green-700 focus:ring focus:ring-green-50">Pay</button>
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
