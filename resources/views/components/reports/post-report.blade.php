<li>
    {{$report->reporter->name}} reported to act on {{$report->subject->title}} 
    reason: {{$report->description}} {{$report->created_at->diffForHumans(null, true, true)}}
</li>