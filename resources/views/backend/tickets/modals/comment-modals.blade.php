

<div class="relative z-50 hidden modal" id="comment-modal" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-hidden">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50"></div>
        <div class="p-4 mx-auto animate-translate sm:max-w-lg">
            <div
                class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div
                        class="px-4 py-4 border-b modal-header border-gray-50 dark:text-gray-100 dark:border-zinc-600">
                        <div class="flex items-center">
                            <h5></h5>
                            <button
                                class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                                type="button" data-tw-dismiss="modal">
                                <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal">
                        <div class="px-5 py-3 border-b modal-body border-gray-50 dark:border-zinc-600">
                            <h3 class="text-gray-700 dark:text-gray-100">Add Comment</h3>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('tickets.list.comment', $ticket) }}" class="ticket-comment-create-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="bg-white sm:p-6 shadow sm:rounded-md">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="comment"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100"><span
                                                    class="text-sm text-red-600">*</span>Comment</label>
                                            <textarea type="text" name="comment" id="comment" placeholder="Comment"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('comment') }}</textarea>
                                            @error('comment')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="file_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Upload</label>
                                            <input type="file" name="file_name[]" id="file_name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('file_name') }}" multiple>
                                            @error('file_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4 flex items-center justify-center">
                                            <button type="submit"
                                                class="text-white btn bg-violet-500 border-violet-500 hover:bg-violet-600 focus:ring ring-violet-50focus:bg-violet-600"><i
                                                    class="fa fa-comment"></i> Add Comment</button>
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