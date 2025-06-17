<aside id="app-menu"
    class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-sidenav min-w-sidenav bg-slate-800 overflow-y-auto -translate-x-full transform transition-all duration-200 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">

    <div class="flex flex-col h-full">
        <!-- Sidenav Logo -->
        <div class="sticky top-0 flex h-topbar items-center justify-center px-6">
            <a href="index.html">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="flex h-5">
            </a>
        </div>

        <div class="p-4 h-[calc(100%-theme('spacing.topbar'))] flex-grow" data-simplebar>
            <!-- Menu -->
            <ul class="admin-menu hs-accordion-group flex w-full flex-col gap-1">
                <li class="px-3 py-2 text-xs uppercase font-medium text-default-500">Gestion</li>




                <li class="menu-item">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                        href="app-calendar.html">
                        <i class="i-lucide-calendar size-5"></i>
                        Tableau de bord
                    </a>
                </li>

                <li class="menu-item">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                        href="{{ route('orders.index') }}">
                        <i class="i-lucide-image size-5"></i>
                        Commandes
                    </a>
                </li>

                <li class="menu-item">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                    href="{{ route('clients.index') }}">
                    <i class="i-lucide-user-circle size-5"></i>
                        Clients
                    </a>
                </li>

            </ul>
        </div>

    </div>
</aside>
