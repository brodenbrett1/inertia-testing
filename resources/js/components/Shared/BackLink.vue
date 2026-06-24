<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { ArrowLeft } from '@lucide/vue';
import { computed } from 'vue';

const props = defineProps({
    /** The default URL if there is no valid referrer. */
    default: { type: String },
});

const href = computed(() => {
    const back = usePage().props.back_link as string;

    return back || props.default || route('home');
});
</script>

<template>
    <Link :href>
        <slot>
            <span class="inline-flex gap-x-2">
                <ArrowLeft class="w-4" /> Back
            </span>
        </slot>
    </Link>
</template>
