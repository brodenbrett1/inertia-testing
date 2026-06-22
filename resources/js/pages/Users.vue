<script setup>
import { usePagination } from '@/compostables/usePagination';

const props = defineProps({ users: Object });

const paginator = usePagination(props.users);

const links = paginator.links;

</script>
<template>
    <Head title="Users" />
    <h1 class="text-5xl font-bold">Users</h1>
    <p class="py-6">Explore your application with a modern navbar design powered by daisyUI.</p>

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>
                <!-- row 1 -->
                <tr v-for="user in paginator" :key="user.id">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="w-full flex mt-4 justify-center">
        <div class="join">
            <Component :is="link.url ? 'Link' : 'span'"
                       v-for="link in links"
                       :key="link.label"
                       :href="link.url"
                       preserve-scroll
                       class="join-item btn"
                       :class="{ 'btn-disabled text-gray-500': ! link.url, 'btn-primary' : link.active }"
                       v-html="link.label" />
        </div>
    </div>
</template>
