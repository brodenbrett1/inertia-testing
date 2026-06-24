<script setup>
import { usePage } from '@inertiajs/vue3';
import { inject } from 'vue';
const props = defineProps({ name: String });
const message = usePage().props.errors[props.name] ?? '';
</script>
<template>
    <p v-if="message" class="label text-error">{{ message }}</p>
</template>
