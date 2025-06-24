<template>
    <Link
        :href="href"
        :method="method"
        :as="as"
        class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
    >
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    name: 'DropdownLink',
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
    }
}
</script>
