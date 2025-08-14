<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 w-64 h-full pt-16 transition-transform duration-300 ease-in-out transform -translate-x-full bg-white border-r border-gray-200 lg:flex lg:translate-x-0"
    aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y">
                <ul class="pb-2 space-y-2">
                    {{-- Dashboard --}}
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="text-base text-primary font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group {{ Request::is('dashboard') ? 'bg-lightPrimary' : '' }} ">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    {{-- Users --}}
                    <li>
                        <a href="{{ route('admin.users') }}"
                            class="flex items-center p-2 text-base font-normal rounded-lg text-primary hover:bg-gray-100 group {{ Request::is('admin/users') ? 'bg-lightPrimary' : '' }}">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>

                    {{-- Supplier --}}
                    <li>
                        <a href="{{ route('admin.suppliers') }}"
                            class="flex items-center p-2 text-base font-normal rounded-lg text-primary hover:bg-gray-100 group {{ Request::is('admin/suppliers') ? 'bg-lightPrimary' : '' }}">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Suppliers</span>
                        </a>
                    </li>

                    {{-- Products --}}
                    <li>
                        <a href="{{ route('admin.products') }}"
                            class="flex items-center p-2 text-base font-normal rounded-lg text-primary hover:bg-gray-100 group {{ Request::is('admin/products') ? 'bg-lightPrimary' : '' }}">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Produk</span>
                        </a>
                    </li>

                    {{-- orders --}}
                    <li>
                        <a href="{{ route('admin.order-list') }}"
                            class="flex items-center p-2 text-base font-normal rounded-lg text-primary hover:bg-gray-100 group {{ Request::is('admin/orders') ? 'bg-lightPrimary' : '' }}">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Order Transaksi</span>
                        </a>
                    </li>

                    {{-- transaksi --}}
                    <li>
                        <a href="{{ route('admin.transaksi-list') }}"
                            class="flex items-center p-2 text-base font-normal rounded-lg text-primary hover:bg-gray-100 group {{ Request::is('admin/transaksis') ? 'bg-lightPrimary' : '' }}">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">History Transaksi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
