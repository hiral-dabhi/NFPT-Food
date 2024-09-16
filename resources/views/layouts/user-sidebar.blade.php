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
                        <a href="{{ route('dashboard') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="home" fill="#545a6d33"></i>
                            <span data-key="t-dashboard"> Dashboard</span>
                        </a>
                    </li>
                @endcan

                <li class="px-5 py-3 mt-2 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden"
                    data-key="t-elements">RADIUS</li>

                @if ($getCurrentUserRoleName == 'SuperAdmin')
                    <li>
                        <a href="{{ route('nas.index') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="box" fill="#545a6d33"></i>
                            <span data-key="t-forms"> NAS</span>
                        </a>
                    </li>
                @endif
                @can('services-plan')
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid" class="align-middle" fill="#545a6d33"></i>
                            <span data-key="t-apps"> Services</span>
                        </a>
                        <ul>
                            @can('service-create')
                                <li>
                                    <a href="{{ route('services.create') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <i data-feather="play" fill="#545a6d33"></i>
                                        Add</a>
                                </li>
                            @endcan
                            @can('service-list')
                                <li>
                                    <a href="{{ route('services.index') }}"
                                        class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <i data-feather="play" fill="#545a6d33"></i>
                                        List</a>
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
                            <span data-key="t-auth">Users</span>
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
                            <li>
                                <a href="{{ route('operator.index') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Operator</a>
                            </li>
                            <li>
                                <a href="{{ route('employee.index') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Employee</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="settings" fill="#545a6d33"></i>
                            <span data-key="t-extend">Config</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('config.profile') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('config.sms-notification.setting') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>SMS
                                    Notification</a>
                            </li>
                            <li>
                                <a href="{{ route('email-notification.setting') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Mail
                                    Notification</a>
                            </li>

                            <li>
                                <a href="{{ route('config.payment-gateway') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Payment
                                    Gateway</a>
                            </li>
                            <li>
                                <a href="{{ route('config.invoice') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Invoice
                                    / Billing</a>
                            </li>
                            <li>
                                <a href="{{ route('config.ucp-edit') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>UCP</a>
                            </li>
                            <li>
                                <a href="{{ route('config.website.edit') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Website</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="monitor" fill="#545a6d33"></i>
                            <span data-key="t-extend">System</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('system.dashboard') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('system.log-management') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Logs
                                    Management</a>
                            </li>
                            <li>
                                <a href="{{ route('system.backupRestore.general') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Backup
                                    & Restore</a>
                            </li>

                            <li>
                                <a href="{{ route('system.alerts-list') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Alerts</a>
                            </li>
                            {{-- <li>
                            <a href="#"
                                class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">License</a>
                        </li> --}}

                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="cpu" fill="#545a6d33"></i>
                            <span data-key="t-extend">Logs</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('logs.server.auth') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>Server</a>
                            </li>
                            <li>
                                <a href="{{ route('logs.user.auth') }}"
                                    class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white"><i
                                        data-feather="play" fill="#545a6d33"></i>User</a>
                            </li>
                        </ul>
                    </li>

                    <li class="px-5 py-3 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden block"
                        data-key="t-menu">REQUESTS</li>

                    <li>
                        <a href="{{ route('inquiry.index') }}"
                            class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i data-feather="message-square" fill="#545a6d33"></i>
                            <span data-key="t-level">Inquiries</span>
                        </a>
                    </li>
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
