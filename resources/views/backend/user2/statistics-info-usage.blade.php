<div class="col-span-12 xl:col-span-6 border border-dark-800">
                                    <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                                        <p class=""> <i class="fa-regular fa-copy"></i> Info Till Now</p>
                                    </div>
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-500" aria-label="table">
                                            <tbody>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Sessions
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $infoTillNow['session'] }}
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Up Time
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $infoTillNow['uptime'] }}
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Download
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $infoTillNow['download'] }}
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Upload
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $infoTillNow['upload'] }}
                                                    </th>
                                                </tr>
                                                <tr
                                                    class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">

                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Total
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $infoTillNow['total'] }}
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-span-12 xl:col-span-6 border border-dark-800">
                                    <div class="card-body border-b border-gray-100 dark:border-zinc-700">
                                        <p class=""> <i class="fa-regular fa-copy"></i> Usage Statistics</p>
                                    </div>
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-500" aria-label="table">
                                            <thead>
                                                <tr class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                    <th scope="col" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Time/Usage
                                                    </th>
                                                    <th scope="col" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Sessions
                                                    </th>
                                                    <th scope="col" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Uptime
                                                    </th>
                                                    <th scope="col" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Download
                                                    </th>
                                                    <th scope="col" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Upload
                                                    </th>
                                                    <th scope="col" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Total
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                    <th scope="row" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Last Day
                                                    </th>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneDayAgo['session'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneDayAgo['uptime'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneDayAgo['download'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneDayAgo['upload'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneDayAgo['total'] }}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                    <th scope="row" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Last Week
                                                    </th>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneWeekAgo['session'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneWeekAgo['uptime'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneWeekAgo['download'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneWeekAgo['upload'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneWeekAgo['total'] }}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                    <th scope="row" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Last Month
                                                    </th>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneMonthAgo['session'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneMonthAgo['uptime'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneMonthAgo['download'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneMonthAgo['upload'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneMonthAgo['total'] }}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border border-gray-50 dark:border-zinc-600 dark:bg-transparent">
                                                    <th scope="row" class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        Last Year
                                                    </th>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneYearAgo['session'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneYearAgo['uptime'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneYearAgo['download'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneYearAgo['upload'] }}
                                                    </td>
                                                    <td class="px-6 py-1.5 border-l border-gray-50 dark:border-zinc-600 dark:text-zinc-100">
                                                        {{ $oneYearAgo['total'] }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>