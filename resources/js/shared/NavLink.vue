<script setup lang="ts">
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { route as getRoute } from '../../../vendor/tightenco/ziggy';

const { route } = defineProps({
    /** The name of the route to request. */
    route: String,
});
const page = usePage();
const href = computed(() => getRoute(route ?? '') || '#');
const isActive = computed(() => page.props.routeName === route);
</script>

<template>
    <Link :class="{'bg-primary': isActive}" :href>
        <slot></slot>
    </Link>
</template>
