<div class="card py-3 px-5 mt-4">
    <div class="mx-auto">
        <h4 class="mb-4">Recent Activity</h4>
        @forelse ($dates as $date => $activities)
            <div class="d-flex">
                <div class="d-flex align-items-start rounded">
                    @foreach (array_slice(explode('-', $date), 1,3) as $data)
                        <div class="bg-white shadow px-2 mr-2 rounded-20 border border-primary">
                            {{$data}}
                        </div>
                    @endforeach
                </div>
                <div class="w-100">
                    @foreach ($activities as $activity)
                        <div class="position-relative card border-0 shadow mb-3 rounded-20">
                            @if ($activity->subject_type == 'App\Post')
                                <x-activity.post :activity="$activity"></x-activity.post>

                            @elseif ($activity->subject_type == 'App\User') 
                                <x-activity.user :activity="$activity"></x-activity.user>

                            @elseif ($activity->subject_type == 'App\Comment') 
                                <x-activity.comment :activity="$activity"></x-activity.comment> 
                            @endif
                            <i class="position-absolute text-primary fas fa-dot-circle timeline-icon"></i>
                            <div class="position-absolute timeline {{$loop->last ? 'h-0' : 'h-100'}}"></div>
                        </div>      
                    @endforeach
                </div>
            </div>
        @empty
            There is no activity yet!
        @endforelse
    </div>
</div>