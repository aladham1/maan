<meta http-equiv='Content-Type' charset=utf-8 content='text/html'>


<style type="text/css">
    *, body,table,th,tr,td,tbody {
        font-family: 'examplefont', sans-serif;
        text-align: right;

    }

    div{
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .mo{
        background: #9cc2eb;
    }
    img{
        height: 150px;
        width: 250px;
        margin-right: 40%;
        margin-bottom: 20px;
    }
    h3{
        padding: 10px;
    }

    .accordion{
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: right;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>
<body>
<div class="container">

    <div>
        <img class="images" src="{{asset('public/uploads/w.PNG')}}">
    </div>

    <div class="row">
        <div>
            <button class="accordion">
                معلومات مقدم ال{{$form_type->find($type)->name}} الأساسية
            </button>
            <div class="panel" id="first_panel">
                <table class="table" style="width:100%;white-space:normal;">

                    <tr class="showdateciz">
                        <td>الاسم رباعي:</td>
                        <td>{{$item->citizen->first_name ." ".$item->citizen->father_name." ".$item->citizen->last_name}}</td>
                        <td>رقم الهوية/جواز السفر:</td>
                        <td>{{$item->citizen->id_number}}</td>
                    </tr>

                    <tr class="showdateciz">
                        <td>المحافظة:</td>
                        <td>{{$item->citizen->governorate}}</td>
                        <td>المنطقة :</td>
                        <td>{{$item->citizen->city}}</td>
                    </tr>

                    <tr class="showdateciz">
                        <td>العنوان:</td>
                        <td colspan="3">{{$item->citizen->street}}</td>
                    </tr>

                    <tr class="showdateciz">
                        <td>رقم التواصل (1):</td>
                        <td>{{$item->citizen->mobile}}</td>
                        <td>رقم التواصل (2):</td>
                        <td>{{$item->citizen->mobile2}}</td>
                    </tr>

                    <tr>
                        <td>فئة مقدم {{$form_type->find($type)->name}}:</td>
                        <?php
                        $project_arr = array();
                        foreach ($item->citizen->projects as $project) {
                            array_push($project_arr, $project->id);
                        }
                        ?>
                        <td colspan="3">@if(!in_array($item->project->id,$project_arr)){{'غير مستفيد من مشاريع المركز'}}@else{{'مستفيد من مشاريع المركز '}}@endif</td>
                    </tr>

                    <tr>
                        <td>اسم المشروع:</td>
                        <td colspan="3">{{$item->project->name ." ".$item->project->code }}</td>
                    </tr>

                </table>
            </div>

          <hr>

            <button class="accordion">
                تفاصيل ال{{$form_type->find($type)->name}}
            </button>
            <div class="panel">
                <table class="table" style="width:100%;white-space:normal;">
                    <tr>
                        <td class="mo" colspan="2">الرقم المرجعي</td>
                        <td colspan="2">{{$item->id}}</td>
                    </tr>

                    <tr>
                        <td class="mo" colspan="2">طريقة الاستقبال</td>
                        <td colspan="2">{{$item->sent_typee->name}}</td>
                    </tr>

                    <tr>
                        <td class="mo" colspan="2">فئة ال{{$form_type->find($type)->name}}</td>
                        <td colspan="2">{{$item->category->name}}</td>
                    </tr>

                    <tr>
                        <td class="mo" colspan="2">موضوع ال{{$form_type->find($type)->name}}</td>
                        <td colspan="2">{{$item->form_type->name}} {{$item->title }}</td>
                    </tr>
                    <tr>
                        <td class="mo" colspan="2">محتوى ال{{$form_type->find($type)->name}}</td>
                        <td colspan="2">{{$item->content}}</td>
                    </tr>


                    <tr>
                        <td class="mo">تاريخ تقديم ال{{$form_type->find($type)->name}}</td>
                        <td>{{date('d-m-Y', strtotime( $item->created_at))}}</td>
                        <td class="mo">تاريخ تسجيل ال{{$form_type->find($type)->name}} علي النظام</td>
                        <td>{{date('d-m-Y', strtotime( $item->created_at))}}</td>
                    </tr>


                    <tr>
                        <td class="mo" colspan="2">المرفقات</td>
                        <td colspan="2"><?php
                            $form_files = \App\Form_file::where('form_id', '=', $item->id)->get();

                            if(!$form_files->isEmpty()){
                            ?>
                            <a class="btn btn-xs btn-primary" data-toggle="modal" id="smallButton"
                               data-target="#smallModal"
                               data-attr="{{ route('citizenshowfiles', $item->id) }}" title="اضغظ هنا">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php }else{?>
                            <a class="btn btn-xs btn-primary" title="لايوجد مرفقات لعرضها" disabled="disabled">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php } ?></td>
                    </tr>

                </table>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 style="color: red">عزيزي المواطن/ة في حال وجود أي استفسار أو اعتراض من طرفك حول محتوى الاقتراح أو الشكوى والرد عليه/ا يمكنك إعادة التواصل مع المركز على الرقم المجاني 1800900901</h4>
                </div>
            </div>
        </div>
    </div>

</div>
</body>



