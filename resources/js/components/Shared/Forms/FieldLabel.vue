<script setup>
const props = defineProps({ req: Boolean });
</script>
<template>
    <div class="inline-flex gap-x-2">
        <label class="label">
            <slot></slot>
        </label>

        <span v-if="req" class="text-error text-sm">*</span>
    </div>
</template>
