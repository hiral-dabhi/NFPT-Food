<!-- Footer Start -->
<footer
    class="fixed main-content bottom-0 left-0 right-0 px-5 py-5 bg-white border-t footer border-gray-50 dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-200">
    <div class="grid grid-cols-2 text-gray-500 dark:text-zinc-100">
        <div class="grow">
            &copy;
            {{ date('Y') . ' ' . env('APP_NAME', 'NFPT') }}
        </div>
        <div class="hidden md:inline-block text-end">Design & Develop by <a href=""
                class="underline text-violet-500">{{ env('APP_NAME', 'NFPT') }}</a></div>

    </div>
</footer>
<!-- end Footer -->