<div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
    <div class="col-span-12 xl:col-span-3">
        <div class="p-5 rounded card bg-sky-400 border-sky-400">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-6 lg:col-span-6 flex items-center">
                    <i class="fa fa-user mr-3 text-white fa-3x"></i>
                </div>
                <div class="col-span-6 lg:col-span-6 flex justify-end items-center">
                    <div class="text-right">
                        <span class="text-white"><b>Users</b></span><br>
                        <span class="text-white text-xl">{{ $allUsers }}</span>
                    </div>
                </div>
                <div class="col-span-12">
                    <hr class="my-2 border-white">
                </div>
                <div class="col-span-12">
                    <i class="fa fa-user mr-3 text-white"></i>
                    <span class="text-white"><b>Total Users Till Now</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 xl:col-span-3">
        <div class="p-5 bg-green-600 border-green-600 rounded card">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-6 lg:col-span-6 flex items-center">
                    <i class="fas fa-link mr-3 text-white fa-3x"></i>
                </div>
                <div class="col-span-6 lg:col-span-6 flex justify-end items-center">
                    <div class="text-right">
                        <span class="text-white"><b>Online</b></span><br>
                        <span class="text-white text-xl online-user">0</span>
                    </div>
                </div>
                <div class="col-span-12">
                    <hr class="my-2 border-white">
                </div>
                <div class="col-span-12">
                    <i class="fas fa-link mr-3 text-white"></i>
                    <span class="text-white"><b>Total Online Users</b></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 xl:col-span-3">
        <div class="p-5 rounded card bg-violet-700">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-6 lg:col-span-6 flex items-center">
                    <i class="fa fa-check-square mr-3 text-white fa-3x"></i>
                </div>
                <div class="col-span-6 lg:col-span-6 flex justify-end items-center">
                    <div class="text-right">
                        <span class="text-white"><b>Active</b></span><br>
                        <span class="text-white text-xl">{{ $activeUsers }}</span>
                    </div>
                </div>
                <div class="col-span-12">
                    <hr class="my-2 border-white">
                </div>
                <div class="col-span-12">
                    <i class="fa fa-check-square mr-3 text-white"></i>
                    <span class="text-white"><b>Total Active Users</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 xl:col-span-3">
        <div class="p-5 rounded card bg-yellow-700 border-yellow-700">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-6 lg:col-span-6 flex items-center">
                    <i class="fas fa-calendar-alt mr-3 text-white fa-3x"></i>
                </div>
                <div class="col-span-6 lg:col-span-6 flex justify-end items-center">
                    <div class="text-right">
                        <span class="text-white"><b>Renewals</b></span><br>
                        <span class="text-white text-xl">{{ $totalRenewalUser }}</span>
                    </div>
                </div>
                <div class="col-span-12">
                    <hr class="my-2 border-white">
                </div>
                <div class="col-span-12">
                    <i class="fas fa-calendar-alt mr-3 text-white"></i>
                    <span class="text-white"><b>Expiring Tomorrow</b></span>
                </div>
            </div>
        </div>
    </div>
</div>
@can('dashboard-router-interface-graph')
    <div class="grid grid-cols-12 gap-6 border-2">
        <div class="col-span-12 flex p-2 bg-green-700 ">
            <div class="col-span-2 mr-5 flex justify-start items-center">
                <i class="fa fa-bar-chart text-white" aria-hidden="true"></i><span class="text-white ml-1"><b> Interface
                        Traffic</b></span>
            </div>
            <div class="col-span-2 mr-2">
                <select name="time_filter" id="time_filter"
                    class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                    value="{{ old('time_filter') }}">
                    @foreach ($shortName as $key => $value)
                        <option value="{{ $key }}"> {{ $value }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12">
        <div class="col-span-12 xl:col-span-6">
            <div class="box-content h-52 overflow-auto">
                <div id="wan"></div>
            </div>
            <div id="wan_traffic"></div>
        </div>
        <div class="col-span-12 xl:col-span-6">
            <div class="box-content h-52 overflow-auto">
                <div id="lan"></div>
            </div>
            <div id="lan_traffic"></div>
        </div>
    </div>
@endcan

<div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12 mt-4">
    @can('dashboard-router-health')
        <div class="col-span-12 xl:col-span-3 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700 ">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-medkit text-white" aria-hidden="true"></i><span class="text-white ml-1"><b> Router
                            Health</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".healthContent">Toggle</button>
            </div>
            <div class="p-2 healthContent">
                <p><b>Uptime</b> <span class="float-right router-health-uptime"></span> </p>
                <p><b>CPU-Load</b> <span class="float-right router-health-cpu-load"></span> </p>
                <p><b>Total-Memory</b> <span class="float-right router-health-total-memory"></span> </p>
                <p><b>Free-Memory</b> <span class="float-right router-health-free-memory"></span> </p>
                <p><b>Total Disk</b> <span class="float-right router-health-total-disk">128MB</span> </p>
                <p><b>Free Disk</b> <span class="float-right router-health-free-disk">1034MB</span> </p>
                <p><b>Board-Name</b> <span class="float-right router-health-board-name">CCR1009-7G-1C-1S+</span> </p>
                <p><b>Version</b> <span class="float-right router-health-version">7.4(Stable)</span> </p>
                <p><b>Temperature</b> <span class="float-right router-health-temperature">N/A</span> </p>
                <p><b>Voltage</b> <span class="float-right router-health-voltage">N/A</span> </p>
            </div>
        </div>
    @endcan

    @can('dashboard-reports-statistics')
        <div class="col-span-12 xl:col-span-3 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700 ">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-info text-white" aria-hidden="true"></i><span class="text-white ml-1"><b>
                            Statistic</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".statisticContent">Toggle</button>
            </div>
            <div class="p-2 statisticContent">
                <p><a href="{{ route('dashboard.userList', ['next-15days-expire']) }}" class="text-blue-500">15 Day(s)
                        Expire</a> <span
                        class="float-right statistic-15-expire">{{ $statistic['users_expiring_soon'] }}</span> </p>
                <p><a href="{{ route('dashboard.userList', ['today-connections']) }}" class="text-blue-500">Today's
                        conn.</a> <span class="float-right statistic-today-conn">{{ $statistic['today_count'] }}</span>
                </p>
                <p><a href="{{ route('dashboard.userList', ['current-month-connections']) }}" class="text-blue-500">This
                        Month Conn.</a> <span
                        class="float-right statistic-this-month">{{ $statistic['current_month_count'] }}</span> </p>
                <p><a href="{{ route('dashboard.userList', ['previous-month-connections']) }}" class="text-blue-500">Last
                        Month Conn.</a> <span
                        class="float-right statistic-last-month">{{ $statistic['previous_month_count'] }}</span> </p>
            </div>
        </div>
    @endcan

    @can('dashboard-reports-top-usage')
        <div class="col-span-12 xl:col-span-3 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700 ">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-database text-white" aria-hidden="true"></i><span class="text-white ml-1"><b> Top
                            Usage</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".usageContent">Toggle</button>
            </div>
            <div class="p-2 usageContent">
                @foreach ($topUsageUsers as $key => $value)
                    <p><a href="{{ route('user.edit', $value['u_id']) }}" class="text-blue-500">{{ $value['username'] }}</a><span
                            class="float-right">{{ $value['total_usage'] }}</span> </p>
                @endforeach
            </div>
            <div class="p-2 usageContent">
                <a href="{{ route('dashboard.topUsageSession',['top-usage']) }}" class="text-blue-500 btn">View More</a>
            </div>
        </div>
    @endcan

    @can('dashboard-reports-top-sessions')
        <div class="col-span-12 xl:col-span-3 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-plug text-white" aria-hidden="true"></i>
                    <span class="text-white ml-1"><b> Top Sessions</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".sessionContent">Toggle</button>
            </div>
            <div class="p-2 sessionContent">
                @foreach ($topSessions as $key => $value)
                    <p><a href="{{ route('user.edit', $value["u_id"]) }}" class="text-blue-500">{{ $value['username'] }}</a><span
                            class="float-right">{{ $value['session_count'] }}</span> </p>
                @endforeach
            </div>
            <div class="p-2 usageContent">
                <a href="{{ route('dashboard.topUsageSession',['top-session']) }}" class="text-blue-500 btn">View More</a>
            </div>
        </div>
    @endcan
</div>

<div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12 mt-4">
    @can('dashboard-reports-accnt-info')
        <div class="col-span-12 xl:col-span-3 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700 ">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-info text-white" aria-hidden="true"></i><span class="text-white ml-1"><b> Acct.
                            Info</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".accntInfoContent">Toggle</button>
            </div>
            <div class="p-2 accntInfoContent">
                <p><b>Account Type</b> <span class="float-right acc-type">214</span> </p>
                <p><b>Balance</b><span class="float-right acc-info-balance">1</span> </p>
            </div>
        </div>
    @endcan

    @can('dashboard-reports-live-by-nas')
        <div class="col-span-12 xl:col-span-6 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700 ">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-flag text-white" aria-hidden="true"></i><span class="text-white ml-1"><b>
                            LiveByNas</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".liveByNasContent">Toggle</button>
            </div>
            <div class="p-2 liveByNasContent">
                <table id="live-by-nas-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100"
                    aria-label="table">
                    <thead>
                        <tr>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                ID</th>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                NAS</th>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                Live</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    @endcan

    @can('dashboard-reports-all-user-status')
        <div class="col-span-12 xl:col-span-3 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700 ">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-users text-white" aria-hidden="true"></i><span
                        class="text-white ml-1"><b>UserStatus</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".userStatusContent">Toggle</button>
            </div>
            <div class="p-2 userStatusContent">
                <p class="text-center text-red-800">*Without Card User*</p>
                <p><a href="{{ route('user.index') }}" class="text-blue-500">Total</a> <span
                        class="float-right user-status-total">6374</span> </p>
                <p><a href="{{ route('user.index') }}" class="text-blue-500">Active</a> <span
                        class="float-right user-status-active">2541</span> </p>
                <p><a href="{{ route('user.index') }}" class="text-blue-500">Expired</a> <span
                        class="float-right user-status-expired">2541</span> </p>
                <p><a href="{{ route('user.index') }}" class="text-blue-500">Disabled</a> <span
                        class="float-right user-status-disable">117</span> </p>
            </div>
        </div>
    @endcan
</div>

@can('dashboard-logs-sysevent-user-authLog')
    <div class="grid grid-cols-1 lg:gap-x-6 lg:grid-cols-12 mt-4">
        <div class="col-span-12 xl:col-span-6 border border-dark-800">
            <div class="col-span-12 flex p-2 bg-green-700 ">
                <div class="col-span-2 mr-5 flex justify-start items-center">
                    <i class="fa fa-lock text-white" aria-hidden="true"></i><span
                        class="text-white ml-1"><b>UserAuthLog</b></span>
                </div>
                <button class="ml-auto text-white toggle-btn" data-target=".userAuthContent">Toggle</button>
            </div>
            <div class="p-2 userAuthContent">
                <table id="userauth-table" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                    <thead>
                        <tr>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                ID</th>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                Username</th>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                Status</th>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                Message</th>
                            <th
                                class="p-4 pr-8 border rtl:border-l-0 border-t-2 border-gray-50 dark:border-zinc-600 py-2 px-4">
                                Date/Time</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endcan
