<script setup>
import BackLink from '@/components/Shared/BackLink.vue';

defineProps({ user: Object });
</script>

<template>
    <div>
        <Head title="User Details" />
        <h1 class="text-5xl font-bold mb-6">User Details</h1>
        <BackLink class="inline-block mb-2" />

        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table">
                <tbody>
                    <tr>
                        <th class="w-30">Name</th>
                        <td>{{ user.name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ user.email }}</td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{ user.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
