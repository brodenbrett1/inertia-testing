import type { PageProps as _PageProps } from '@inertiajs/core';

declare module '@inertiajs/core' {
    interface PageProps extends _PageProps {
        /** The App name. */
        name?: string
        time?: string
        /** The name of the current route. */
        route_name?: string | null
        /** The HTTP referrer, if it is an internal non-circular URL. */
        back_link?: string | null
        flash?: {
            success?: string | null
            error?: string | null
        }
        sidebarOpen?: boolean
    }
}
