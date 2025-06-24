<template>
    <Link :href="`/news/${article.slug}`" class="block group">
        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform group-hover:-translate-y-1 border border-base-gray">
            <!-- Featured Image -->
            <div class="relative h-48 bg-base-gray overflow-hidden">
                <img 
                    v-if="article.featured_image && !imageError" 
                    :src="article.featured_image" 
                    :alt="article.title"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                    @error="handleImageError"
                >
                <div 
                    v-if="!article.featured_image || imageError"
                    class="w-full h-full bg-isafp-primary-gradient flex items-center justify-center"
                >
                    <svg class="w-16 h-16 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                
                <!-- Category Badge -->
                <div class="absolute top-4 left-4">
                    <span class="inline-block bg-navy-command text-white text-xs font-semibold px-2 py-1 rounded">
                        {{ article.category }}
                    </span>
                </div>
                
                <!-- Featured Badge -->
                <div v-if="article.featured" class="absolute top-4 right-4">
                    <span class="inline-block bg-honor-gold text-tactical-black text-xs font-semibold px-2 py-1 rounded">
                        Featured
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Title -->
                <h3 class="text-xl font-bold text-navy-command mb-3 group-hover:text-army-green transition-colors line-clamp-2">
                    {{ article.title }}
                </h3>
                
                <!-- Excerpt -->
                <p class="text-steel-gray mb-4 line-clamp-3">
                    {{ article.excerpt }}
                </p>
                
                <!-- Tags -->
                <div v-if="article.tags && article.tags.length" class="flex flex-wrap gap-2 mb-4">
                    <span 
                        v-for="tag in article.tags.slice(0, 3)" 
                        :key="tag"
                        class="inline-block bg-command-white text-steel-gray text-xs px-2 py-1 rounded border border-base-gray"
                    >
                        {{ tag }}
                    </span>
                </div>

                <!-- Meta Information -->
                <div class="flex justify-between items-center text-sm text-field-gray">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ formatDate(article.published_at) }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ article.author }}</span>
                    </div>
                </div>

                <!-- Read More Link -->
                <div class="mt-4 flex items-center text-navy-command font-semibold group-hover:text-army-green">
                    <span class="text-sm">Read More</span>
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </article>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    article: {
        type: Object,
        required: true
    }
});

const imageError = ref(false);

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};

const handleImageError = () => {
    imageError.value = true;
};
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