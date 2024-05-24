<x-layout>
    <x-breadcrumbs class="mb-2" 
    :links="['Jobs' => route('jobs.index')]" />

    <x-card class="mb-4 text-sm">
        <form x-ref="filters" id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="">
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" form-id="filters"/>
                </div>
                <div class="">
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From" form-id="filters"/>
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To" form-id="filters"/>
                    </div>
                </div>
                <div class="">
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(array_map('ucfirst',\App\Models\Job::$experience), \App\Models\Job::$experience)" />
                </div>
                <div class="">
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>
            </div>

            <x-button class="w-full">Filter</x-button>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card :$job>
            <div class="">
                <x-link-button :href="route('jobs.show', $job)" >Read More</x-link-button> 
                @can('apply', $job)
                    <x-link-button :href="route('job.application.create', $job)">Apply</x-link-button>
                @else
                    <div class="text-center text-sm font-medium text-slate-500">You already applied to this job</div>
                @endcan
            </div>
        </x-job-card>
    @endforeach
</x-layout>