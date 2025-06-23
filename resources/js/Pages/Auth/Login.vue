<template>
    <GuestLayout>
        <Head title="Secure Access - ISAFP" />

        <!-- Security Classification Banner -->
        <div class="bg-red-600 text-white text-center py-2 text-xs font-bold tracking-military">
            CLASSIFICATION: SECRET//AUTHORIZED PERSONNEL ONLY
        </div>

        <!-- Military Login Container -->
        <div class="flex min-h-screen flex-col items-center bg-gradient-to-br from-tactical-black to-navy-command pt-6 sm:justify-center sm:pt-0">
            <!-- ISAFP Logo and Header -->
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <div class="bg-honor-gold rounded-full p-6 shadow-2xl mx-auto mb-6 w-24 h-24 flex items-center justify-center">
                        <span class="text-3xl font-bold text-navy-command">IS</span>
                    </div>
                    <h1 class="text-2xl font-bold text-white mb-2 tracking-military">SECURE ACCESS PORTAL</h1>
                    <div class="text-honor-gold text-sm tracking-military font-semibold">
                        INTELLIGENCE SERVICE AFP
                    </div>
                    <div class="text-gray-300 text-xs tracking-military mt-2">
                        HONOR • SERVICE • PATRIOTISM
                    </div>
                </div>
            </div>

            <!-- Login Form -->
            <div class="w-full overflow-hidden bg-white px-6 py-8 shadow-2xl sm:max-w-md sm:rounded-lg border-t-4 border-honor-gold">
                <!-- Security Notice -->
                <div class="bg-tactical-black text-white p-4 rounded-lg mb-6 text-center">
                    <div class="text-honor-gold font-bold text-sm tracking-military mb-2">
                        RESTRICTED ACCESS
                    </div>
                    <div class="text-xs text-gray-300">
                        Authorized Personnel Only • All Access Monitored
                    </div>
                </div>

                <!-- Status Message -->
                <div v-if="status" class="mb-4 text-sm font-medium text-green-600 bg-green-50 p-3 rounded-lg border border-green-200">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        {{ status }}
                    </div>
                </div>

                <form @submit.prevent="submit">
                    <!-- User ID Field -->
                    <div class="mb-6">
                        <InputLabel for="email" value="USER IDENTIFICATION" class="military-label" />
                        <TextInput
                            id="email"
                            type="email"
                            class="military-input mt-2"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter classified user ID"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Security Code Field -->
                    <div class="mb-6">
                        <InputLabel for="password" value="SECURITY CODE" class="military-label" />
                        <TextInput
                            id="password"
                            type="password"
                            class="military-input mt-2"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter security access code"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Remember Device -->
                    <div class="mb-6 block">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember" class="rounded border-steel-gray" />
                            <span class="ms-2 text-sm text-steel-gray font-medium">Remember this secure device</span>
                        </label>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col space-y-4">
                        <PrimaryButton
                            class="btn-military-primary w-full justify-center"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg v-else class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ form.processing ? 'AUTHENTICATING...' : 'SECURE LOGIN' }}
                        </PrimaryButton>

                        <!-- Password Reset -->
                        <div class="text-center">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="text-navy-command hover:text-army-green font-medium text-sm tracking-military transition-colors"
                            >
                                RESET SECURITY CODE
                            </Link>
                        </div>
                    </div>
                </form>

                <!-- Security Information -->
                <div class="mt-8 pt-6 border-t border-base-gray">
                    <div class="text-center">
                        <div class="text-xs text-steel-gray tracking-military">
                            SECURITY LEVEL: CONFIDENTIAL
                        </div>
                        <div class="text-xs text-steel-gray mt-1">
                            Session ID: {{ generateSessionId() }}
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="mt-6 bg-red-50 p-4 rounded-lg border border-red-200">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="font-bold text-red-800 text-xs tracking-military">SECURITY ALERT</h4>
                            <p class="text-red-700 text-xs mt-1">
                                Unauthorized access attempts are logged and investigated. 
                                Contact ISAFP Security at +63-2-XXX-XXXX for assistance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Classification Footer -->
        <div class="bg-red-600 text-white text-center py-2 text-xs font-bold tracking-military">
            CLASSIFICATION: SECRET//AUTHORIZED PERSONNEL ONLY
        </div>
    </GuestLayout>
</template>

<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const generateSessionId = () => {
    return 'AFP-' + Math.random().toString(36).substr(2, 8).toUpperCase();
};
</script>

<style scoped>
/* Override default button styles with military theme */
.btn-military-primary {
    @apply inline-flex items-center px-6 py-3 text-sm font-bold tracking-wider text-white transition-all duration-200 rounded-lg shadow-lg;
    background-color: #1e3a5f;
}

.btn-military-primary:hover {
    background-color: #2d5a3d;
    transform: translateY(-1px);
    box-shadow: 0 10px 25px rgba(30, 58, 95, 0.3);
}

.military-input {
    @apply w-full px-4 py-3 border-2 rounded-lg transition-all duration-200 font-medium;
    border-color: #e2e8f0;
    color: #1a2332;
}

.military-input:focus {
    outline: none;
    border-color: #1e3a5f;
    box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
}

.military-label {
    @apply block text-sm font-semibold mb-2 tracking-wide;
    color: #1e3a5f;
}
</style>