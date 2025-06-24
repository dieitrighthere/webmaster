<template>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-4">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    {{ title }}
                </h3>
                <p class="text-gray-600 mb-3">
                    {{ description }}
                </p>
                <div class="flex items-center text-sm text-gray-500">
                    <span v-if="date">{{ formatDate(date) }}</span>
                    <span v-if="author" class="ml-2">by {{ author }}</span>
                </div>
            </div>
            <div v-if="image" class="ml-4">
                <img :src="image" :alt="title" class="w-24 h-24 object-cover rounded">
            </div>
        </div>
        <div v-if="$slots.default" class="mt-4">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    name: 'NewsCard',
    props: {
        title: {
            type: String,
            required: true
        },
        description: String,
        date: String,
        author: String,
        image: String
    },
    methods: {
        formatDate(date) {
            if (!date) return '';
            return new Date(date).toLocaleDateString();
        }
    }
}
</script>
