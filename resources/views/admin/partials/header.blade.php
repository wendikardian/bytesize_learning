<div class="navbar bg-base-100">
  <div class="flex-1 text-xl font-semibold">
    <div class="flex justify-end md:hidden button-sidebar mr-2">
      <button id="mobile-menu-button" class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
    <p class="text-orange-400">{{ $title }}</p>
  </div>
  <div class="flex-none p-2 bg-white rounded-2xl drop-shadow-lg bar-profile-header">
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="flex justify-items-start btn btn-ghost normal-case text-left w-56 p-0 font-light">
        <div class="flex-none mr-2"><img class="items-start object-cover h-10 w-10 rounded-lg" src="{{ auth()->user()->image ? auth()->user()->image : '/res/img/user-default.png' }}" alt=""></div>
        <div class="grow text-gray-600">
          <p class="font-semibold mb-1">{{ auth()->user()->name }}</p>
        </div>
      </label>
      <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52" style="z-index: 200;">
        <li>
          <form action="/keluar" method="POST">
            @csrf
            <button type="submit" class="">Sign Out</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>