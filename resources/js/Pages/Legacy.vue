<template>
    <AppLayout title="Heritage & Legacy - ISAFP">
        <!-- Military Hero Section -->
        <div class="gradient-military text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <!-- Heritage Badge -->
                    <div class="flex justify-center mb-8">
                        <div class="bg-honor-gold rounded-full p-8 shadow-2xl border-4 border-white">
                            <svg class="w-20 h-20 text-navy-command" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.75 2.524z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h1 class="text-6xl font-bold mb-6 text-military-heading text-white">OUR HERITAGE</h1>
                    <div class="text-sm tracking-military text-honor-gold font-bold mb-4">
                        ★ LEGACY ★ TRADITION ★ ETERNAL VIGILANCE ★
                    </div>
                    <p class="text-xl opacity-90 max-w-4xl mx-auto leading-relaxed">
                        Decades of distinguished service to the Republic of the Philippines, protecting our sovereignty 
                        and security through excellence in intelligence operations and unwavering dedication to duty.
                    </p>
                </div>
            </div>
        </div>

        <!-- History Overview -->
        <div class="bg-command-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="bg-unclassified text-white px-4 py-1 rounded-full inline-block mb-6">
                            <span class="text-xs font-bold tracking-military">DECLASSIFIED HISTORICAL RECORD</span>
                        </div>
                        
                        <h2 class="text-4xl font-bold text-navy-command mb-6">FOUNDATION OF EXCELLENCE</h2>
                        <div class="space-y-6 text-tactical-black leading-relaxed">
                            <p class="text-lg">
                                <strong class="text-honor-gold">Founded in {{ history.founding }}</strong>, the Intelligence Service 
                                of the Armed Forces of the Philippines has served as the nation's premier military intelligence 
                                organization for nearly eight decades of unwavering service.
                            </p>
                            <p>
                                {{ history.description }}
                            </p>
                            
                            <div class="military-card">
                                <div class="bg-army-green text-white p-6 rounded-t-lg">
                                    <h3 class="font-bold text-honor-gold mb-2 tracking-military">MISSION STATEMENT</h3>
                                    <p class="text-sm text-white opacity-95">{{ history.mission }}</p>
                                </div>
                            </div>
                            
                            <div class="military-card">
                                <div class="bg-navy-command text-white p-6 rounded-t-lg">
                                    <h3 class="font-bold text-honor-gold mb-2 tracking-military">STRATEGIC VISION</h3>
                                    <p class="text-sm text-white opacity-95">{{ history.vision }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="military-card overflow-hidden">
                            <img 
                                src="/images/isafp-history.jpg" 
                                alt="ISAFP Historical Building" 
                                class="w-full h-96 object-cover"
                                @error="handleImageError"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-tactical-black via-transparent to-transparent opacity-60"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="bg-tactical-black bg-opacity-80 text-white p-4 rounded">
                                    <div class="text-honor-gold font-bold text-sm tracking-military">HISTORICAL ARCHIVE</div>
                                    <div class="text-xs text-gray-300">ISAFP Headquarters - Operational Since {{ history.founding }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="bg-base-gray py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-navy-command mb-4">OPERATIONAL TIMELINE</h2>
                    <div class="text-sm tracking-military text-steel-gray mb-4">
                        CLASSIFIED HISTORICAL MILESTONES IN PHILIPPINE INTELLIGENCE
                    </div>
                    <p class="text-steel-gray max-w-3xl mx-auto">
                        Key strategic milestones in our journey of service to the Filipino people and defense of national sovereignty.
                    </p>
                </div>

                <div class="relative">
                    <!-- Central Timeline Line -->
                    <div class="absolute left-1/2 transform -translate-x-px h-full w-1 bg-honor-gold shadow-lg"></div>
                    
                    <div class="space-y-16">
                        <div 
                            v-for="(item, index) in timeline" 
                            :key="item.year"
                            :class="[
                                'relative flex items-center',
                                index % 2 === 0 ? 'justify-start' : 'justify-end'
                            ]"
                        >
                            <!-- Content Card -->
                            <div :class="[
                                'w-5/12 military-card',
                                index % 2 === 0 ? 'mr-auto' : 'ml-auto'
                            ]">
                                <div class="military-card-header">
                                    <div class="military-card-title">OPERATION {{ item.year }}</div>
                                    <div class="military-card-subtitle">CLASSIFIED MILESTONE</div>
                                </div>
                                <div class="military-card-content">
                                    <p class="text-tactical-black">{{ item.event }}</p>
                                    <div class="mt-4 text-xs text-steel-gray tracking-military">
                                        SECURITY LEVEL: DECLASSIFIED
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Timeline Node -->
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-honor-gold rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                <div class="w-3 h-3 bg-navy-command rounded-full"></div>
                            </div>
                            
                            <!-- Year Badge -->
                            <div :class="[
                                'absolute left-1/2 transform -translate-x-1/2 mt-12 bg-tactical-black text-white px-4 py-2 rounded-lg shadow-lg',
                            ]">
                                <div class="text-sm font-bold text-honor-gold tracking-military">{{ item.year }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Achievements -->
        <div class="bg-tactical-black text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-honor-gold mb-4">DISTINGUISHED ACHIEVEMENTS</h2>
                    <div class="text-sm tracking-military text-gray-300 mb-4">
                        RECOGNITION FOR EXCEPTIONAL SERVICE TO NATIONAL SECURITY
                    </div>
                    <p class="text-gray-300 max-w-3xl mx-auto">
                        Honoring our significant contributions to national security, intelligence excellence, and defense of Philippine sovereignty.
                    </p>
                </div>

                <div class="space-y-8">
                    <div 
                        v-for="achievement in achievements" 
                        :key="achievement.year"
                        class="bg-steel-gray rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300"
                    >
                        <div class="p-8">
                            <div class="flex flex-col lg:flex-row lg:items-center">
                                <div class="lg:w-1/4 mb-6 lg:mb-0">
                                    <div class="bg-honor-gold text-navy-command px-6 py-4 rounded-lg font-bold text-2xl text-center shadow-lg">
                                        {{ achievement.year }}
                                    </div>
                                </div>
                                <div class="lg:w-3/4 lg:pl-8">
                                    <h3 class="text-2xl font-bold text-honor-gold mb-4">{{ achievement.title }}</h3>
                                    <p class="text-gray-300 leading-relaxed mb-4">{{ achievement.description }}</p>
                                    <div class="flex items-center">
                                        <span class="badge-unclassified mr-4">DECLASSIFIED</span>
                                        <span class="text-xs text-gray-400 tracking-military">
                                            OFFICIAL MILITARY RECORD
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values -->
        <div class="gradient-military-reverse text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4 text-honor-gold">CORE VALUES</h2>
                    <div class="text-sm tracking-military text-gray-300 mb-4">
                        FUNDAMENTAL PRINCIPLES GUIDING OUR SERVICE TO THE NATION
                    </div>
                    <p class="text-xl opacity-90 max-w-3xl mx-auto">
                        The unwavering principles that define our character and guide our service to the Republic of the Philippines.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-honor-gold rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 shadow-2xl">
                            <svg class="w-12 h-12 text-navy-command" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-honor-gold tracking-military">HONOR</h3>
                        <p class="opacity-90 leading-relaxed">
                            Unwavering commitment to integrity, ethical conduct, and moral principles in all intelligence 
                            operations and military service to the Philippines.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="bg-honor-gold rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 shadow-2xl">
                            <svg class="w-12 h-12 text-navy-command" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-honor-gold tracking-military">SERVICE</h3>
                        <p class="opacity-90 leading-relaxed">
                            Dedicated service to the Filipino people and steadfast loyalty to the Republic of the Philippines 
                            through selfless sacrifice and professional excellence.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="bg-honor-gold rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6 shadow-2xl">
                            <svg class="w-12 h-12 text-navy-command" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-honor-gold tracking-military">PATRIOTISM</h3>
                        <p class="opacity-90 leading-relaxed">
                            Fierce love of country and unwavering devotion to protecting Philippine sovereignty, security, 
                            and the democratic ideals of our nation.
                        </p>
                    </div>
                </div>

                <!-- Values in Action -->
                <div class="mt-16 bg-black bg-opacity-30 rounded-lg p-8 border border-honor-gold">
                    <div class="text-center">
                        <h4 class="text-xl font-bold text-honor-gold mb-4 tracking-military">VALUES IN ACTION</h4>
                        <p class="text-gray-300 leading-relaxed max-w-3xl mx-auto">
                            These core values are not mere words but living principles that guide every decision, every operation, 
                            and every moment of service. They define who we are as guardians of Philippine security and defenders 
                            of our people's freedom.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Leadership Legacy -->
        <div class="bg-command-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-navy-command mb-4">LEADERSHIP LEGACY</h2>
                    <div class="text-sm tracking-military text-steel-gray mb-4">
                        DISTINGUISHED COMMANDERS WHO SHAPED OUR ORGANIZATION
                    </div>
                    <p class="text-steel-gray max-w-3xl mx-auto">
                        Honoring the distinguished leaders who have guided ISAFP through decades of service and shaped our commitment to excellence.
                    </p>
                </div>

                <div class="military-card max-w-4xl mx-auto">
                    <div class="military-card-header">
                        <div class="military-card-title">CURRENT COMMAND LEADERSHIP</div>
                        <div class="military-card-subtitle">OPERATIONAL COMMANDER</div>
                    </div>
                    <div class="military-card-content">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="flex-shrink-0">
                                <img 
                                    src="/images/commander.jpg" 
                                    alt="Current Commander" 
                                    class="w-40 h-40 rounded-lg object-cover border-4 border-honor-gold shadow-xl"
                                    @error="handleImageError"
                                >
                            </div>
                            <div class="flex-1 text-center md:text-left">
                                <h4 class="text-3xl font-bold text-navy-command mb-2">Bgen. PETER N. TANGCOO, PhD</h4>
                                <div class="text-honor-gold font-bold text-lg tracking-military mb-4">ADMINISTRATOR</div>
                                <p class="text-tactical-black leading-relaxed mb-6">
                                    Leading ISAFP with distinguished service record and unwavering commitment to excellence in intelligence operations 
                                    and national security. Ensuring our continued dedication to protecting Philippine sovereignty through strategic leadership.
                                </p>
                                <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                                    <span class="badge-unclassified">COMMANDING OFFICER</span>
                                    <span class="badge-top-secret">CLASSIFIED OPERATIONS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Command Philosophy -->
                <div class="mt-8 bg-tactical-black text-white p-8 rounded-lg">
                    <div class="text-center">
                        <h4 class="text-xl font-bold text-honor-gold mb-4 tracking-military">COMMAND PHILOSOPHY</h4>
                        <blockquote class="text-lg italic text-gray-300 max-w-3xl mx-auto leading-relaxed">
                            "Excellence in intelligence operations requires not only advanced technology and strategic thinking, 
                            but the unwavering dedication of every member of our elite organization. Together, we stand as 
                            guardians of Philippine security and defenders of our democratic way of life."
                        </blockquote>
                        <div class="mt-4 text-sm text-honor-gold tracking-military">
                            - ISAFP LEADERSHIP PRINCIPLES
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="gradient-military text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-4 text-honor-gold">CONTINUE THE LEGACY</h2>
                <div class="text-sm tracking-military text-gray-300 mb-8">
                    JOIN THE NEXT CHAPTER OF PHILIPPINE INTELLIGENCE EXCELLENCE
                </div>
                <p class="text-xl opacity-90 mb-8 max-w-3xl mx-auto">
                    Join us in writing the next chapter of ISAFP's distinguished history of service to the Filipino people. 
                    Carry forward the tradition of honor, service, and patriotism.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <Link 
                        href="/careers" 
                        class="btn-military-accent"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                        </svg>
                        JOIN THE ELITE
                    </Link>
                    <Link 
                        href="/newsroom" 
                        class="btn-military-secondary text-white border-white hover:bg-white hover:text-navy-command"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                        INTELLIGENCE BRIEFINGS
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

<style scoped>
.bg-unclassified {
    background-color: #16a34a;
}
</style>