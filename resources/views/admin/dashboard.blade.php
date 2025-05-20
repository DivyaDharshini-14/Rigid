<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">


        <div class="max-w-7xl mx-auto p-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Admin Dashboard</h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Example card -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-white">Users</h2>
                        <p class="text-gray-600 dark:text-gray-300">Manage users, roles, and permissions.</p>
                    </div>

                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-white">Reports</h2>
                        <p class="text-gray-600 dark:text-gray-300">View system reports and analytics.</p>
                    </div>

                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-white">Settings</h2>
                        <p class="text-gray-600 dark:text-gray-300">Configure system-wide settings.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
