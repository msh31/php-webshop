<?php
require_once 'config.php';

checkSessionTimeout();

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
}

if (!isLoggedIn()) {
    redirect("login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body class="bg-stone-700">
<div id="alertPlaceholder"></div>

<!-- Sidebar -->
<div class="fixed inset-y-0 left-0 w-64 bg-stone-800 shadow-lg transition-all duration-300">
    <div class="flex items-center justify-center h-16 border-b border-stone-700">
        <h1 class="text-xl font-medium text-stone-100">Dashboard</h1>
    </div>
    <nav class="mt-8">
        <ul class="space-y-2 px-4">
            <li>
                <a href="#" class="flex items-center px-4 py-3 text-stone-100 bg-stone-700 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-3 text-stone-400 hover:bg-stone-600 rounded-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    Users
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-3 text-stone-400 hover:bg-stone-600 rounded-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                    Projects
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-3 text-stone-400 hover:bg-stone-600 rounded-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
                    </svg>
                    Messages
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-3 text-stone-400 hover:bg-stone-600 rounded-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>
                    Settings
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Main Content -->
<div class="ml-64 p-8">
    <header class="flex justify-between items-center mb-8">
        <div>
            <p class="text-2xl font-medium text-stone-100">
                Welcome back,
                <strong>
                    <?php echo $_SESSION['username']; ?>
                </strong>
            </p>

            <p class="text-stone-400">Here's what's happening today</p>
        </div>
        <div class="flex items-center space-x-4">
            <button class="px-4 py-2 bg-stone-800 text-stone-300 rounded-md hover:bg-stone-600 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                </svg>
            </button>
            <div class="relative">
                <img class="h-10 w-10 rounded-full border-2 border-custom-orange" src="https://i.imgur.com/6JpGBXa.png" alt="User avatar">
            </div>
        </div>
    </header>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Overview Card -->
        <div class="bg-stone-800 rounded-lg shadow-md p-6 border border-stone-700">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-lg font-medium text-stone-100">Overview</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        Today
                    </span>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-stone-400">Total Views</span>
                    <span class="font-medium text-stone-200">8,624</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-stone-400">Unique Visitors</span>
                    <span class="font-medium text-stone-200">1,429</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-stone-400">Bounce Rate</span>
                    <span class="font-medium text-stone-200">42.8%</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-stone-400">Avg. Session</span>
                    <span class="font-medium text-stone-200">2m 14s</span>
                </div>
            </div>
        </div>

        <!-- Engagement Card -->
        <div class="bg-stone-800 rounded-lg shadow-md p-6 border border-stone-700">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-lg font-medium text-stone-100">Engagement</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                        +5.2%
                    </span>
            </div>
            <div class="h-40 flex items-end justify-between">
                <div class="w-8 bg-stone-700 rounded-t-md h-20"></div>
                <div class="w-8 bg-stone-700 rounded-t-md h-24"></div>
                <div class="w-8 bg-stone-700 rounded-t-md h-16"></div>
                <div class="w-8 bg-stone-700 rounded-t-md h-32"></div>
                <div class="w-8 bg-stone-700 rounded-t-md h-28"></div>
                <div class="w-8 bg-indigo-500 rounded-t-md h-36"></div>
                <div class="w-8 bg-stone-700 rounded-t-md h-20"></div>
            </div>
        </div>

        <!-- Tasks Card -->
        <div class="bg-stone-800 rounded-lg shadow-md p-6 border border-stone-700">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-lg font-medium text-stone-100">Recent Tasks</h3>
                <button class="text-stone-400 hover:text-stone-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
            </div>
            <div class="space-y-3">
                <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-indigo-500 focus:ring-indigo-400 rounded border-stone-600">
                    <span class="ml-3 text-stone-300">Finalize project proposal</span>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-indigo-500 focus:ring-indigo-400 rounded border-stone-600" checked>
                    <span class="ml-3 text-stone-500 line-through">Client meeting preparation</span>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-indigo-500 focus:ring-indigo-400 rounded border-stone-600">
                    <span class="ml-3 text-stone-300">Update documentation</span>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-indigo-500 focus:ring-indigo-400 rounded border-stone-600">
                    <span class="ml-3 text-stone-300">Review feedback from team</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-stone-800 rounded-lg shadow-md p-6 border border-stone-700 mb-8">
        <div class="flex justify-between items-start mb-6">
            <h3 class="text-lg font-medium text-stone-100">Recent Activity</h3>
            <button class="text-stone-400 hover:text-stone-200 px-3 py-1 border border-stone-600 rounded-md">
                View All
            </button>
        </div>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="h-10 w-10 rounded-full bg-teal-500 flex items-center justify-center text-white flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-stone-200">New document created: <span class="font-medium">Annual Report</span></p>
                    <p class="text-stone-500 text-sm">30 minutes ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="h-10 w-10 rounded-full bg-indigo-500 flex items-center justify-center text-white flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-stone-200">Team meeting scheduled for <span class="font-medium">2:00 PM</span></p>
                    <p class="text-stone-500 text-sm">1 hour ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="h-10 w-10 rounded-full bg-amber-500 flex items-center justify-center text-white flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-stone-200">New comment on <span class="font-medium">Project Zeus</span></p>
                    <p class="text-stone-500 text-sm">3 hours ago</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-8 pt-8 border-t border-stone-700 flex justify-between items-center text-custom-gray text-sm">
        <div>
            &copy; 2025 Dashboard. All rights reserved.
        </div>
        <div class="flex space-x-4">
            <a href="#" class="hover:text-stone-300">Privacy</a>
            <a href="#" class="hover:text-stone-300">Terms</a>
            <a href="#" class="hover:text-stone-300">Contact</a>
        </div>
    </footer>
</div>
</body>
</html>