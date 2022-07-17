<div class="row">
    <div class="col-md-12">
        @foreach($form_files as $follow_file)
            <div style="direction:rtl;text-align:right;">
                <h4 style="direction:rtl;text-align:right;">
                    <a target="_blank" href="{{asset('/uploads/'.$follow_file['name'])}}">
                        يمكنك تحميل : {{$follow_file->name}}</a>
                </h4>
            </div>
            <p style="direction:ltr;text-align:left;">
                {{" ".$follow_file->created_at}}
            </p>
            <hr style="border:1px solid #CCC">
        @endforeach
    </div>
</div>



