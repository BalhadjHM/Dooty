@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id();
    use Carbon\Carbon;
@endphp

@if($userId)
    <x-layouts.app>
        <x-slot name="title">
            Dooty Tasks
        </x-slot>

        <x-slot name="content">
            <!-- Success Message -->
            <x-success/>
            <!-- Error Message -->
            <x-alert/>

            <x-container class="flex flex-col items-center justify-center">
                <!-- Search bar -->
                <x-search-tasks spaceId="{{ $spaceId }}"/>
                <div class="flex lg:flex-row items-stretch gap-2">
                    <!-- Home Page -->
                    <x-popover>
                        <a href="{{ route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]) }}" class="size-8 md:size-9 flex justify-center items-center bg-gray-50 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm duration-300 ease-in-out hover:bg-accent disabled:opacity-50 disabled:pointer-events-none">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 18H9" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        </a>
                        <x-slot name="message">
                            Home
                        </x-slot>
                    </x-popover>
                    <!-- back -->
                    <x-popover>
                        <a href="{{ route('user.index', ['userId' => $userId]) }}" class="hs-tooltip-toggle size-8 md:size-9 flex justify-center items-center bg-gray-50 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm duration-300 ease-in-out hover:bg-accent disabled:opacity-50 disabled:pointer-events-none">
                            <svg width="20px" height="20px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"></g><g id="SVGRepo_iconCarrier"> <path d="M4 10L3.29289 10.7071L2.58579 10L3.29289 9.29289L4 10ZM21 18C21 18.5523 20.5523 19 20 19C19.4477 19 19 18.5523 19 18L21 18ZM8.29289 15.7071L3.29289 10.7071L4.70711 9.29289L9.70711 14.2929L8.29289 15.7071ZM3.29289 9.29289L8.29289 4.29289L9.70711 5.70711L4.70711 10.7071L3.29289 9.29289ZM4 9L14 9L14 11L4 11L4 9ZM21 16L21 18L19 18L19 16L21 16ZM14 9C17.866 9 21 12.134 21 16L19 16C19 13.2386 16.7614 11 14 11L14 9Z" fill="#000000"></path> </g></svg>
                        </a>
                        <x-slot name="message">
                            Back to spaces
                        </x-slot>
                    </x-popover>
                    <!-- Logout -->
                    <x-popover>
                        <a href="{{ route('user.login', ['userId' => $userId]) }}" class="size-8 md:size-9 flex justify-center items-center bg-gray-50 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm duration-300 ease-in-out hover:bg-accent disabled:opacity-50 disabled:pointer-events-none">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.2429 22 18.8286 22 16.0002 22H15.0002C12.1718 22 10.7576 22 9.87889 21.1213C9.11051 20.3529 9.01406 19.175 9.00195 17" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </a>
                        <x-slot name="message">
                            Logout
                        </x-slot>
                    </x-popover>
                    <!-- Create -->
                    <a href="{{ route('task.create', ['userId' => $userId, 'spaceId' => $spaceId]) }}" class="py-2 px-4 flex items-center bg-accent poppins-medium text-sm rounded-md shadow">Add Task</a>
                </div>
            </x-container>

            <!-- Tasks -->
            <x-container id="taskContainer" class="flex flex-col gap-2">
                <h2 class="mb-2 text-md lg:text-lg text-text poppins-bold">Task List</h2>
                <!-- Task card -->
                @if(count($tasks) == 0)
                    <x-list-not-found object="tasks" key="Add Task"/>
                @endif
                @foreach($tasks as $task)
                    <div class="w-full px-4 py-2 flex flex-row justify-between items-stretch gap-4 divide-x divide-slate-100 border border-slate-200 rounded-md shadow-sm cursor-pointer duration-300 ease-in-out hover:shadow hover:scale-[1.01] {{ $task->status == 0 ? 'checked' : ($task->status == 3 ? 'warning' : '') }}">
                        <div data-user-id="{{ $userId }}" data-space-id="{{ $spaceId }}" data-task-id="{{ $task->id }}" data-task-status="{{ $task->status }}" class="w-full flex flex-col grow-0 justify-start items-start gap-2">
                            <div class="flex flex-col lg:flex-row items-start gap-1 lg:gap-4">
                                <div class="flex flex-col justify-center items-start">
                                    <h3 class="text-xs lg:text-sm text-text open-sans-semibold capitalize">
                                        @if(!empty($searchTerm))
                                            {!! str_ireplace([$searchTermLower, $searchTermUpper, $searchTermCapitalized], '<span class="px-[1px] bg-yellow-300 rounded">'.$searchTerm.'</span>', $task->title) !!}
                                        @else
                                            {{ $task->title }}
                                        @endif
                                    </h3>
                                    <div class="flex flex-row items-center justify-center gap-2">
                                        <svg width="16px" height="16px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#913b3b" stroke-width="0.43200000000000005"></g><g id="SVGRepo_iconCarrier"> <path d="M7 4V2.5" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 4V2.5" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9 14.5L10.5 13V17" stroke="#525252" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 16V14C13 13.4477 13.4477 13 14 13C14.5523 13 15 13.4477 15 14V16C15 16.5523 14.5523 17 14 17C13.4477 17 13 16.5523 13 16Z" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M21.5 9H16.625H10.75M2 9H5.875" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C20.1752 21.4816 19.3001 21.7706 18 21.8985" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        <p class="text-xs text-gray-600 open-sans-regular">{{ Carbon::parse($task->due_date)->format('D, M') . " " . Carbon::parse($task->due_date)->format('d') }}</p>
                                    </div>
                                </div>
                                @if($task->status == 0)
                                        <span class="py-1 px-2 text-background open-sans-bold text-xs bg-green-600 rounded-full">Completed</span>
                                @elseif($task->status == 3)
                                        <span class="py-1 px-2 text-background open-sans-bold text-xs bg-red-600 rounded-full">Overdue</span>
                                @endif
                            </div>
                            <p class="text-xs open-sans-regular text-justify">
                                @if(!empty($searchTerm))
                                    {!! str_ireplace([$searchTermLower, $searchTermUpper, $searchTermCapitalized], '<span class="px-[1px] bg-yellow-300 rounded">'.$searchTerm.'</span>', $task->description) !!}
                                @else
                                    {{ $task->description }}
                                @endif
                            </p>
                        </div>
                        <!-- Task actions-->
                        <div class="pl-3 flex flex-col gap-2 items-start">
                            {{--Dropdown menu--}}
                            <x-dropdown>
                                <!-- Edit -->
                                <a href="{{ route('task.edit', ['userId' => $userId, 'spaceId' => $spaceId, 'taskId' => $task->id]) }}" class="hs-dropdown-btn flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-accent focus:outline-none focus:bg-gray-200">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M10 21.9948C6.58687 21.9658 4.70529 21.7764 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                                stroke="#545454" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M2.5 7.25C2.08579 7.25 1.75 7.58579 1.75 8C1.75 8.41421 2.08579 8.75 2.5 8.75V7.25ZM22 7.25H2.5V8.75H22V7.25Z"
                                                fill="#545454"></path>
                                            <path d="M10.5 2.5L7 8" stroke="#545454" stroke-width="1.5"
                                                  stroke-linecap="round"></path>
                                            <path d="M17 2.5L13.5 8" stroke="#545454" stroke-width="1.5"
                                                  stroke-linecap="round"></path>
                                            <path
                                                d="M18.562 13.9354L18.9791 13.5183C19.6702 12.8272 20.7906 12.8272 21.4817 13.5183C22.1728 14.2094 22.1728 15.3298 21.4817 16.0209L21.0646 16.438M18.562 13.9354C18.562 13.9354 18.6142 14.8217 19.3962 15.6038C20.1783 16.3858 21.0646 16.438 21.0646 16.438M18.562 13.9354L14.7275 17.77C14.4677 18.0297 14.3379 18.1595 14.2262 18.3027C14.0945 18.4716 13.9815 18.6544 13.8894 18.8478C13.8112 19.0117 13.7532 19.1859 13.637 19.5344L13.2651 20.65L13.1448 21.0109M21.0646 16.438L17.23 20.2725C16.9703 20.5323 16.8405 20.6621 16.6973 20.7738C16.5284 20.9055 16.3456 21.0185 16.1522 21.1106C15.9883 21.1888 15.8141 21.2468 15.4656 21.363L14.35 21.7349L13.9891 21.8552M13.9891 21.8552L13.6281 21.9755C13.4567 22.0327 13.2676 21.988 13.1398 21.8602C13.012 21.7324 12.9673 21.5433 13.0245 21.3719L13.1448 21.0109M13.9891 21.8552L13.1448 21.0109"
                                                stroke="#545454" stroke-width="1.5"></path>
                                        </g>
                                    </svg>
                                    Edit
                                </a>
                                <hr class="border-gray-200">
                                <!-- Delete -->
                                <form action="{{ route('task.destroy', ['userId' => $userId, 'spaceId' => $spaceId, 'taskId' => $task->id]) }}" method="post" class="hs-dropdown-btn m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-accent focus:outline-none focus:bg-gray-200">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M22 12C22 15.7712 22 17.6569 20.7961 18.8284C19.5921 20 17.6544 20 13.779 20H11.142C8.91458 20 7.80085 20 6.87114 19.4986C5.94144 18.9971 5.35117 18.0781 4.17061 16.24L3.48981 15.18C2.4966 13.6336 2 12.8604 2 12C2 11.1396 2.4966 10.3664 3.48981 8.82001L4.17061 7.76001C5.35117 5.92191 5.94144 5.00286 6.87114 4.50143C7.80085 4 8.91458 4 11.142 4L13.779 4C17.6544 4 19.5921 4 20.7961 5.17157C21.4673 5.82475 21.7643 6.69989 21.8957 8"
                                                    stroke="#545454" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M15.5 9.50002L10.5 14.5M10.5 9.5L15.5 14.5" stroke="#545454"
                                                      stroke-width="1.5" stroke-linecap="round"></path>
                                            </g>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </x-dropdown>
                            <!--star-->
                            @if($task->status != 2)
                                <x-popover>
                                    <form method="post" action="{{ route('task.star', ['userId' => $userId, 'spaceId' => $spaceId, 'taskId' => $task->id]) }}" class="star m-0">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="flex justify-center items-center size-7 sm:size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                            <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6.03954 7.77203C3.57986 8.32856 2.35002 8.60682 2.05742 9.54773C1.76482 10.4886 2.60325 11.4691 4.2801 13.4299L4.71392 13.9372C5.19043 14.4944 5.42868 14.773 5.53586 15.1177C5.64305 15.4624 5.60703 15.8341 5.53498 16.5776L5.4694 17.2544C5.21588 19.8706 5.08912 21.1787 5.85515 21.7602C6.62118 22.3417 7.77268 21.8115 10.0757 20.7512L10.6715 20.4768C11.3259 20.1755 11.6531 20.0248 12 20.0248C12.3469 20.0248 12.6741 20.1755 13.3285 20.4768L13.9243 20.7512C16.2273 21.8115 17.3788 22.3417 18.1449 21.7602C18.9109 21.1787 18.7841 19.8706 18.5306 17.2544M19.7199 13.4299C21.3968 11.4691 22.2352 10.4886 21.9426 9.54773C21.65 8.60682 20.4201 8.32856 17.9605 7.77203L17.3241 7.62805C16.6251 7.4699 16.2757 7.39083 15.9951 7.17781C15.7144 6.96479 15.5345 6.64193 15.1745 5.99623L14.8468 5.40837C13.5802 3.13612 12.9469 2 12 2C11.0531 2 10.4198 3.13613 9.15316 5.40838" stroke="#474747" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        </button>
                                    </form>
                                    <x-slot name="message">
                                        Star
                                    </x-slot>
                                </x-popover>
                            @else
                                <x-popover>
                                    <form method="post" action="{{ route('task.unstar', ['userId' => $userId, 'spaceId' => $spaceId, 'taskId' => $task->id]) }}" class="unstar m-0">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="flex justify-center items-center size-7 sm:size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18.4834 16.7674C17.8471 16.9195 17.1829 17 16.5 17C11.8056 17 8 13.1944 8 8.50001C8 8.01653 8.04036 7.54249 8.11791 7.08105C8.08172 7.11586 8.04432 7.14792 8.00494 7.17781C7.72433 7.39083 7.37485 7.46991 6.67589 7.62806L6.03954 7.77204C3.57986 8.32856 2.35002 8.60682 2.05742 9.54774C1.76482 10.4887 2.60325 11.4691 4.2801 13.4299L4.71392 13.9372C5.19042 14.4944 5.42868 14.773 5.53586 15.1177C5.64305 15.4624 5.60703 15.8341 5.53498 16.5776L5.4694 17.2544C5.21588 19.8706 5.08912 21.1787 5.85515 21.7602C6.62117 22.3417 7.77267 21.8116 10.0757 20.7512L10.6715 20.4768C11.3259 20.1755 11.6531 20.0249 12 20.0249C12.3469 20.0249 12.6741 20.1755 13.3285 20.4768L13.9243 20.7512C16.2273 21.8116 17.3788 22.3417 18.1449 21.7602C18.9109 21.1787 18.7841 19.8706 18.5306 17.2544L18.4834 16.7674Z" fill="#fddf1c"></path> <path opacity="0.5" d="M9.15302 5.40838L8.82532 5.99623C8.46538 6.64194 8.28541 6.96479 8.0048 7.17781C8.04418 7.14791 8.08158 7.11586 8.11777 7.08105C8.04022 7.54249 7.99986 8.01653 7.99986 8.50001C7.99986 13.1944 11.8054 17 16.4999 17C17.1828 17 17.8469 16.9195 18.4833 16.7674L18.4649 16.5776C18.3928 15.8341 18.3568 15.4624 18.464 15.1177C18.5712 14.773 18.8094 14.4944 19.2859 13.9372L19.7198 13.4299C21.3966 11.4691 22.235 10.4886 21.9424 9.54773C21.6498 8.60682 20.42 8.32856 17.9603 7.77203L17.324 7.62805C16.625 7.4699 16.2755 7.39083 15.9949 7.17781C15.7143 6.96479 15.5343 6.64194 15.1744 5.99624L14.8467 5.40837C13.58 3.13612 12.9467 2 11.9999 2C11.053 2 10.4197 3.13613 9.15302 5.40838Z" fill="#fddf1c"></path> </g></svg>
                                        </button>
                                    </form>
                                    <x-slot name="message">
                                        Unstar
                                    </x-slot>
                                </x-popover>
                            @endif
                        </div>
                    </div>
                @endforeach
            </x-container>
        </x-slot>
    </x-layouts.app>
@else
    <!-- Redirect to log in-->
    {{ redirect()->route('user.login') }}
@endif
