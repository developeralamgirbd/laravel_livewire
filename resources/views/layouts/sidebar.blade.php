<div>
    <ul>
        <li class="list-none mb-1">
            <a href="{{ route('admin.dashboard') }}" class=" {{ request()->routeIs('admin.dashboard') ? 'text-gray-50 bg-gray-500 bg-opacity-20' : '' }} text-gray-200 hover:text-gray-50 block hover:bg-gray-500 hover:bg-opacity-20 p-2 hover:transition-all hover:duration-300">Dashboard
            </a>
        </li>
        <li class="list-none mb-1">
            <a href="{{ route('admin.users') }}" class=" {{ request()->routeIs('admin.users') ? 'text-gray-50 bg-gray-500 bg-opacity-20' : '' }} text-gray-200 hover:text-gray-50 block hover:bg-gray-500 hover:bg-opacity-20 p-2 hover:transition-all hover:duration-300">Users
            </a>
        </li>
    </ul>
</div>
