<div class="row">
    <div class="col-md-12">
        <h4 style="text-align: center;color: #c86068;"> مرفقات {{$form_type->find($type)->name}} رقم {{$item->id}}</h4>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <ul class="list-styled" style="direction:rtl;text-align:right;">
        @foreach($form_files as $follow_file)
            <li>
                <a  style="text-decoration: none;color: #3f688d;" target="_blank"
                    href="{{asset('/uploads/'.$follow_file['name'])}}">
                    مرفقات {{$form_type->find($type)->name}} رقم ({{$item->id}}) – {{" ".strtotime($follow_file->created_at)}}
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>



