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
                            <span data-key="t-apps"> Menus</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('category.index') }}"
                                    class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    <i data-feather="home" fill="#545a6d33"></i>
                                    <span data-key="t-dashboard">General Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('subCategory.index') }}"
                                    class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    <i data-feather="home" fill="#545a6d33"></i>
                                    <span data-key="t-dashboard">More Specific Item</span>
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
                @can('user-list')
                    <li>
                        <a href="{{ route('user.index') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard"> Customers</span>
                        </a>
                    </li>
                @endcan
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

                @can('user')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block :rtl:pr-10 py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="users" fill="#545a6d33"></i>
                            <span data-key="t-auth">Customers</span>
                        </a>
                        <ul>
                            @can('user-create')
                                <li>
                                    <a href="{{ route('user.create') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Add</a>
                                </li>
                            @endcan
                            @can('user-list')
                                <li>
                                    <a href="{{ route('user.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>List</a>
                                </li>
                            @endcan
                            @can('user-find')
                                <li>
                                    <a href="{{ route('user.find') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Find</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('lease')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="briefcase" fill="#545a6d33"></i><span data-key="t-pages">Lease</span>
                        </a>
                        <ul>
                            @can('lease-create')
                                <li>
                                    <a href="{{ route('lease.create') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Add</a>
                                </li>
                            @endcan
                            @can('lease-list')
                                <li>
                                    <a href="{{ route('lease.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>List</a>
                                </li>
                            @endcan
                            @can('lease-find')
                                <li>
                                    <a href="{{ route('lease.find') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Find</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('cards')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="credit-card" fill="#545a6d33"></i><span data-key="t-pages">Cards</span>
                        </a>
                        <ul>
                            @can('card-create')
                                <li>
                                    <a href="{{ route('cards.create') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Add</a>
                                </li>
                            @endcan
                            @can('card-list')
                                <li>
                                    <a href="{{ route('cards.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>List</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @canany(['ipv4-static-pool', 'ipv6-static-pool'])
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="globe" fill="#545a6d33"></i>
                            <span data-key="t-compo">IP Pool</span>
                        </a>
                        <ul>
                            @can('ipv4-static-pool')
                                <li>
                                    <a href="{{ route('ipv4.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>IPv4</a>
                                </li>
                            @endcan
                            @can('ipv6-static-pool')
                                <li>
                                    <a href="{{ route('ipv6.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>IPv6</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('invoice-ucp')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="file-text" fill="#545a6d33"></i>
                            <span data-key="t-compo">Invoice</span>
                        </a>
                        <ul>
                            @can('invoice-pending-list')
                                <li>
                                    <a href="{{ route('invoice.pending.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Pending
                                        <span
                                            class="badge bg-red-50 dark:bg-red-500/10 text-danger ltr:float-right rtl:float-left z-50 px-1.5 rounded-full text-11 text-red-500"
                                            data-toggle="collapse">{{ invoiceStatusCount('0') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('invoice-generated-list')
                                <li>
                                    <a href="{{ route('invoice.generated.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Generated
                                        <span
                                            class="badge bg-red-50 dark:bg-red-500/10 text-danger ltr:float-right rtl:float-left z-50 px-1.5 rounded-full text-11 text-red-500"
                                            data-toggle="collapse">{{ invoiceStatusCount('1') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('ticket-complaint')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="inbox" fill="#545a6d33"></i>
                            <span data-key="t-extend">Ticket</span>
                        </a>
                        <ul>
                            @can('ticket-complaint-dashboard')
                                <li>
                                    <a href="{{ route('tickets.dashboard.dashboard-index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Dashboard</a>
                                </li>
                            @endcan
                            @can('ticket-complaint-create')
                                <li>
                                    <a href="{{ route('tickets.list.create') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Add</a>
                                </li>
                            @endcan
                            @can('ticket-complaint-list')
                                <li>
                                    <a href="{{ route('tickets.list.index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>List</a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                @can('inventory-master')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="database" fill="#545a6d33"></i>
                            <span data-key="t-extend">Inventory</span>
                        </a>
                        <ul>
                            @can('add-category')
                                <li>
                                    <a href="{{ route('inventory.category.create') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Add Category</a>
                                </li>
                            @endcan
                            @can('category-list')
                                <li>
                                    <a href="{{ route('inventory.category.index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Category</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('reports')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="bar-chart" fill="#545a6d33"></i>
                            <span data-key="t-extend">Reports</span>
                        </a>
                        <ul>
                            @can('reports-online-user')
                                <li>
                                    <a href="{{ route('reports.onlineUser.index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Online
                                        User</a>
                                </li>
                            @endcan
                            @can('reports-usage-session')
                                <li>
                                    <a href="{{ route('reports.usageSession.index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Usage
                                        / Session</a>
                                </li>
                            @endcan
                            @can('reports-renewal-expired')
                                <li>
                                    <a href="{{ route('reports.renewal.expired.index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Renewal
                                        / Expired</a>
                                </li>
                            @endcan
                            @can('reports-new-subscription')
                                <li>
                                    <a href="{{ route('reports.new-subscription.index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>New
                                        Subscription</a>
                                </li>
                            @endcan
                            @can('reports-sales')
                                <li>
                                    <a href="{{ route('reports.sales.index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Sales</a>
                                </li>
                            @endcan
                            @can('reports-collections')
                                <li>
                                    <a href="{{ route('reports.collections-index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Collections</a>
                                </li>
                            @endcan
                            @can('reports-statements')
                                <li>
                                    <a href="{{ route('reports.statement-index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Statements</a>
                                </li>
                            @endcan
                            @can('reports-transactions')
                                <li>
                                    <a href="{{ route('reports.transaction-index') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Transactions</a>
                                </li>
                            @endcan
                            @can('reports-message-status')
                                <li>
                                    <a href="{{ route('reports.messageStatus') }}"
                                        class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                            data-feather="play" fill="#545a6d33"></i>Message
                                        Status</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @if ($getCurrentUserRoleName == 'SuperAdmin')
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




                    {{-- <li class="px-5 py-3 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden block"
                        data-key="t-menu">REQUESTS</li>

                    <li>
                        <a href="{{ route('inquiry.index') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="message-square" fill="#545a6d33"></i>
                            <span data-key="t-level">Inquiries</span>
                        </a>
                    </li> --}}
                @else
                    @can('config')
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false"
                                class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                <i data-feather="settings" fill="#545a6d33"></i>
                                <span data-key="t-extend">Config</span>
                            </a>
                            <ul>
                                @can('config-change-profile')
                                    <li>
                                        <a href="{{ route('operator-config.edit-profile') }}"
                                            class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                                data-feather="play" fill="#545a6d33"></i>Profile</a>
                                    </li>
                                @endcan
                                @can('config-change-password')
                                    <li>
                                        <a href="{{ url('user/profile') }}"
                                            class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                                data-feather="play" fill="#545a6d33"></i>Change Password</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                @endif
            </ul>
        </div>
    </div>
</div>
