<script setup lang="ts">
import NavMenu from './NavMenu.vue';
import ViewContent from './ViewContent.vue';

</script>

<template>
    <NavMenu />

    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
