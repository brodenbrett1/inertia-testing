import type { PageProps as _PageProps } from '@inertiajs/core';

declare module '@inertiajs/core' {
    interface PageProps extends _PageProps {
        /** The App name. */
        name?: string
        time?: string
        /** The name of the current route. */
        routeName?: string | null
        /** The HTTP referrer, if it is an internal non-circular URL. */
        back_link?: string | null
        sidebarOpen?: boolean
    }
}
