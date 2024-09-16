<div class="relative z-50 hidden modal" id="generate_invoice" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            Are you sure to Disable this card series(s)?
                        </h3>
                        <button class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600" type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <form class="generate_invoice space-y-4" action="{{ route('cards.disable', $card->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-12 ">
                                <div class="col-span-12">
                                    <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                        <button type="button" class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50" data-tw-dismiss="modal"><i class="fa fa-times mr-2"></i> No</button>
                                        <button type="submit" class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50" ><i class="fa fa-check mr-2"></i>Yes</button>
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