<section id="projects" class="section">

    <div class="container-custom">

        <div class="text-center">

            <div class="badge">
                Featured Projects
            </div>

            <h2 class="section-title mt-6">
                Selected Works
            </h2>

            <p class="section-description max-w-2xl mx-auto">
                Beberapa project yang pernah saya kerjakan mulai dari
                Website, Sistem Informasi, hingga AI Automation.
            </p>

        </div>

        @php

        $projects = [

            [
                'title'=>'Smart Fingers',
                'description'=>'Learning Management System berbasis Laravel.',
                'tech'=>['Laravel','PHP','Tailwind'],
            ],

            [
                'title'=>'Hotel WhatsApp Bot',
                'description'=>'Chatbot Hotel menggunakan n8n & WhatsApp.',
                'tech'=>['n8n','Evolution API','AI'],
            ],

            [
                'title'=>'SIAR Banten',
                'description'=>'Sistem Informasi Arsip Rilis.',
                'tech'=>['Laravel','MySQL'],
            ],

            [
                'title'=>'Company Profile',
                'description'=>'Landing Page Modern.',
                'tech'=>['Laravel','Tailwind'],
            ],

        ];

        @endphp

        <div class="grid lg:grid-cols-2 gap-8 mt-16">

            @foreach($projects as $project)

                <div class="card overflow-hidden">

                    <div class="h-60 bg-zinc-800 flex items-center justify-center">

                        Preview Image

                    </div>

                    <div class="p-8">

                        <h3 class="text-2xl font-semibold">

                            {{ $project['title'] }}

                        </h3>

                        <p class="text-zinc-400 mt-4">

                            {{ $project['description'] }}

                        </p>

                        <div class="flex flex-wrap gap-2 mt-6">

                            @foreach($project['tech'] as $tech)

                                <span class="badge">

                                    {{ $tech }}

                                </span>

                            @endforeach

                        </div>

                        <div class="flex gap-4 mt-8">

                            <a href="#" class="btn-primary">
                                Live Demo
                            </a>

                            <a href="#" class="btn-outline">
                                Github
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>