<script setup>
import BackLink from '@/components/Shared/BackLink.vue';
import TheUserForm from '../../components/Users/TheUserForm.vue';

const { user } = defineProps({ user: Object });

const title = user ? 'Edit User' : 'Create User';
</script>

<template>
    <div class="max-w-xl m-auto">
        <Head :title />
        <h1 class="text-5xl font-bold mb-6">{{ title }}</h1>
        <BackLink class="inline-block mb-2" />

        <div class="card bg-base-100 shadow-md mx-auto">
            <div class="card-body gap-6">
                <TheUserForm :user />
            </div>
        </div>
    </div>
</template>
