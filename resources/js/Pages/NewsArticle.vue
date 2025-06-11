<template>
    <AppLayout :title="`${article.title} - ISAFP`">
        <!-- Breadcrumb -->
        <div class="bg-gray-100 py-4">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <Link href="/" class="text-gray-500 hover:text-gray-700">
                                Home
                            </Link>
                        </li>
                        <li>
                            <svg class="flex-shrink-0 h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </li>
                        <li>
                            <Link href="/newsroom" class="text-gray-500 hover:text-gray-700">
                                Newsroom
                            </Link>
                        </li>
                        <li>
                            <svg class="flex-shrink-0 h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </li>
                        <li class="text-gray-900 font-medium truncate">
                            {{ article.title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Article Content -->
        <article class="bg-white py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Article Header -->
                <header class="mb-8">
                    <!-- Category and Date -->
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="inline-block bg-green-600 text-white text-sm font-semibold px-3 py-1 rounded">
                            {{ article.category }}
                        </span>
                        <span v-if="article.featured" class="inline-block bg-yellow-500 text-gray-900 text-sm font-semibold px-3 py-1 rounded">
                            Featured
                        </span>
                        <time class="text-gray-500 text-sm">
                            {{ formatDate(article.published_at) }}
                        </time>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ article.title }}
                    </h1>

                    <!-- Excerpt -->
                    <p class="text-xl text-gray-600 leading-relaxed mb-6">
                        {{ article.excerpt }}
                    </p>

                    <!-- Meta Info -->
                    <div class="flex items-center justify-between py-4 border-t border-b border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 font-medium">{{ article.author }}</span>
                            </div>
                        </div>

                        <!-- Share Buttons -->
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-500 text-sm">Share:</span>
                            <button 
                                @click="shareOnFacebook"
                                class="text-gray-400 hover:text-blue-600 transition-colors"
                                title="Share on Facebook"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </button>
                            <button 
                                @click="shareOnTwitter"
                                class="text-gray-400 hover:text-blue-400 transition-colors"
                                title="Share on Twitter"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </button>
                            <button 
                                @click="copyLink"
                                class="text-gray-400 hover:text-green-600 transition-colors"
                                title="Copy link"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>

                <!-- Featured Image -->
                <div v-if="article.featured_image" class="mb-8">
                    <img 
                        :src="article.featured_image" 
                        :alt="article.title"
                        class="w-full h-96 object-cover rounded-lg shadow-lg"
                        @error="handleImageError"
                    >
                </div>

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none">
                    <div v-html="formattedContent" class="text-gray-800 leading-relaxed"></div>
                </div>

                <!-- Tags -->
                <div v-if="article.tags && article.tags.length" class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-sm font-semibold text-gray-600 mb-3">Tags:</h3>
                    <div class="flex flex-wrap gap-2">
                        <span 
                            v-for="tag in article.tags" 
                            :key="tag"
                            class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-3 py-1 rounded-full transition-colors cursor-pointer"
                        >
                            {{ tag }}
                        </span>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        <section v-if="relatedArticles.length > 0" class="bg-gray-50 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Related Articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <NewsCard 
                        v-for="relatedArticle in relatedArticles" 
                        :key="relatedArticle.id" 
                        :article="relatedArticle" 
                    />
                </div>
            </div>
        </section>

        <!-- Back to Newsroom -->
        <div class="bg-white py-8 border-t border-gray-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <Link 
                    href="/newsroom" 
                    class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition-colors"
                >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Back to Newsroom
                </Link>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import NewsCard from '@/Components/NewsCard.vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    article: Object,
    relatedArticles: Array,
});

// Format content with proper line breaks
const formattedContent = computed(() => {
    return props.article.content.replace(/\n/g, '<br><br>');
});

// Methods
const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};

const shareOnFacebook = () => {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
};

const shareOnTwitter = () => {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent(props.article.title);
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
};

const copyLink = async () => {
    try {
        await navigator.clipboard.writeText(window.location.href);
        alert('Link copied to clipboard!');
    } catch (err) {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = window.location.href;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Link copied to clipboard!');
    }
};

const handleImageError = (event) => {
    event.target.style.display = 'none';
};
</script>

<style scoped>
.prose {
    max-width: none;
}

.prose p {
    margin-bottom: 1.5rem;
    line-height: 1.8;
}

.prose h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #1f2937;
}

.prose h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    color: #374151;
}
</style>