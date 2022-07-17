<div class="alert alert-info">
    <strong>المواطن {{$item->full_name}} مستفيد من مشروع: </strong>
    <ul style="padding-right:15px;">
        @foreach($item->projects as $project )
            <li>{{ $project->name }}</li>
        @endforeach
    </ul>
</div>
