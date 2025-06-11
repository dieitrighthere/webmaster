<template>
    <AppLayout title="ISAFP - Intelligence Service of the Armed Forces of the Philippines">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-green-800 to-green-600 text-white">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="absolute inset-0 bg-pattern"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        A Unified Gateway for<br>
                        <span class="text-yellow-400">Strategic Operations</span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                        Protecting the sovereignty and security of the Republic of the Philippines through excellence in intelligence operations.
                    </p>
                    <Link href="/newsroom" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 rounded-lg transition-colors">
                        Latest Updates
                    </Link>
                </div>
            </div>
        </div>

        <!-- Featured Announcement -->
        <div v-if="featuredAnnouncement" class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gray-50 rounded-lg p-8 md:p-12">
                    <div class="flex flex-col md:flex-row items-center gap-8">
                        <div class="flex-shrink-0">
                            <img 
                                src="/images/commander.jpg" 
                                alt="Commander" 
                                class="w-32 h-32 rounded-full object-cover border-4 border-green-600"
                                @error="$event.target.src='/images/placeholder-avatar.jpg'"
                            >
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ featuredAnnouncement.title }}</h2>
                            <p class="text-green-600 font-semibold mb-4">{{ featuredAnnouncement.author }}</p>
                            <p class="text-gray-700 leading-relaxed">
                                {{ featuredAnnouncement.content.substring(0, 300) }}...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ready to Protect Banner -->
        <div class="bg-gradient-to-r from-gray-900 to-gray-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="flex justify-center items-center mb-6">
                    <div class="bg-yellow-500 rounded-full p-4 mr-4">
                        <svg class="w-8 h-8 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="bg-yellow-500 rounded-full p-4 mr-4">
                        <svg class="w-8 h-8 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <div class="bg-yellow-500 rounded-full p-4">
                        <svg class="w-8 h-8 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="text-4xl font-bold mb-4">WE ARE READY TO PROTECT THE COUNTRY</h2>
                <p class="text-xl opacity-90 max-w-2xl mx-auto">
                    Committed to defending our nation with honor, integrity, and unwavering dedication to the Filipino people.
                </p>
            </div>
        </div>

        <!-- Latest News Section -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Latest News</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Stay updated with the latest developments and strategic operations of ISAFP.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <NewsCard 
                        v-for="article in latestNews" 
                        :key="article.id" 
                        :article="article" 
                    />
                </div>

                <div class="text-center mt-12">
                    <Link 
                        href="/newsroom" 
                        class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition-colors"
                    >
                        View All News
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import NewsCard from '@/Components/NewsCard.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    featuredNews: Array,
    featuredAnnouncement: Object,
    latestNews: Array,
});
</script>

<style scoped>
.bg-pattern {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>