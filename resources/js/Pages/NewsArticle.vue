<template>
    <AppLayout :title="`${article.title} - ISAFP Intelligence Briefing`">
        <!-- Security Classification Header -->
        <div class="bg-unclassified text-white text-center py-3">
            <div class="text-sm font-bold tracking-military">
                CLASSIFICATION: UNCLASSIFIED//FOR OFFICIAL USE ONLY (FOUO)
            </div>
        </div>

        <!-- Breadcrumb Navigation -->
        <div class="bg-tactical-black text-white py-4">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <Link href="/" class="text-gray-400 hover:text-honor-gold transition-colors font-medium">
                                <svg class="w-4 h-4 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                COMMAND CENTER
                            </Link>
                        </li>
                        <li>
                            <svg class="flex-shrink-0 h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </li>
                        <li>
                            <Link href="/newsroom" class="text-gray-400 hover:text-honor-gold transition-colors font-medium">
                                INTELLIGENCE BRIEFINGS
                            </Link>
                        </li>
                        <li>
                            <svg class="flex-shrink-0 h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </li>
                        <li class="text-honor-gold font-medium truncate tracking-military">
                            BRIEFING {{ article.id.toString().padStart(6, '0') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Article Content -->
        <article class="bg-command-white py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Article Header -->
                <header class="mb-8">
                    <!-- Classification and Metadata -->
                    <div class="flex flex-wrap items-center space-x-4 mb-6">
                        <span class="badge-unclassified">UNCLASSIFIED</span>
                        <span class="inline-block bg-navy-command text-white text-sm font-bold px-3 py-1 rounded tracking-military">
                            {{ article.category }}
                        </span>
                        <span v-if="article.featured" class="badge-top-secret">
                            ★ PRIORITY INTELLIGENCE
                        </span>
                        <time class="text-steel-gray text-sm text-military-mono">
                            {{ formatDate(article.published_at) }}
                        </time>
                    </div>

                    <!-- Document ID -->
                    <div class="bg-tactical-black text-white p-4 rounded-lg mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-honor-gold font-bold text-sm tracking-military">INTELLIGENCE BRIEFING</div>
                                <div class="text-military-mono text-lg font-bold">DOC-ID: {{ article.id.toString().padStart(6, '0') }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-honor-gold font-bold text-sm tracking-military">DISTRIBUTION</div>
                                <div class="text-white text-sm">AUTHORIZED PERSONNEL ONLY</div>
                            </div>
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl font-bold text-navy-command mb-6 leading-tight text-military-heading">
                        {{ article.title }}
                    </h1>

                    <!-- Executive Summary -->
                    <div class="military-card mb-8">
                        <div class="military-card-header">
                            <div class="military-card-title">EXECUTIVE SUMMARY</div>
                            <div class="military-card-subtitle">BRIEFING OVERVIEW</div>
                        </div>
                        <div class="military-card-content">
                            <p class="text-lg text-tactical-black leading-relaxed">
                                {{ article.excerpt }}
                            </p>
                        </div>
                    </div>

                    <!-- Meta Information -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between py-6 border-t border-b border-base-gray">
                        <div class="flex items-center space-x-6 mb-4 md:mb-0">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-steel-gray mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <div class="text-navy-command font-bold">{{ article.author }}</div>
                                    <div class="text-steel-gray text-sm tracking-military">AUTHORIZED CORRESPONDENT</div>
                                </div>
                            </div>
                        </div>

                        <!-- Share Actions -->
                        <div class="flex items-center space-x-4">
                            <span class="text-steel-gray text-sm font-medium tracking-military">SECURE DISTRIBUTION:</span>
                            <button 
                                @click="shareSecure"
                                class="text-navy-command hover:text-army-green transition-colors p-2 rounded border border-base-gray"
                                title="Secure Distribution"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                                </svg>
                            </button>
                            <button 
                                @click="printClassified"
                                class="text-navy-command hover:text-army-green transition-colors p-2 rounded border border-base-gray"
                                title="Print Classified"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zM5 14H4v-3h1v3zm6 0v2H9v-2h2zM7 14h6v-2H7v2z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button 
                                @click="archiveDocument"
                                class="text-navy-command hover:text-army-green transition-colors p-2 rounded border border-base-gray"
                                title="Archive Document"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                    <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>

                <!-- Featured Image -->
                <div v-if="article.featured_image" class="mb-8">
                    <div class="military-card overflow-hidden">
                        <img 
                            :src="article.featured_image" 
                            :alt="article.title"
                            class="w-full h-96 object-cover"
                            @error="handleImageError"
                        >
                        <div class="bg-tactical-black text-white p-4">
                            <div class="flex items-center justify-between">
                                <div class="text-honor-gold font-bold text-sm tracking-military">CLASSIFIED IMAGE</div>
                                <div class="text-xs text-gray-400">AUTHORIZED FOR RELEASE</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article Body -->
                <div class="military-card mb-8">
                    <div class="military-card-header">
                        <div class="military-card-title">DETAILED INTELLIGENCE REPORT</div>
                        <div class="military-card-subtitle">COMPREHENSIVE ANALYSIS</div>
                    </div>
                    <div class="military-card-content">
                        <div class="prose prose-lg max-w-none text-military-body">
                            <div v-html="formattedContent" class="text-tactical-black leading-relaxed space-y-6"></div>
                        </div>
                    </div>
                </div>

                <!-- Classification Tags -->
                <div v-if="article.tags && article.tags.length" class="mb-8">
                    <div class="military-card">
                        <div class="military-card-content">
                            <h3 class="text-lg font-bold text-navy-command mb-4 tracking-military">INTELLIGENCE TAGS:</h3>
                            <div class="flex flex-wrap gap-3">
                                <span 
                                    v-for="tag in article.tags" 
                                    :key="tag"
                                    class="inline-block bg-base-gray hover:bg-steel-gray text-tactical-black hover:text-white text-sm px-4 py-2 rounded-full transition-colors cursor-pointer font-medium tracking-military"
                                >
                                    {{ tag }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Notice -->
                <div class="bg-red-50 border-l-4 border-red-600 p-6 mb-8">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="font-bold text-red-800 tracking-military">SECURITY CLASSIFICATION NOTICE</h4>
                            <p class="text-red-700 text-sm mt-2 leading-relaxed">
                                This intelligence briefing contains information that has been authorized for public release. 
                                Unauthorized reproduction, distribution, or disclosure of this document is prohibited under 
                                the Classified Information Protection Act of the Republic of the Philippines.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Intelligence -->
        <section v-if="relatedArticles.length > 0" class="bg-base-gray py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-navy-command mb-4">RELATED INTELLIGENCE</h2>
                    <div class="text-sm tracking-military text-steel-gray mb-4">
                        ADDITIONAL BRIEFINGS FOR AUTHORIZED PERSONNEL
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <NewsCard 
                        v-for="relatedArticle in relatedArticles" 
                        :key="relatedArticle.id" 
                        :article="relatedArticle" 
                    />
                </div>
            </div>
        </section>

        <!-- Navigation -->
        <div class="bg-tactical-black py-8 border-t border-honor-gold">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <Link 
                    href="/newsroom" 
                    class="btn-military-accent"
                >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    RETURN TO BRIEFINGS
                </Link>
            </div>
        </div>

        <!-- Security Classification Footer -->
        <div class="bg-unclassified text-white text-center py-3">
            <div class="text-sm font-bold tracking-military">
                CLASSIFICATION: UNCLASSIFIED//FOR OFFICIAL USE ONLY (FOUO)
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
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    }) + ' LOCAL TIME';
};

const shareSecure = () => {
    // Simulate secure sharing
    alert('Document marked for secure distribution to authorized personnel only.');
};

const printClassified = () => {
    // Add classification headers to print
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head>
                <title>CLASSIFIED DOCUMENT - ${props.article.title}</title>
                <style>
                    body { font-family: 'Inter', sans-serif; margin: 20px; }
                    .classification { background: #dc2626; color: white; text-align: center; padding: 10px; font-weight: bold; }
                    .header { border-bottom: 2px solid #1e3a5f; padding-bottom: 10px; margin-bottom: 20px; }
                    .content { line-height: 1.8; }
                </style>
            </head>
            <body>
                <div class="classification">UNCLASSIFIED//FOR OFFICIAL USE ONLY</div>
                <div class="header">
                    <h1>${props.article.title}</h1>
                    <p>Document ID: ${props.article.id.toString().padStart(6, '0')}</p>
                    <p>Date: ${formatDate(props.article.published_at)}</p>
                </div>
                <div class="content">${formattedContent.value}</div>
                <div class="classification">UNCLASSIFIED//FOR OFFICIAL USE ONLY</div>
            </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
};

const archiveDocument = () => {
    alert('Document archived in classified intelligence database.');
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
    color: #1e3a5f;
}

.prose h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    color: #2d5a3d;
}

.bg-unclassified {
    background-color: #16a34a;
}
</style>