<div class="relative z-50 hidden modal" id="viewModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-hidden">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
        <div class="p-4 mx-auto animate-translate sm:max-w-lg">
            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="px-4 py-4 border-b modal-header border-gray-50 dark:text-gray-100 dark:border-zinc-600">
                        <div class="flex items-center">
                            <h5></h5>
                            <button class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600" type="button" data-tw-dismiss="modal">
                                <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal">
                        <div class="px-5 py-3 border-b modal-body border-gray-50 dark:border-zinc-600">
                            <h3 class="text-gray-700 dark:text-gray-100">Alert View</h3>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="#" class="system-alerts-view-form" enctype="multipart/form-data">
                                @csrf
                                <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="subject" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Subject</label>
                                            <input type="text" name="subject" id="subject" placeholder="Enter Subject" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="qwqw" disabled>

                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="type" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Type</label>
                                            <input type="text" name="type" id="type" placeholder="Enter Type" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="wd" disabled>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="priority" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Priority</label>
                                            <input type="text" name="priority" id="priority" placeholder="Enter priority" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="wd" disabled>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="datetime" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">DateTime</label>
                                            <input type="text" name="datetime" id="datetime" placeholder="Enter datetime" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" value="wd" disabled>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="message" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Message</label>
                                            <textarea type="text" name="message" id="message" placeholder="Enter datetime" class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100" disabled>sdsd</textarea>
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
</div>