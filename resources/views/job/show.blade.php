<x-layout>
    <x-breadcrumbs class="mb-2" 
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job >
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{$job->employer->company_name}} Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob)
            <a href="{{ route('jobs.show', $otherJob) }}">
                <div class="mb-4 flex justify-between">
                    <div class="text-slate-700">
                        {{$otherJob->title}} - 
                        <span class="text-slate-500 text-xs">{{$otherJob->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="text-xs">${{number_format($otherJob->salary)}}</div>
                </div>
            </a>
            @endforeach
        </div>
    </x-card>
</x-layout>