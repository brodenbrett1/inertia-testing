<script setup>
import { router } from '@inertiajs/vue3';
import { Lock, Mail, User as UserIcon } from '@lucide/vue';
import { reactive } from 'vue';
import BackLink from '@/components/Shared/BackLink.vue';
import ErrorLabel from '@/components/Shared/Forms/ErrorLabel.vue';
import FieldLabel from '@/components/Shared/Forms/FieldLabel.vue';

const { user } = defineProps({ user: Object });

const form = reactive({
    name: user?.name ?? '',
    email: user?.email ?? '',
    password: '',
});

function submit() {
    router.visit(
        route(user ? 'users.update' : 'users.store', user),
        {
            method: user ? 'patch' : 'post',
            data: form,
        });
}
</script>

<template>
    <div class="max-w-xl m-auto">
        <Head :title="user ? 'Edit User' : 'Create User'" />
        <h1 class="text-5xl font-bold mb-6">{{ user ? 'Edit User' : 'Create User' }}</h1>
        <BackLink class="inline-block mb-2" />

        <div class="card bg-base-100 shadow-md mx-auto">
            <div class="card-body gap-6">
                <form class="space-y-4" @submit.prevent="submit">
                    <div class="form-control">
                        <FieldLabel req="true">Username</FieldLabel>

                        <div class="input-group">
                            <div class="input input-bordered w-full">
                                <UserIcon class="h-4 w-4 text-base-content/50" />

                                <input v-model="form.name"
                                       type="text"
                                       placeholder="John Doe"
                                       autocomplete="name" />

                                <ErrorLabel name="name" />
                            </div>
                        </div>
                    </div>

                    <div class="form-control">
                        <FieldLabel req="true">Email</FieldLabel>

                        <div class="input input-bordered w-full">
                            <Mail class="h-4 w-4 text-base-content/50" />

                            <input v-model="form.email"
                                   type="email"
                                   placeholder="example@email.com"
                                   autocomplete="email" />

                            <ErrorLabel name="email" />
                        </div>
                    </div>

                    <div v-if="!user" class="form-control">
                        <FieldLabel req="true">Password</FieldLabel>

                        <div class="input input-bordered w-full">
                            <Lock class="h-4 w-4 text-base-content/50" />

                            <input v-model="form.password"
                                   type="password"
                                   :placeholder="user ? 'Current Password' : '••••••••'"
                                   autocomplete="new-password" />

                            <ErrorLabel name="password" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
