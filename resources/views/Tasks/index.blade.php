@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id();
@endphp

@if($userId)
    <x-layouts.app>
        <x-slot name="title">
            Tasks
        </x-slot>

        <x-slot name="content">
            <!-- Success Message -->
            <x-success/>

            <div
                class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 flex flex-col items-center justify-center bg-background rounded-md shadow-sm">
                <!-- Search bar -->
                <x-search/>
                <!-- Create -->
                <a href="{{ route('space.create', ['userId' => $userId]) }}" class="py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Add a Task</a>
            </div>

            <!-- Tasks -->
            <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
                <!-- Task container-->
                <div class="w-full px-4 py-2 flex flex-row justify-between items-start gap-2 border border-slate-200 rounded-md shadow-sm duration-300 ease-in-out hover:shadow hover:scale-[1.01]">
                    <!-- Task content-->
                    <div class="flex flex-col grow-0 justify-start items-start gap-2">
                        <div class="flex flex-col justify-center items-start">
                            <h3 class="text-xs lg:text-sm text-text open-sans-semibold">create the task cards</h3>
                            <div class="flex flex-row items-center justify-center gap-2">
                                <svg width="16px" height="16px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#913b3b" stroke-width="0.43200000000000005"></g><g id="SVGRepo_iconCarrier"> <path d="M7 4V2.5" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 4V2.5" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9 14.5L10.5 13V17" stroke="#525252" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 16V14C13 13.4477 13.4477 13 14 13C14.5523 13 15 13.4477 15 14V16C15 16.5523 14.5523 17 14 17C13.4477 17 13 16.5523 13 16Z" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M21.5 9H16.625H10.75M2 9H5.875" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C20.1752 21.4816 19.3001 21.7706 18 21.8985" stroke="#525252" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                <p class="text-xs text-gray-600 open-sans-regular">Wed, Apr 20</p>
                            </div>
                        </div>
                        <p class="text-xs open-sans-regular text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci dolor ea eius excepturi fugiat</p>
                    </div>
                    <!-- Task actions-->
                    <div class="pl-4 flex flex-col lg:flex-row gap-2 items-center">
                        <!--star-->
                        <button class="flex justify-center items-center size-7 sm:size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="flex-none size-4 text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2"
                                      stroke="#545454"/>
                            </svg>
                        </button>
                        {{--Dropdown menu--}}
                        <div id="dropdown" class="hs-dropdown relative inline-flex">
                            <button id="hs-dropdown-custom-icon-trigger" type="button" class="hs-dropdown-toggle flex justify-center items-center size-7 sm:size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                <svg class="flex-none size-4 text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                     width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"/>
                                    <circle cx="12" cy="5" r="1"/>
                                    <circle cx="12" cy="19" r="1"/>
                                </svg>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-36 bg-background shadow-`md` rounded-lg p-2 mt-2"
                                 aria-labelledby="hs-dropdown-custom-icon-trigger">
                                <!-- Edit -->
                                <a href="" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-accent focus:outline-none focus:bg-gray-200">
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
                                <form action="" method="post" class="m-0">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-layouts.app>
@else
    <!-- Redirect to log in-->
    {{ redirect()->route('user.login') }}
@endif
