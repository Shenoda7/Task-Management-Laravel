<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskFlow - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style type="text/tailwindcss">
        .btn-primary {
            @apply bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md;
        }
        
        .btn-secondary {
            @apply bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md;
        }
        
        .btn-danger {
            @apply bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md;
        }

        .btn-success {
            @apply bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md;
        }

        .link {
            @apply font-medium text-blue-600 hover:text-blue-800 underline decoration-blue-500 transition-colors duration-200;
        }

        label {
            @apply block text-sm font-medium text-gray-700 mb-2;
        }

        input, textarea {
            @apply shadow-sm appearance-none border border-gray-300 w-full py-3 px-4 text-gray-900 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200;
        }

        .error {
            @apply text-red-600 text-sm mt-1;
        }

        .card {
            @apply bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200;
        }

        .task-item {
            @apply bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-all duration-200 hover:border-blue-300;
        }

        .status-badge {
            @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium;
        }

        .status-completed {
            @apply bg-green-100 text-green-800;
        }

        .status-pending {
            @apply bg-yellow-100 text-yellow-800;
        }

        /* Pagination Styles */
        .pagination {
            @apply flex items-center justify-center;
        }

        .pagination .page-item {
            @apply inline-flex items-center mx-1;
        }

        .pagination .page-link {
            @apply px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-700 transition-colors duration-200;
        }

        .pagination .page-item.active .page-link {
            @apply bg-blue-600 text-white border-blue-600;
        }

        .pagination .page-item.disabled .page-link {
            @apply text-gray-300 cursor-not-allowed hover:bg-white hover:text-gray-300;
        }

        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            @apply bg-gray-100;
        }

        ::-webkit-scrollbar-thumb {
            @apply bg-gray-300 rounded-full;
        }

        ::-webkit-scrollbar-thumb:hover {
            @apply bg-gray-400;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <header class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-600 p-3 rounded-lg">
                        <i class="fas fa-tasks text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">TaskFlow</h1>
                        <p class="text-gray-600">Organize your life, one task at a time</p>
                    </div>
                </div>
                <nav class="flex space-x-4">
                    <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="{{ route('tasks.create') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>New Task
                    </a>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <div x-data="{ flash: true }">
                @if(session()->has('success'))
                    <div x-show="flash"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="relative mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800 shadow-sm"
                         role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-600"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                        <button @click="flash = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <i class="fas fa-times text-green-600 hover:text-green-800 transition-colors duration-200"></i>
                        </button>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-12 pt-8 border-t border-gray-200">
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; 2024 TaskFlow. Built with Laravel & Tailwind CSS.</p>
            </div>
        </footer>
    </div>
</body>
</html>
