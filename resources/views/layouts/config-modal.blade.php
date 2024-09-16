<div class="relative z-50 hidden modal" id="configModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="absolute inset-0 transition-opacity bg-black bg-opacity-50 modal-overlay">
        </div>
        <div class="p-4 mx-auto animate-translate sm:max-w-xl">
            <div
                class="relative custom-modal text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-zinc-600">
                <div class="bg-white dark:bg-zinc-700">
                    <div class="flex items-center p-4 border-b rounded-t border-gray-50 dark:border-zinc-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 ">
                            <i class="fa fa-cogs"></i> Dashboard Config
                        </h3>
                        <button
                            class="inline-flex items-center px-2 py-1 text-sm text-gray-400 border-transparent rounded-lg btn hover:bg-gray-50/50 hover:text-gray-900 dark:text-gray-100 ltr:ml-auto rtl:mr-auto dark:hover:bg-zinc-600"
                            type="button" data-tw-dismiss="modal">
                            <i class="text-xl text-gray-500 mdi mdi-close dark:text-zinc-100/60"></i>
                        </button>
                    </div>
                    <div class="p-5">
                        <form class="space-y-4 dashboard-config" action="{{ route('update-dashboard-config') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12 mt-4">
                                <div class="col-span-12 xl:col-span-4">
                                    <h5 class="mb-5">Reports</h5>
                                    @foreach ($reports as $k => $v)
                                        <div class="mt-2">
                                            <input type="checkbox" id="{{ $k }}" name="{{ $k }}"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                value="1" {{ in_array($k, $existingData) ? 'checked' : '' }}><label for="{{ $k }}">
                                                {{ $v }}</label>
                                        </div>
                                    @endforeach
                                    {{-- <div class="mt-4">
                                        <span class="text-sm text-red-600">*</span><label for="user_type" class="font-bold">UserTypes (For Reports)</label>
                                        <select name="user_type[]" id="user_type" class="p-5 placeholder-text-sm text-sm rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-text-zinc-100 placeholder-text-gray-800 dark:text-zinc-100 multi-select" multiple="multiple">
                                            <option value="">Select</option>
                                            @foreach (config('enum.user_type') as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>                                        
                                    </div> --}}
                                </div>

                                <div class="col-span-12 xl:col-span-4">
                                    <h5 class="mb-5">Router</h5>
                                    @foreach ($router as $k => $v)
                                        <div class="mt-2">
                                            <input type="checkbox" id="{{ $k }}" name="{{ $k }}"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                value="1" {{ in_array($k, $existingData) ? 'checked' : '' }}><label for="{{ $k }}">
                                                {{ $v }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-span-12 xl:col-span-4">
                                    <h5 class="mb-5">Logs & SysEvent</h5>
                                    @foreach ($logsSysEvent as $k => $v)
                                        <div class="mt-2">
                                            <input type="checkbox" id="{{ $k }}" name="{{ $k }}"
                                                class="align-middle rounded focus:ring-0 focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-400 checked:bg-violet-500 dark:checked:bg-violet-500"
                                                value="1" {{ in_array($k, $existingData) ? 'checked' : '' }}><label for="{{ $k }}">
                                                {{ $v }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="grid grid-cols-12">
                                <div class="col-span-12">
                                    <div
                                        class="flex items-center gap-3 p-5 space-x-2 border-t rounded-b border-gray-50 dark:border-zinc-600">
                                        <button type="submit"
                                            class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Update</button>
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
