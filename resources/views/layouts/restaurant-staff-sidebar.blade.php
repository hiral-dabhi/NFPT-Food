<div
    class="fixed bottom-0 z-10 h-screen ltr:border-r rtl:border-l vertical-menu rtl:right-0 ltr:left-0 top-[70px] bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700">

    <div data-simplebar class="h-full">
        <!--- Sidemenu -->
        <div class="metismenu pb-10 pt-2.5" id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul id="side-menu">
                <li class="px-5 py-3 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden block"
                    data-key="t-menu">MENU</li>
                @can('dashboard')
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard"> Dashboard</span>
                        </a>
                    </li>
                @endcan
                @if ($getCurrentUserRoleName == 'SubAdmin')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid" class="align-middle" fill="#545a6d33"></i>
                            <span data-key="t-apps"> Site Config</span>
                        </a>
                        <ul>
                            <a href="{{ route('country.index') }}"
                                class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="home" fill="#545a6d33"></i>
                                <span data-key="t-dashboard">Country</span>
                            </a>
                            <a href="{{ route('currency.index') }}"
                                class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="home" fill="#545a6d33"></i>
                                <span data-key="t-dashboard">Currency</span>
                            </a>
                            <li>
                                <a href="{{ route('category.index') }}"
                                    class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    <i data-feather="home" fill="#545a6d33"></i>
                                    <span data-key="t-dashboard">Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('subCategory.index') }}"
                                    class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    <i data-feather="home" fill="#545a6d33"></i>
                                    <span data-key="t-dashboard">Dishes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @can('personal-profile')
                    <li>
                        <a href="{{ route('profile.profile') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard"> Personal Profile</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('menu.index') }}"
                        class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i data-feather="home" fill="#545a6d33"></i>
                        <span data-key="t-dashboard"> Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('restaurantStaff.businessDetail') }}"
                        class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i data-feather="home" fill="#545a6d33"></i>
                        <span data-key="t-dashboard"> Business Setting</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
