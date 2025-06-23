<template>
    <AppLayout title="Careers">
        <!-- Page Header -->
        <div class="bg-isafp-primary-gradient text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Join Our Mission</h1>
                    <p class="text-xl opacity-90 max-w-3xl mx-auto">
                        Serve your country with honor and integrity. Explore career opportunities at the Intelligence Service of the Armed Forces of the Philippines.
                    </p>
                </div>
            </div>
        </div>

        <!-- Why Join ISAFP Section -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-navy-command mb-4">Why Join ISAFP?</h2>
                    <p class="text-steel-gray max-w-2xl mx-auto">
                        Be part of an elite organization dedicated to protecting Philippine sovereignty and security through excellence in intelligence operations.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-honor-gold rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-tactical-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-navy-command mb-2">National Service</h3>
                        <p class="text-steel-gray">Serve your country and contribute to national security and sovereignty.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-honor-gold rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-tactical-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-navy-command mb-2">Professional Excellence</h3>
                        <p class="text-steel-gray">Join an elite organization committed to the highest standards of professionalism.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-honor-gold rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-tactical-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.75 2.524z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-navy-command mb-2">Continuous Learning</h3>
                        <p class="text-steel-gray">Access to advanced training and professional development opportunities.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Openings -->
        <div class="bg-command-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-navy-command mb-4">Current Openings</h2>
                    <p class="text-steel-gray">Explore available positions and find your path to serve the nation.</p>
                </div>

                <div class="space-y-6">
                    <div v-for="career in careers" :key="career.id" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow border border-base-gray">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-navy-command mb-2">{{ career.title }}</h3>
                                <div class="flex flex-wrap gap-4 mb-3 text-sm text-steel-gray">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                                        </svg>
                                        {{ career.department }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ career.location }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ career.type }}
                                    </div>
                                </div>
                                <p class="text-tactical-black mb-4">{{ career.description }}</p>
                                
                                <!-- Requirements -->
                                <div class="mb-4">
                                    <h4 class="font-semibold text-navy-command mb-2">Requirements:</h4>
                                    <ul class="list-disc list-inside text-sm text-steel-gray space-y-1">
                                        <li v-for="requirement in career.requirements" :key="requirement">
                                            {{ requirement }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-4 md:mt-0 md:ml-6">
                                <div class="text-sm text-field-gray mb-3">
                                    Posted: {{ formatDate(career.posted_at) }}
                                </div>
                                <button class="w-full md:w-auto bg-navy-command hover:bg-army-green text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- No Openings Message -->
                <div v-if="careers.length === 0" class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-field-gray" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8zM8 14v.01M12 14v.01M16 14v.01"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-navy-command">No current openings</h3>
                    <p class="mt-1 text-sm text-steel-gray">Please check back later for new opportunities.</p>
                </div>
            </div>
        </div>

        <!-- Application Process -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-navy-command mb-4">Application Process</h2>
                    <p class="text-steel-gray max-w-2xl mx-auto">
                        Follow these steps to begin your journey with ISAFP.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="bg-navy-command text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4 font-bold text-lg">
                            1
                        </div>
                        <h3 class="font-bold text-navy-command mb-2">Apply Online</h3>
                        <p class="text-sm text-steel-gray">Submit your application through our secure online portal.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-navy-command text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4 font-bold text-lg">
                            2
                        </div>
                        <h3 class="font-bold text-navy-command mb-2">Initial Screening</h3>
                        <p class="text-sm text-steel-gray">Our team reviews your qualifications and background.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-navy-command text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4 font-bold text-lg">
                            3
                        </div>
                        <h3 class="font-bold text-navy-command mb-2">Assessment</h3>
                        <p class="text-sm text-steel-gray">Participate in comprehensive assessments and interviews.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-navy-command text-white rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-4 font-bold text-lg">
                            4
                        </div>
                        <h3 class="font-bold text-navy-command mb-2">Clearance & Onboarding</h3>
                        <p class="text-sm text-steel-gray">Complete security clearance and begin your service.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="bg-command-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-navy-command mb-4">Questions About Careers?</h2>
                <p class="text-steel-gray mb-8 max-w-2xl mx-auto">
                    Our recruitment team is here to help you understand opportunities and the application process.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a 
                        href="mailto:careers@isafp.mil.ph" 
                        class="inline-flex items-center bg-navy-command hover:bg-army-green text-white font-bold py-3 px-6 rounded-lg transition-colors"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        Email Us
                    </a>
                    <a 
                        href="tel:+632-1234-5678" 
                        class="inline-flex items-center bg-steel-gray hover:bg-tactical-black text-white font-bold py-3 px-6 rounded-lg transition-colors"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        Call Us
                    </a>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    careers: Array,
});

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};
</script>