<div class="row">
    <div class="col-md-12">

        <iframe src="{{public_path(). "/uploads/appendix/".$item->appendix_file}}"
                frameborder="0" style="width:100%;min-height:640px;"></iframe>

        <embed name="plugin" src="{{url('/')}}/{{ Storage::disk('local')->url($file->file_name)}}" type="application/pdf">



        {{--        <ul class="list-styled" style="direction:rtl;text-align:right;">--}}
{{--            <li>--}}
{{--                <h4> ملحق {{$item->appendix_name}}  </h4>--}}
{{--                <a  style="text-decoration: none;color: #3f688d;"--}}
{{--                    href="{{ route('appendixshow', $item->id) }}">--}}
{{--                    تحميل--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
    </div>
</div>



