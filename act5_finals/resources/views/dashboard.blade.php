<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f6fa;
    }

    nav {
        background-color: #1d3b83;
    }

    .nav-container {
        max-width: 1200px;
        margin: auto;
        padding: 0 20px;
        height: 64px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .logo-section a {
        text-decoration: none;
        display: flex;
        align-items: center;
        color: white;
        font-weight: 600;
        font-size: 18px;
    }

    .nav-links {
        display: flex;
        gap: 24px;
    }

    .nav-links a {
        color: white;
        text-decoration: none;
        font-weight: 500;
        font-size: 15px;
    }

    .nav-links a:hover {
        text-decoration: underline;
    }

    .user-section {
        display: flex;
        align-items: center;
        position: relative;
    }

    .user-button {
        background-color: white;
        border: none;
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 14px;
        cursor: pointer;
        font-weight: 500;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        top: 110%;
        right: 0;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 6px;
        min-width: 160px;
        z-index: 10;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .dropdown-content a,
    .dropdown-content button {
        display: block;
        width: 100%;
        padding: 10px 16px;
        font-size: 14px;
        color: #333;
        background: none;
        border: none;
        text-align: left;
        text-decoration: none;
        cursor: pointer;
    }

    .dropdown-content a:hover,
    .dropdown-content button:hover {
        background-color: #f0f0f0;
    }

    .user-dropdown:hover .dropdown-content {
        display: block;
    }

    .content-container {
        max-width: 600px;
        margin: 50px auto;
        background: white;
        border-radius: 8px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .welcome-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .welcome-subtext {
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
    }

    .logout-button {
        background-color: #e3342f;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    .logout-button:hover {
        background-color: #cc1f1a;
    }

</style>

<body>
    <nav>
        <div class="nav-container">
            <div class="logo-section">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo style="height: 36px; width: auto;" />
                </a>
                <div class="nav-links">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">Products</x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Blogs</x-nav-link>
                </div>
            </div>

            <div class="user-section">
                @if(isset($user))
                    <div class="user-dropdown">
                        <button class="user-button">{{ $user->name }}</button>
                        <div class="dropdown-content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="content-container">
        <div class="welcome-title">
            Hello, {{ $user->name }} 👋
        </div>
        <div class="welcome-subtext">
            You're successfully logged in.
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
