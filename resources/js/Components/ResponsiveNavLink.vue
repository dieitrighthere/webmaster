<template>
    <Link
        :href="href"
        :method="method"
        :as="as"
        :class="classes"
    >
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    name: 'ResponsiveNavLink',
    components: {
        Link,
    },
    props: {
        href: String,
        method: {
            type: String,
            default: 'get',
        },
        as: {
            type: String,
            default: 'a',
        },
        active: {
            type: Boolean,
            default: false,
        },
    },
    computed: {
        classes() {
            return this.active
                ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-left text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
                : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out'
        }
    }
}
</script>
