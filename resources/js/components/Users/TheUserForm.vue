<script setup>
import { Form } from '@inertiajs/vue3';
import { UserIcon } from '@lucide/vue';
defineProps({ user: Object });
</script>

<template>
    <Form v-slot="{errors, validate}" method="post" :action="route('users.store')" :options="{preserveScroll: true }">
        <div class="space-y-4">
            <div class="space-y-1">
                <label class="label" for="name">Name</label>

                <div class="input w-full" :class="{'border-error': errors.name}">
                    <UserIcon class="w-4" />

                    <input type="text"
                           name="name"
                           :defaultValue="user?.name"
                           placeholder="John Doe"
                           @change="() => validate('name')" />
                </div>

                <div v-if="errors.name" class="text-xs text-error">{{ errors.name }}</div>
                <div class="text-xs text-base-content/50">Enter your name</div>
            </div>

            <div class="space-y-1">
                <label class="label" for="email">Email Address</label>

                <div class="input w-full" :class="{'border-error': errors.email}">
                    <UserIcon class="w-4" />

                    <input type="email"
                           name="email"
                           :defaultValue="user?.email"
                           placeholder="email@example.com"
                           @change="validate('email')" />
                </div>

                <div v-if="errors.email" class="text-xs text-error">{{ errors.email }}</div>
                <div class="text-xs text-base-content/50">Enter your email</div>
            </div>

            <div class="space-y-1">
                <label class="label" for="password">Password</label>

                <div class="input w-full" :class="{'border-error': errors.password}">
                    <UserIcon class="w-4" />

                    <input type="password"
                           name="password"
                           :defaultValue="user?.password"
                           placeholder="••••••••"
                           @change="validate('password')" />
                </div>

                <div v-if="errors.password" class="text-xs text-error">{{ errors.password }}</div>
                <div class="text-xs text-base-content/50">Enter your password</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary block mt-6 ml-auto">Create User</button>
    </Form>
</template>
