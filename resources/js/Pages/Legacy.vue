<template>
    <AppLayout title="Legacy - ISAFP">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-green-800 to-green-600 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-5xl font-bold mb-6">Our Legacy</h1>
                    <p class="text-xl opacity-90 max-w-3xl mx-auto">
                        Decades of dedicated service to the Republic of the Philippines, protecting our sovereignty and security through excellence in intelligence operations.
                    </p>
                </div>
            </div>
        </div>

        <!-- History Overview -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Foundation</h2>
                        <div class="space-y-4 text-gray-700 leading-relaxed">
                            <p>
                                <strong>Founded in {{ history.founding }}</strong>, the Intelligence Service of the Armed Forces of the Philippines has served as the nation's premier military intelligence organization for nearly eight decades.
                            </p>
                            <p>
                                {{ history.description }}
                            </p>
                            <div class="bg-green-50 p-6 rounded-lg mt-6">
                                <h3 class="font-bold text-green-800 mb-2">Our Mission</h3>
                                <p class="text-green-700">{{ history.mission }}</p>
                            </div>
                            <div class="bg-yellow-50 p-6 rounded-lg">
                                <h3 class="font-bold text-yellow-800 mb-2">Our Vision</h3>
                                <p class="text-yellow-700">{{ history.vision }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <img 
                            src="/images/isafp-history.jpg" 
                            alt="ISAFP Historical Building" 
                            class="w-full h-96 object-cover rounded-lg shadow-xl"
                            @error="handleImageError"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Historical Timeline</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Key milestones in our journey of service to the Filipino people.
                    </p>
                </div>

                <div class="relative">
                    <!-- Timeline line -->
                    <div class="absolute left-1/2 transform -translate-x-px h-full w-0.5 bg-green-200"></div>
                    
                    <div class="space-y-12">
                        <div 
                            v-for="(item, index) in timeline" 
                            :key="item.year"
                            :class="[
                                'relative flex items-center',
                                index % 2 === 0 ? 'justify-start' : 'justify-end'
                            ]"
                        >
                            <!-- Content -->
                            <div :class="[
                                'w-5/12 bg-white p-6 rounded-lg shadow-md',
                                index % 2 === 0 ? 'mr-auto' : 'ml-auto'
                            ]">
                                <div class="flex items-center mb-2">
                                    <span class="text-2xl font-bold text-green-600">{{ item.year }}</span>
                                </div>
                                <p class="text-gray-700">{{ item.event }}</p>
                            </div>
                            
                            <!-- Timeline dot -->
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-green-600 rounded-full border-4 border-white shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Achievements -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Major Achievements</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Recognizing our significant contributions to national security and intelligence excellence.
                    </p>
                </div>

                <div class="space-y-8">
                    <div 
                        v-for="achievement in achievements" 
                        :key="achievement.year"
                        class="bg-gray-50 rounded-lg p-8 hover:shadow-lg transition-shadow"
                    >
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="md:w-1/4 mb-4 md:mb-0">
                                <div class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg font-bold text-lg">
                                    {{ achievement.year }}
                                </div>
                            </div>
                            <div class="md:w-3/4">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ achievement.title }}</h3>
                                <p class="text-gray-700">{{ achievement.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values and Principles -->
        <div class="bg-green-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Our Core Values</h2>
                    <p class="text-xl opacity-90 max-w-2xl mx-auto">
                        The principles that guide our service to the nation.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-white/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Integrity</h3>
                        <p class="opacity-90">Unwavering commitment to honesty, ethics, and moral principles in all our operations.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-white/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Excellence</h3>
                        <p class="opacity-90">Pursuing the highest standards of performance and professionalism in intelligence operations.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-white/10 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Service</h3>
                        <p class="opacity-90">Dedicated service to the Filipino people and unwavering loyalty to the Republic of the Philippines.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Leadership Legacy -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Leadership Through the Years</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Honoring the distinguished leaders who have guided ISAFP through decades of service.
                    </p>
                </div>

                <div class="bg-gradient-to-r from-green-50 to-yellow-50 rounded-lg p-8">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Current Leadership</h3>
                        <div class="flex flex-col items-center">
                            <img 
                                src="/images/commander.jpg" 
                                alt="Current Commander" 
                                class="w-32 h-32 rounded-full object-cover border-4 border-green-600 mb-4"
                                @error="handleImageError"
                            >
                            <h4 class="text-xl font-bold text-gray-900">Bgen. PETER N. TANGCOO, PhD</h4>
                            <p class="text-green-600 font-semibold">Administrator</p>
                            <p class="text-gray-600 mt-2 max-w-2xl text-center">
                                Leading ISAFP with distinction, ensuring our continued commitment to excellence in intelligence operations and national security.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold mb-4">Continue Our Legacy</h2>
                <p class="text-xl opacity-90 mb-8 max-w-2xl mx-auto">
                    Join us in writing the next chapter of ISAFP's distinguished history of service to the Filipino people.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <Link 
                        href="/careers" 
                        class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition-colors"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                        </svg>
                        Explore Careers
                    </Link>
                    <Link 
                        href="/newsroom" 
                        class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-lg transition-colors"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                        Latest News
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    history: Object,
    achievements: Array,
    timeline: Array,
});

const handleImageError = (event) => {
    // Hide broken image and show placeholder
    event.target.style.display = 'none';
};
</script>