<div class="grid grid-cols-1 pb-0">
    <div class="md:flex items-center justify-between px-[2px]">
        <div class="flex items-center">
            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                @if(isset($icon))
                    <i class="{{ $icon }}"></i>
                @endif
                {{ $attributes['title'] }}
            </h4>
            @can($attributes['permission'])
                @if(isset($attributes['route']))
                    <div class="card-body p-0 ml-4">
                        <a href="{{ route($attributes['route']) }}"
                            class="text-white border-transparent btn bg-violet-500 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50 md">+</a>
                    </div>
                @endif
            @endcan
        </div>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                        {{ $attributes['pagetitle'] }}
                    </a>
                </li>
                <li>
                    <div class="flex items-center rtl:mr-2">
                       <i class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                        <a href="#" class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">{{ $attributes['title'] }}</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>