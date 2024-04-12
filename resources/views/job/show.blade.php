<x-layout>
    <x-breadcrumbs class="mb-2" 
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job />
</x-layout>