<script setup>
import { useForm } from '@inertiajs/vue3';
import { Lock, Mail, User as UserIcon } from '@lucide/vue';
import { provide } from 'vue';
import BackLink from '@/components/Shared/BackLink.vue';
import ErrorLabel from '@/components/Shared/Forms/ErrorLabel.vue';
import FieldLabel from '@/components/Shared/Forms/FieldLabel.vue';

const { user } = defineProps({ user: Object });

const form = useForm({
    name: user?.name ?? '',
    email: user?.email ?? '',
    password: '',
});

provide('form', form);

const url = route(user ? 'users.update' : 'users.store', user);
const title = user ? 'Edit User' : 'Create User';

const submit = () => user ? form.patch(url) : form.post(url);
</script>

<template>
    <div class="max-w-xl m-auto">
        <Head :title />
        <h1 class="text-5xl font-bold mb-6">{{ title }}</h1>
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
                            </div>

                            <ErrorLabel name="name" />
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
                        </div>

                        <ErrorLabel name="email" />
                    </div>

                    <div v-if="!user" class="form-control">
                        <FieldLabel req="true">Password</FieldLabel>

                        <div class="input input-bordered w-full">
                            <Lock class="h-4 w-4 text-base-content/50" />

                            <input v-model="form.password"
                                   type="password"
                                   :placeholder="user ? 'Current Password' : '••••••••'"
                                   autocomplete="new-password" />
                        </div>

                        <ErrorLabel name="password" />
                    </div>

                    <button type="submit" class="btn btn-primary w-full" :class="{'btn-disabled': form.processing}" :disabled="form.processing">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
