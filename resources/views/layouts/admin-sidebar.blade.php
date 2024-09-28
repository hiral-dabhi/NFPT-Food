<div
    class="fixed bottom-0 z-10 h-screen ltr:border-r rtl:border-l vertical-menu rtl:right-0 ltr:left-0 top-[70px] bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700">

    <div data-simplebar class="h-full">
        <!--- Sidemenu -->
        <div class="metismenu pb-10 pt-2.5" id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul id="side-menu">
                @can('dashboard')
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard"> Dashboard</span>
                        </a>
                    </li>
                @endcan
                @if ($getCurrentUserRoleName == 'SuperAdmin')
                    <li>
                        <a href="{{ route('subAdmin.index') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard">Sub Admin</span>
                        </a>
                    </li>
                @endif
                @can('restaurant')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid" class="align-middle" fill="#545a6d33"></i>
                            <span data-key="t-apps"> Business</span>
                        </a>
                        <ul>
                            @can('restaurant-owner')
                                <li>
                                    <a href="{{ route('restaurantOwner.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <i data-feather="play" fill="#545a6d33"></i>
                                        Business Owner</a>
                                </li>
                            @endcan
                            @can('sub-restaurant')
                                <li>
                                    <a href="{{ route('subRestaurant.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <i data-feather="play" fill="#545a6d33"></i>
                                        Sub Business</a>
                                </li>
                            @endcan
                            @can('restaurant-staff')
                                <li>
                                    <a href="{{ route('restaurantStaff.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <i data-feather="play" fill="#545a6d33"></i>
                                        Business Staff</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user-list')
                    <li>
                        <a href="{{ route('user.index') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard"> Customers</span>
                        </a>
                    </li>
                @endcan

                @if ($getCurrentUserRoleName == 'SuperAdmin')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="settings" fill="#545a6d33"></i>
                            <span data-key="t-extend">Site Config</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('country.index') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Country</a>
                            </li>
                            <li>
                                <a href="{{ route('currency.index') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Currency</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid" fill="#545a6d33"></i>
                            <span data-key="t-extend">Menu</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('category.index') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Category</a>
                            </li>
                            <li>
                                <a href="{{ route('subCategory.index') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Sub Category</a>
                            </li>
    
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard"> Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="lock" fill="#545a6d33"></i>
                            <span data-key="t-extend">Permission</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('role.index') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Role</a>
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


                @if ($getCurrentUserRoleName == 'RestaurantUser')
                    @can('professional-profile')
                        <li>
                            <a href="{{ route('professionalProfile.profile') }}"
                                class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="home" fill="#545a6d33"></i>
                                <span data-key="t-dashboard"> Professional Profile</span>
                            </a>
                        </li>
                    @endcan
                @endif
            </ul>
        </div>
    </div>
</div>
