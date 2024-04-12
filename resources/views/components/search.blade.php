 <!-- SearchBox -->
 @php
     $userId = Auth::id();
 @endphp

 @if($userId)
     <form action="{{ route('space.search', ['userId' => $userId]) }}" method="get" class="flex flex-col md:flex-row justify-center gap-2">
         <div class="relative">
             <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                 <svg class="flex-shrink-0 size-4 text-secondary" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <circle cx="11" cy="11" r="8"></circle>
                     <path d="m21 21-4.3-4.3"></path>
                 </svg>
             </div>
             <input type="text" name="search" placeholder="Search for a Space" class="w-full md:w-64 py-3 ps-10 pe-4 block border-secondary rounded-md text-sm focus:border-accent focus:ring-accent disabled:opacity-50 disabled:pointer-events-none">
         </div>
         <button type="submit" class="py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Search</button>
     </form>
 @else
     <!-- Redirect to login-->
     {{ redirect()->route('user.login') }}
 @endif
