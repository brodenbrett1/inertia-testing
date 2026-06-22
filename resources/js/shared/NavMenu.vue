<template>
    <div class="navbar bg-base-200">
        <div class="navbar-start">
            <Link href="/">
                <img src="/assets/logo.svg" class="h-full" alt="{{ $page.props.name }}" />
            </Link>
        </div>

        <div class="navbar-center">
            {{ $page.props.time }}
        </div>

        <div class="navbar-end">
            <ul class="menu menu-horizontal px-1 space-x-2">
                <li>
                    <NavLink route="home">Home</NavLink>
                </li>

                <li>
                    <NavLink route="users">Users</NavLink>
                </li>

                <li>
                    <NavLink route="settings">Settings</NavLink>
                </li>

                <li>
                    <NavLink route="logout"
                             href="/logout"
                             method="post"
                             as="button"
                             :data="{foo: 'bar'}">
                        Logout
                    </NavLink>
                </li>
            </ul>
        </div>
    </div>
</template>
