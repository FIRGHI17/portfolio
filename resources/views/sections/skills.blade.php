<section id="skills" class="section">

    <div class="container-custom">

        <div class="text-center">

            <div class="badge">
                Skills
            </div>

            <h2 class="section-title mt-6">
                Technologies I Use
            </h2>

        </div>

        @php
            $skills = [
                'PHP',
                'Laravel',
                'JavaScript',
                'Tailwind CSS',
                'Bootstrap',
                'MySQL',
                'Docker',
                'Git',
                'Linux',
                'REST API',
                'n8n',
                'AI Automation'
            ];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-16">

            @foreach($skills as $skill)

                <div class="card p-6 text-center">

                    {{ $skill }}

                </div>

            @endforeach

        </div>

    </div>

</section>