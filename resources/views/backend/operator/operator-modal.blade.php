<div class="relative z-50 hidden modal" id="add_deposit" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div
                class="relative custom-modal text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            <i class="align-middle  bx bx-plus-medical text-15 ltr:mr-2 rtl:ml-2"></i>Add Deposite
                        </h3>
                        <button
                            class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                            type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <form class="space-y-4 add-deposit" action="{{ route('user.deposit.add', $user->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-12 ">
                                <div class="col-span-12">
                                    <div>
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">UserName:
                                            <span class="font-bold">{{ $user->username }}</span></label>
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
                                    <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                        <button type="submit"
                                            class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                        <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                            href="{{ route('operator.edit', $user->id) }}">
                                            Back
                                        </a>
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
