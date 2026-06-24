<script setup lang="ts">
defineProps({ users: Object });
</script>

<template>
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="w-60">Email</th>
                    <th class="w-80">Created</th>
                    <th class="w-10"></th>
                </tr>
            </thead>

            <tbody>
                <!-- row 1 -->
                <tr v-for="user in users?.data" :key="user.id">
                    <td>
                        <Link class="link link-hover link-primary" :href="route('users.show', user.id)"><b>{{ user.name }}</b></Link>
                        <code class="block text-xs text-base-content/50">{{ user.id }}</code>
                    </td>

                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                    <td><Link class="btn" :href="route('users.edit', user.id)">Edit</Link></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
