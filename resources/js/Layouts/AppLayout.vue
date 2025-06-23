<template>
    <div>
        <Head :title="title" />

        <!-- Header Component -->
        <Header />

        <!-- Main Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-tactical-black text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Republic of the Philippines Section -->
                    <div>
                        <div class="flex items-center mb-4">
                            <img 
                                src="/rph.png" 
                                alt="Republic of the Philippines Logo" 
                                class="h-12 w-12 mr-3"
                                @error="handleRPHLogoError"
                            >
                            <h4 class="font-bold text-white">REPUBLIC OF THE PHILIPPINES</h4>
                        </div>
                        <p class="text-field-gray text-sm">
                            All content is in the public domain unless otherwise stated.
                        </p>
                    </div>
                    
                    <!-- About GOVPH Section -->
                    <div>
                        <h4 class="font-bold mb-4 text-white">ABOUT GOVPH</h4>
                        <div class="text-sm text-field-gray space-y-3">
                            <p>
                                Learn more about the Philippine government, its structure, how government works and the people behind it.
                            </p>
                            <div class="space-y-2">
                                <div><a href="https://www.gov.ph" class="hover:text-honor-gold transition-colors">GOV.PH</a></div>
                                <div><a href="https://data.gov.ph" class="hover:text-honor-gold transition-colors">Open Data Portal</a></div>
                                <div><a href="https://www.officialgazette.gov.ph" class="hover:text-honor-gold transition-colors">Official Gazette</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Government Links Section -->
                    <div>
                        <h4 class="font-bold mb-4 text-white">GOVERNMENT LINKS</h4>
                        <ul class="space-y-2 text-sm text-field-gray">
                            <li><a href="https://op.gov.ph" class="hover:text-honor-gold transition-colors">Office of the President</a></li>
                            <li><a href="https://ovp.gov.ph" class="hover:text-honor-gold transition-colors">Office of the Vice President</a></li>
                            <li><a href="https://senate.gov.ph" class="hover:text-honor-gold transition-colors">Senate of the Philippines</a></li>
                            <li><a href="https://congress.gov.ph" class="hover:text-honor-gold transition-colors">House of Representatives</a></li>
                            <li><a href="https://sc.judiciary.gov.ph" class="hover:text-honor-gold transition-colors">Supreme Court</a></li>
                            <li><a href="https://ca.judiciary.gov.ph" class="hover:text-honor-gold transition-colors">Court of Appeals</a></li>
                            <li><a href="https://sb.judiciary.gov.ph" class="hover:text-honor-gold transition-colors">Sandiganbayan</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Copyright Row -->
                <div class="border-t border-steel-gray mt-8 pt-8 text-center">
                    <p class="text-field-gray text-sm">
                        © 2024 Intelligence Service of the Armed Forces of the Philippines. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';

defineProps({
    title: String,
});

const handleRPHLogoError = (event) => {
    // Hide the broken RPH logo and replace with simple text
    event.target.style.display = 'none';
    const parent = event.target.parentElement;
    if (parent && !parent.querySelector('.rph-logo-fallback')) {
        const fallback = document.createElement('div');
        fallback.className = 'rph-logo-fallback h-12 w-12 mr-3 bg-honor-gold rounded-full flex items-center justify-center';
        fallback.innerHTML = '<span class="text-sm font-bold text-tactical-black">RP</span>';
        parent.insertBefore(fallback, parent.firstChild);
    }
};
</script>