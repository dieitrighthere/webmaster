<template>
    <header class="bg-navy-command text-white">
        <!-- Main Header -->
        <div class="py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <Link href="/" class="flex items-center">
                            <!-- Option 1: External SVG file -->
                            <img 
                                src="/images/afp-logo.png" 
                                alt="AFP Logo" 
                                class="h-16 w-16 mr-4"
                                @error="handleLogoError"
                            >
                            <div>
                                <h1 class="text-s">
                                    Republic of the Philippines
                                </h1>
                                <h1 class="text-xl font-bold">
                                    INTELLIGENCE SERVICE OF THE<br>
                                    ARMED FORCES OF THE PHILIPPINES
                                </h1>
                            </div>
                        </Link>
                    </div>

                    <!-- Right Side: AFPNET Status and Login -->
                    <div class="flex items-center space-x-4">
                        <!-- Bagong Pilipinas Logo -->
                        <div class="hidden md:block">
                            <img 
                                src="/images/bagong-pilipinas-logo.png" 
                                alt="Bagong Pilipinas Logo" 
                                class="h-8 w-auto"
                                @error="handleFlagError"
                            >
                        </div>
                        
                        <!-- AFPNET Status and Login -->
                        <div class="flex items-center space-x-3">
                            <span v-if="isAFPNetwork" class="text-honor-gold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                AFPNET Connected
                            </span>
                            
                            <button 
                                v-if="isAFPNetwork" 
                                @click="handleLogin"
                                class="bg-honor-gold hover:bg-yellow-600 text-tactical-black px-4 py-2 rounded text-sm font-semibold transition-colors"
                            >
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="bg-tactical-black border-t border-steel-gray">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex space-x-8">
                    <Link 
                        href="/" 
                        :class="[
                            'px-3 py-4 text-sm font-medium transition-colors',
                            currentPage === 'Homepage' 
                                ? 'text-honor-gold border-b-2 border-honor-gold' 
                                : 'text-gray-300 hover:text-white'
                        ]"
                    >
                        Home
                    </Link>

                    <Link 
                        href="/newsroom" 
                        :class="[
                            'px-3 py-4 text-sm font-medium transition-colors',
                            (currentPage === 'Newsroom' || currentPage === 'NewsArticle')
                                ? 'text-honor-gold border-b-2 border-honor-gold' 
                                : 'text-gray-300 hover:text-white'
                        ]"
                    >
                        News
                    </Link>

                    <Link 
                        href="/careers" 
                        :class="[
                            'px-3 py-4 text-sm font-medium transition-colors',
                            currentPage === 'Careers' 
                                ? 'text-honor-gold border-b-2 border-honor-gold' 
                                : 'text-gray-300 hover:text-white'
                        ]"
                    >
                        Careers
                    </Link>

                    <Link 
                        href="/legacy" 
                        :class="[
                            'px-3 py-4 text-sm font-medium transition-colors',
                            currentPage === 'Legacy' 
                                ? 'text-honor-gold border-b-2 border-honor-gold' 
                                : 'text-gray-300 hover:text-white'
                        ]"
                    >
                        Legacy
                    </Link>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed, onMounted } from 'vue';

const page = usePage();

// Debug on component mount
onMounted(() => {
    console.log('Header Component Mounted');
    console.log('All Props:', page.props);
    console.log('isAFPNetwork:', page.props.isAFPNetwork);
    console.log('Debug prop:', page.props.debug);
    console.log('Current URL:', window.location.href);
});

// Get current page component name
const currentPage = computed(() => page.component);

// Check if user is on AFPNET
const isAFPNetwork = computed(() => {
    // First check if we have debug info
    if (page.props.debug) {
        console.log('AFPNET Debug:', page.props.debug);
        console.log('isAFPNetwork prop:', page.props.isAFPNetwork);
    }
    
    // Check the prop passed from Laravel
    return page.props.isAFPNetwork || false;
});

const handleLogin = () => {
    // Only allow login if on AFPNET
    if (isAFPNetwork.value) {
        window.location.href = '/login';
    }
};

const handleLogoError = (event) => {
    // Hide the broken image and replace with a simple shield icon
    event.target.style.display = 'none';
    const parent = event.target.parentElement;
    if (parent && !parent.querySelector('.logo-fallback')) {
        const fallback = document.createElement('div');
        fallback.className = 'logo-fallback h-16 w-16 mr-4 bg-honor-gold rounded-full flex items-center justify-center';
        fallback.innerHTML = '<span class="text-2xl font-bold text-tactical-black">AFP</span>';
        parent.insertBefore(fallback, parent.firstChild);
    }
};

const handleFlagError = (event) => {
    // Hide the broken flag image
    event.target.style.display = 'none';
};
</script>