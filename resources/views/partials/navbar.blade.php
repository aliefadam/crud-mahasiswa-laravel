<nav
    class="z-[99] px-14 h-[70px] fixed w-full top-0 left-0 bg-gradient-to-r from-indigo-700 to-indigo-500 flex justify-between items-center">
    <div class="">
        <h1 class="poppins-bold text-white text-xl">CRUD MAHASISWA</h1>
    </div>
    <div id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class="cursor-pointer flex gap-2 items-center leading-none">
        <span class="text-white poppins-medium">{{ auth()->user()->name }}</span>
        <img class="w-[40px]" src="/imgs/profile.png" alt="">
    </div>
</nav>

<!-- Dropdown menu -->
<div id="dropdown" class="z-[999] hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700">
    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="{{ route('logout') }}"
                class="flex items-center justify-center gap-2 px-4 py-4 rounded-lg text-red-600 poppins-semibold hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <i class="fa-regular fa-left-from-bracket"></i> Keluar
            </a>
        </li>
    </ul>
</div>
