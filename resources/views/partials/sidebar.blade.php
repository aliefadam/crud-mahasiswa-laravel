<aside id="default-sidebar"
    class="fixed top-[70px] left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-indigo-500">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('mahasiswa.index') }}"
                    class="flex items-center p-3 text-gray-900 rounded-lg group {{ request()->is('/') ? 'bg-gray-100' : '' }} hover:bg-gray-50 group">
                    <i
                        class=" group-hover:text-indigo-500 {{ request()->is('/') ? 'text-indigo-500' : 'text-white' }} fa-regular fa-users"></i>
                    <span
                        class=" group-hover:text-indigo-500 ms-3 {{ request()->is('/') ? 'text-indigo-500' : 'text-white' }}">Data
                        Mahasiswa</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mahasiswa.create') }}"
                    class="flex items-center p-3 text-gray-900 rounded-lg group {{ request()->is('mahasiswa/create') ? 'bg-gray-100' : '' }} hover:bg-gray-50 group">
                    <i
                        class=" group-hover:text-indigo-500 {{ request()->is('mahasiswa/create') ? 'text-indigo-500' : 'text-white' }} fa-regular fa-user-plus"></i>
                    <span
                        class=" group-hover:text-indigo-500 ms-3 {{ request()->is('mahasiswa/create') ? 'text-indigo-500' : 'text-white' }}">Tambah
                        Mahasiswa</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
