@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id();
@endphp


@if($userId)
    <x-layouts.app>
        <x-slot name="title">
            Dooty Spaces
        </x-slot>

        <x-slot name="content">
            <!-- Alert Message -->
            <x-alert/>

            <!-- Success Message -->
            <x-success/>

            <x-container class="flex flex-col items-center justify-center">
                <!-- Search bar -->
                <x-search :tagName="$tagName ?? null" />
                <div class="flex lg:flex-row items-stretch gap-2">
                    <!-- Home Page -->
                    <x-popover>
                        <a href="{{ route('user.index', ['userId' => $userId]) }}" class="size-8 md:size-9 flex justify-center items-center bg-gray-50 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm duration-300 ease-in-out hover:bg-accent disabled:opacity-50 disabled:pointer-events-none">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 18H9" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        </a>
                        <x-slot name="message">
                            Home
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
                    <a href="{{ route('space.create', ['userId' => $userId]) }}" class="py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Create a Space</a>
                </div>
            </x-container>

            <!-- Spaces -->
            @if(count($spaces) == 0)
                <x-container>
                    <x-list-not-found object="spaces" key="Create Space"/>
                </x-container>
            @endif
            @foreach($spaces as $space)
                <x-container class="cursor-pointer duration-300 ease-in-out hover:scale-[1.02]">
                    <div class="mb-4 pb-4 flex justify-between items-center border-b-2 border-accent">
                        {{--Title--}}
                        <h2 id="space-card" data-space-card data-user-id="{{ $userId }}" data-space-id="{{ $space->id }}" class="w-full text-text text-xl md:text-2xl poppins-bold capitalize">
                            @if(!empty($searchTerm))
                                {!! str_ireplace([$searchTermLower, $searchTermUpper, $searchTermCapitalized], '<span class="px-0.5 bg-yellow-300 rounded">'.$searchTerm.'</span>', $space->title) !!}
                            @else
                                {{ $space->title }}
                            @endif
                        </h2>
                        {{--Dropdown menu--}}
                        <x-dropdown class="pl-4">
                            @if($space->pinned == 0)
                                <form action="{{ route('space.pin', ['userId' => $userId, 'spaceId' => $space->id]) }}" method="post" class="hs-dropdown-btn m-0">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-accent focus:outline-none focus:bg-gray-200">
                                        <svg width="20px" height="20px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                                             xmlns="http://www.w3.org/2000/svg" stroke="#000000"
                                             stroke-width="0.00024000000000000003">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M15.9894 4.9502L16.52 4.42014L16.52 4.42014L15.9894 4.9502ZM8.73845 19.429L8.20785 19.9591L8.73845 19.429ZM4.62176 15.3081L5.15236 14.7781L4.62176 15.3081ZM17.567 14.9943L17.3032 14.2922L17.567 14.9943ZM15.6499 15.7146L15.9137 16.4167L15.6499 15.7146ZM8.33227 8.38177L7.62805 8.12375H7.62805L8.33227 8.38177ZM9.02673 6.48636L9.73095 6.74438L9.02673 6.48636ZM5.84512 10.6735L6.04445 11.3965H6.04445L5.84512 10.6735ZM7.30174 10.1351L6.86354 9.52646L6.86354 9.52646L7.30174 10.1351ZM7.6759 9.79038L8.24673 10.2768H8.24673L7.6759 9.79038ZM14.2511 16.3805L14.7421 16.9475L14.7421 16.9475L14.2511 16.3805ZM13.3807 18.2012L12.6575 18.0022V18.0022L13.3807 18.2012ZM13.917 16.7466L13.3076 16.3094L13.3076 16.3094L13.917 16.7466ZM2.71854 12.7552L1.96855 12.76V12.76L2.71854 12.7552ZM2.93053 11.9521L2.28061 11.5778H2.28061L2.93053 11.9521ZM11.3053 21.3431L11.3064 20.5931H11.3064L11.3053 21.3431ZM12.0933 21.1347L11.7216 20.4833L11.7216 20.4833L12.0933 21.1347ZM21.9652 12.3049L22.6983 12.4634L21.9652 12.3049ZM11.6973 2.03606L11.8589 2.76845L11.6973 2.03606ZM22.3552 10.6303C22.1511 10.2699 21.6934 10.1433 21.333 10.3475C20.9726 10.5516 20.846 11.0093 21.0502 11.3697L22.3552 10.6303ZM18.006 8.03006C18.2988 8.3231 18.7737 8.32334 19.0667 8.0306C19.3597 7.73786 19.36 7.26298 19.0672 6.96994L18.006 8.03006ZM9.26905 18.8989L5.15236 14.7781L4.09116 15.8382L8.20785 19.9591L9.26905 18.8989ZM17.3032 14.2922L15.3861 15.0125L15.9137 16.4167L17.8308 15.6964L17.3032 14.2922ZM9.03649 8.63979L9.73095 6.74438L8.32251 6.22834L7.62805 8.12375L9.03649 8.63979ZM6.04445 11.3965C6.75591 11.2003 7.29726 11.0625 7.73995 10.7438L6.86354 9.52646C6.6906 9.65097 6.46608 9.72428 5.64578 9.95044L6.04445 11.3965ZM7.62805 8.12375C7.3351 8.92332 7.24345 9.14153 7.10507 9.30391L8.24673 10.2768C8.60048 9.86175 8.78237 9.33337 9.03649 8.63979L7.62805 8.12375ZM7.73995 10.7438C7.92704 10.6091 8.09719 10.4523 8.24673 10.2768L7.10507 9.30391C7.03377 9.38757 6.95268 9.46229 6.86354 9.52646L7.73995 10.7438ZM15.3861 15.0125C14.697 15.2714 14.1717 15.4571 13.7601 15.8135L14.7421 16.9475C14.9029 16.8082 15.1193 16.7152 15.9137 16.4167L15.3861 15.0125ZM14.1038 18.4001C14.3291 17.5813 14.4022 17.3569 14.5263 17.1838L13.3076 16.3094C12.9903 16.7517 12.853 17.2919 12.6575 18.0022L14.1038 18.4001ZM13.7601 15.8135C13.5904 15.9605 13.4385 16.1269 13.3076 16.3094L14.5263 17.1838C14.5888 17.0968 14.6612 17.0175 14.7421 16.9475L13.7601 15.8135ZM5.15236 14.7781C4.50623 14.1313 4.06806 13.691 3.78374 13.3338C3.49842 12.9753 3.46896 12.8201 3.46852 12.7505L1.96855 12.76C1.97223 13.3422 2.26135 13.8297 2.6101 14.2679C2.95984 14.7073 3.47123 15.2176 4.09116 15.8382L5.15236 14.7781ZM5.64578 9.95044C4.80056 10.1835 4.10403 10.3743 3.58304 10.5835C3.06349 10.792 2.57124 11.0732 2.28061 11.5778L3.58045 12.3264C3.61507 12.2663 3.717 12.146 4.14187 11.9755C4.56531 11.8055 5.16345 11.6394 6.04445 11.3965L5.64578 9.95044ZM3.46852 12.7505C3.46758 12.6016 3.50623 12.4553 3.58045 12.3264L2.28061 11.5778C2.07362 11.9372 1.96593 12.3452 1.96855 12.76L3.46852 12.7505ZM8.20785 19.9591C8.83172 20.5836 9.34472 21.0987 9.78654 21.4506C10.2271 21.8015 10.718 22.0922 11.3042 22.0931L11.3064 20.5931C11.237 20.593 11.0815 20.5644 10.7211 20.2773C10.3619 19.9912 9.91931 19.5499 9.26905 18.8989L8.20785 19.9591ZM12.6575 18.0022C12.4133 18.8897 12.2463 19.4924 12.0752 19.9188C11.9034 20.3467 11.7822 20.4487 11.7216 20.4833L12.4651 21.7861C12.9741 21.4956 13.2573 21.0004 13.4672 20.4775C13.6777 19.9532 13.8695 19.2516 14.1038 18.4001L12.6575 18.0022ZM11.3042 22.0931C11.7113 22.0937 12.1115 21.9879 12.4651 21.7861L11.7216 20.4833C11.5951 20.5555 11.452 20.5933 11.3064 20.5931L11.3042 22.0931ZM17.8308 15.6964C19.1922 15.1849 20.2941 14.773 21.0771 14.3384C21.8719 13.8973 22.5084 13.3416 22.6983 12.4634L21.2322 12.1464C21.178 12.3968 21.0002 12.6655 20.3492 13.0268C19.6865 13.3946 18.7113 13.7632 17.3032 14.2922L17.8308 15.6964ZM16.52 4.42014C15.4841 3.3832 14.6481 2.54353 13.9246 2.00638C13.1909 1.46165 12.4175 1.10912 11.5357 1.30367L11.8589 2.76845C12.1086 2.71335 12.4278 2.7633 13.0305 3.21075C13.6434 3.66579 14.3877 4.40801 15.4588 5.48026L16.52 4.42014ZM9.73095 6.74438C10.2526 5.32075 10.6162 4.33403 10.9813 3.66315C11.3403 3.00338 11.6091 2.82357 11.8589 2.76845L11.5357 1.30367C10.6541 1.49819 10.1006 2.14332 9.6637 2.94618C9.23286 3.73793 8.82695 4.85154 8.32251 6.22834L9.73095 6.74438ZM21.0502 11.3697C21.2515 11.7251 21.2745 11.9507 21.2322 12.1464L22.6983 12.4634C22.8404 11.8064 22.6796 11.2027 22.3552 10.6303L21.0502 11.3697ZM15.4588 5.48026L18.006 8.03006L19.0672 6.96994L16.52 4.42014L15.4588 5.48026Z"
                                                    fill="#525252"></path>
                                                <path
                                                    d="M1.4694 21.4697C1.17666 21.7627 1.1769 22.2376 1.46994 22.5304C1.76298 22.8231 2.23786 22.8229 2.5306 22.5298L1.4694 21.4697ZM7.18383 17.8719C7.47657 17.5788 7.47633 17.1039 7.18329 16.8112C6.89024 16.5185 6.41537 16.5187 6.12263 16.8117L7.18383 17.8719ZM2.5306 22.5298L7.18383 17.8719L6.12263 16.8117L1.4694 21.4697L2.5306 22.5298Z"
                                                    fill="#525252"></path>
                                            </g>
                                        </svg>
                                        Pin
                                    </button>
                                </form>
                            @elseif($space->pinned == 1)
                                <form action="{{ route('space.unpin', ['userId' => $userId, 'spaceId' => $space->id]) }}" method="post" class="hs-dropdown-btn m-0">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-accent focus:outline-none focus:bg-gray-200">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M13.6315 8.22382C15.1616 9.7539 15.9266 10.5189 15.926 11.3483C15.9257 11.6192 15.8705 11.8873 15.7635 12.1362C15.4361 12.8982 14.4309 13.2983 12.4204 14.0985L12.2749 14.1564C11.7049 14.3832 11.4199 14.4967 11.19 14.6788C11.0156 14.817 10.8655 14.9833 10.7458 15.1709C10.5881 15.4182 10.5044 15.7133 10.3369 16.3034C10.0771 17.2185 9.94727 17.6761 9.67033 17.8791C9.46451 18.03 9.20879 18.0966 8.95553 18.065C8.61475 18.0226 8.27843 17.6863 7.60579 17.0137L4.47529 13.8832C3.80265 13.2105 3.46633 12.8742 3.42392 12.5334C3.3924 12.2802 3.4589 12.0244 3.60981 11.8186C3.81287 11.5417 4.27042 11.4118 5.18554 11.1521C5.77568 10.9846 6.07076 10.9009 6.31804 10.7431C6.50565 10.6235 6.67197 10.4733 6.81015 10.2989C6.9923 10.069 7.10572 9.78403 7.33256 9.21406L7.39047 9.06855C8.19063 7.05807 8.59071 6.05283 9.35273 5.72542C9.60165 5.61847 9.86971 5.56321 10.1406 5.56299C10.5028 5.5627 10.8526 5.70839 11.2593 6.00002"
                                                    stroke="#5e5e5e" stroke-width="1.5"
                                                    stroke-linecap="round"></path>
                                                <path d="M3.34679 18.142L6.04053 15.4482" stroke="#5e5e5e"
                                                      stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M22 8H17" stroke="#5e5e5e" stroke-width="1.5"
                                                      stroke-linecap="round"></path>
                                                <path d="M22 12.5H18" stroke="#5e5e5e" stroke-width="1.5"
                                                      stroke-linecap="round"></path>
                                                <path d="M22 17H21M13 17H17" stroke="#5e5e5e" stroke-width="1.5"
                                                      stroke-linecap="round"></path>
                                            </g>
                                        </svg>
                                        Unpin
                                    </button>
                                </form>
                            @endif
                            <hr class="border-gray-200">
                            <a href="{{ route('space.edit', ['userId' => $userId, 'spaceId' => $space->id]) }}" class="hs-dropdown-btn flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-accent focus:outline-none focus:bg-gray-200">
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
                            <form action="{{ route('space.destroy', ['spaceId' => $space->id, 'userId' => $userId]) }}" method="post" class="hs-dropdown-btn m-0">
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
                    </div>
                    <div id="space-card" data-space-card data-user-id="{{ $userId }}" data-space-id="{{ $space->id }}" class="space-y-6 md:space-y-4">
                        <!-- description -->
                        <div>
                            <p class="text-text open-sans-regular text-xs md:text-sm text-justify indent-4 whitespace-normal">
                                @if(!empty($searchTerm))
                                    {!! str_ireplace([$searchTermLower, $searchTermUpper, $searchTermCapitalized], '<span class="px-0.5 bg-yellow-300 rounded">'.$searchTerm.'</span>', $space->description) !!}
                                @else
                                    {{ $space->description }}
                                @endif
                            </p>
                        </div>
                        <!-- tags -->
                        <div class="flex justify-start items-center flex-wrap gap-1">
                            @foreach($space->tags as $tag)
                                <x-tag :routeName="'space.searchTag'" :routeParam="['userId' => $userId, 'tagId' => $tag->id]">
                                    {{ $tag->name }}
                                </x-tag>
                            @endforeach
                        </div>
                        <div class="flex flex-col sm:flex-row sm:justify-between items-start sm:items-center gap-2 sm:gap-0">
                            <!-- members -->
                            <div class="flex -space-x-2">
                                <img class="inline-block size-8 rounded-full ring-2 ring-white"
                                     src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                                     alt="Image Description">
                                <img class="inline-block size-8 rounded-full ring-2 ring-white"
                                     src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                                     alt="Image Description">
                                <img class="inline-block size-8 rounded-full ring-2 ring-white"
                                     src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80"
                                     alt="Image Description">
                            </div>
                            <div class="flex flex-row items-center space-x-4">
                                @if($space->pinned == 1)
                                    <span class="py-1 px-2 text-primary open-sans-medium text-xs bg-background border-2 border-primary rounded-full">
                                        Pinned
                                    </span>
                                @endif
                                <p class="open-sans-regular text-xs">Last
                                    update {{ $space->updated_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </x-container>
            @endforeach
        </x-slot>
    </x-layouts.app>
@else
    <!-- Redirect to log in-->
    {{ redirect()->route('user.login') }}
@endif
