<template>
    <AppLayout title="Newsroom">
        <!-- Page Header -->
        <div class="bg-isafp-primary-gradient text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Newsroom</h1>
                    <p class="text-xl opacity-90 max-w-2xl mx-auto">
                        Stay informed with the latest news, updates, and strategic developments from ISAFP.
                    </p>
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-white border-b border-base-gray py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <!-- Search -->
                    <div class="flex-1 max-w-lg">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-field-gray" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                v-model="searchQuery"
                                @keyup.enter="performSearch"
                                type="text"
                                placeholder="Search news articles..."
                                class="block w-full pl-10 pr-3 py-2 border border-base-gray rounded-md leading-5 bg-white placeholder-field-gray focus:outline-none focus:placeholder-steel-gray focus:ring-1 focus:ring-navy-command focus:border-navy-command"
                            >
                        </div>
                    </div>

                    <!-- Search Button -->
                    <button 
                        @click="performSearch"
                        class="bg-navy-command hover:bg-army-green text-white px-6 py-2 rounded-md font-medium transition-colors"
                    >
                        Search
                    </button>

                    <!-- Clear Search -->
                    <button 
                        v-if="search"
                        @click="clearSearch"
                        class="text-steel-gray hover:text-tactical-black px-4 py-2 font-medium transition-colors"
                    >
                        Clear
                    </button>
                </div>

                <!-- Search Results Info -->
                <div v-if="search" class="mt-4 text-sm text-steel-gray">
                    Search results for: <span class="font-semibold text-navy-command">"{{ search }}"</span>
                    ({{ articles.length }} {{ articles.length === 1 ? 'result' : 'results' }})
                </div>
            </div>
        </div>

        <!-- Articles Section -->
        <div class="bg-command-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- No Results -->
                <div v-if="articles.length === 0" class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-field-gray" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-navy-command">No articles found</h3>
                    <p class="mt-1 text-sm text-steel-gray">
                        {{ search ? 'Try adjusting your search terms.' : 'No news articles are currently available.' }}
                    </p>
                </div>

                <!-- Featured Articles -->
                <div v-else-if="featuredArticles.length > 0 && !search" class="mb-12">
                    <h2 class="text-2xl font-bold text-navy-command mb-8">Featured Stories</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <NewsCard 
                            v-for="article in featuredArticles" 
                            :key="article.id" 
                            :article="article" 
                        />
                    </div>
                </div>

                <!-- All Articles -->
                <div>
                    <h2 v-if="!search && featuredArticles.length > 0" class="text-2xl font-bold text-navy-command mb-8">
                        Latest News
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <NewsCard 
                            v-for="article in displayArticles" 
                            :key="article.id" 
                            :article="article" 
                        />
                    </div>
                </div>

                <!-- Load More Button -->
                <div v-if="hasMoreArticles" class="text-center mt-12">
                    <button 
                        @click="loadMore"
                        class="bg-navy-command hover:bg-army-green text-white font-bold py-3 px-8 rounded-lg transition-colors"
                    >
                        Load More Articles
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import NewsCard from '@/Components/NewsCard.vue';
import { router } from '@inertiajs/vue3';
import { ref, computed, onMounted } from 'vue';

const props = defineProps({
    articles: Array,
    search: String,
});

const searchQuery = ref(props.search || '');
const articlesPerPage = 9;
const currentPage = ref(1);

// Computed properties
const featuredArticles = computed(() => {
    if (props.search) return [];
    return props.articles.filter(article => article.featured);
});

const nonFeaturedArticles = computed(() => {
    if (props.search) return props.articles;
    return props.articles.filter(article => !article.featured);
});

const displayArticles = computed(() => {
    const articles = nonFeaturedArticles.value;
    return articles.slice(0, currentPage.value * articlesPerPage);
});

const hasMoreArticles = computed(() => {
    return displayArticles.value.length < nonFeaturedArticles.value.length;
});

// Methods
const performSearch = () => {
    router.get('/newsroom', 
        searchQuery.value ? { search: searchQuery.value } : {},
        { preserveState: false }
    );
};

const clearSearch = () => {
    searchQuery.value = '';
    router.get('/newsroom', {}, { preserveState: false });
};

const loadMore = () => {
    currentPage.value++;
};

onMounted(() => {
    // Reset page when component mounts
    currentPage.value = 1;
});
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>