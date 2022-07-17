<?php

namespace App\Http\Controllers\Account;

use App\Category;
use App\CategoryCircles;
use App\Circle;
use App\Form_type;
use App\Http\Requests\CategoryRequest;
use App\MainCategory;
use App\ProcedureType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Session;


class CategoryController extends BaseController
{

    public function index(Request $request)
    {
        if (auth()->user()->account->circle->id == 1) {
            $items = Category::whereRaw("true");
        } else {
            $items = auth()->user()->account->circle->category()->whereRaw("true");
        }

        if ($items == null) {
            session::flash('msg', 'w:نأسف لا يوجد بيانات لعرضها');
            return redirect('/account/account');
        }

        if (!is_null($request['is_complaint'])) {
            $items = $items->where(['is_complaint' => $request['is_complaint']]);
        }

        if (!is_null($request['main_category_id'])) {
            $items = $items->where(['main_category_id' => $request['main_category_id']]);
        }

        if (!is_null($request['citizen_benefic'])) {

            if ($request['citizen_benefic'] == 1) {
                $items = $items->where(['citizen_show' => 1]);
            }

            if ($request['citizen_benefic'] == 0) {
                $items = $items->where(['benefic_show' => 1]);
            }

        }

        if (!is_null($request['category_id'])) {
            $items = $items->where(['categories.id' => $request['category_id']]);
        }

        if ($request['theaction'] == 'search') {
            $items = $items->orderBy("categories.id", 'asc')->paginate(5);
            $items->appends([
                "theaction" => "search",
                "is_complaint" => $request['is_complaint'],
                "main_category_id" => $request['main_category_id'],
                "citizen_benefic" => $request['citizen_benefic'],
                "category_id" => $request['category_id'],
            ]);

        } else {
            $items = "";
        }
        $mainCategories = MainCategory::get();
        $form_type = Form_type::get();
        $categories = auth()->user()->account->circle->category()->get();

        return view("account.category.index", compact('items', 'mainCategories', 'form_type', 'categories'));
    }


    public function create()
    {

        $mainCategories = MainCategory::get();
        $circles = Circle::orderBy('id', 'asc')->get();
        $procedureTypes = ProcedureType::get();
        return view("account.category.create", compact('mainCategories', 'circles', 'procedureTypes'));
    }


    public function store(CategoryRequest $request)
    {
        $mainCategories = MainCategory::all();
        $isExists = Category::where("name", $request["name"])->count();
        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقاً");
            return redirect("/account/category/create")->withInput();
        }

        $category_circles = $request->input('category_circle');
        if (empty($category_circles)) {
            Session::flash("msg", "e: المستويات الإدارية غير محددة، يرجى تحديدها بالشكل الصحيح.");
            return redirect("/account/category/create")->withInput();
        }
        $items = new Category();
        $items->main_category_id = $request->input('main_category_id');
        $items->main_suggest_id = $request->input('main_suggest_id');

        if ($request['citizen_show'] == 'citizen_show')
            $request['citizen_show'] = 1;
        else
            $request['citizen_msg'] = ' ';

        if ($request['citizen_show'] == 'benefic_show')
            $request['benefic_show'] = 1;
        else
            $request['benefic_msg'] = ' ';

        $cat_id = $items::create($request->all())->id;

        $category_circles = $request->input('category_circle');
        if (!empty($category_circles)) {
            foreach ($category_circles as $category_circle) {

                $Category = new CategoryCircles();
                $Category->category_id = $cat_id;
                $Category->main_category = $request->input('main_category_id');
                $Category->sub_category = $cat_id;
                $arr = explode("_", $category_circle, 2);
                $Category->procedure_type = $arr[0];
                $Category->circle_id = substr($category_circle, strpos($category_circle, "_") + 1);
                $Category->save();
            }
        }

        $circles = Circle::orderBy('id', 'asc')->get();
        $procedureTypes = ProcedureType::get();

        $test = \DB::table("circle_categorie")->insertGetID(["circle_id" => 1,
            "category_id" => $cat_id]);

        session::flash('msg', 's:تمت عميلة الإضافة بنجاح');
        return view('account.category.create', ['mainCategories' => $mainCategories, 'circles' => $circles, 'procedureTypes' => $procedureTypes]);
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        if (auth()->user()->account->circle->id == 1) {
            $item = Category::find($id);
        } else {
            $item = auth()->user()->account->circle->category->find($id);
        }

        $mainCategories = MainCategory::get();
        $circles = Circle::orderBy('id', 'asc')->get();
        $procedureTypes = ProcedureType::get();

        $CategoryCircles = CategoryCircles::where(['category_id' => $id])->get();

//        if($item == NULL || $item->id ==1  ||$item->id == 2){
        if ($item == NULL) {
            session::flash('msg', 'w:الرجاء التأكد من الرابط المطلوب');
            return redirect('/account/category');
        } else {
            return view('account.category.edit', compact('item', 'mainCategories', 'circles', 'procedureTypes', 'CategoryCircles'));
        }
    }

    public function showcircle($id)
    {
        $item = auth()->user()->account->circle->category->find($id);
        $maimCategories = MainCategory::whereIsComplaint(1)->get();
        $maimSuggest = MainCategory::whereIsComplaint(0)->get();
        $circles = Circle::orderBy('id', 'asc')->get();
        $procedureTypes = ProcedureType::get();

        $CategoryCircles = CategoryCircles::where(['category_id' => $id])->get();

//        if($item == NULL || $item->id ==1  ||$item->id == 2){
        if ($item == NULL) {
            session::flash('msg', 'w:الرجاء التأكد من الرابط المطلوب');
            return redirect('/account/category');
        } else {
            return view('account.category.showcircle', compact('item', 'maimCategories', 'maimSuggest', 'circles', 'procedureTypes', 'CategoryCircles'));
        }
    }

    public function update(CategoryRequest $request, $id)
    {

        $isExists = auth()->user()->account->circle->category()->where("name", $request["name"])->where("categories.id", "!=", $id)->count();

        if ($isExists) {
            Session::flash("msg", "e:القيمة المدخلة موجودة مسبقاً");
            return redirect("/account/category/$id/edit");
        }
        $item = Category::find($id);

//        if ($item == NULL || $item->id ==1  ||$item->id == 2) {
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/category");
        }


        if ($request->citizen_show == 1) {
            $item->citizen_show = 1;
        } else {
            $item->citizen_show = 0;
        }

        if ($request->benefic_show == 1) {
            $item->benefic_show = 1;
        } else {
            $item->benefic_show = 0;
        }

        $item->update($request->all());

        CategoryCircles::where(['category_id' => $id])->delete();
        $category_circles = $request->input('category_circle');
        if (!empty($category_circles)) {
            foreach ($category_circles as $category_circle) {
                $Category = new CategoryCircles();
                $Category->category_id = $id;
                $Category->main_category = $request->input('main_category_id');
                $Category->sub_category = $id;
                $arr = explode("_", $category_circle, 2);
                $Category->procedure_type = $arr[0];
                $Category->circle_id = substr($category_circle, strpos($category_circle, "_") + 1);
                $Category->save();
            }
        }
        session::flash('msg', 's:تمت عميلة التعديل بنجاح');
        return redirect('/account/category');
    }

    public function updateCategoryCircles(Request $request, $id)
    {

        $item = Category::find($id);
        if ($item == NULL) {
            Session::flash("msg", "e:الرجاء التاكد من الرابط المطلوب");
            return redirect("/account/category");
        }


        $category_circles = $request->input('category_circle');

        if (!empty($category_circles)) {
            CategoryCircles::where(['category_id' => $id])->delete();
            foreach ($category_circles as $category_circle) {
                $Category = new CategoryCircles();
                $Category->category_id = $id;
                $Category->main_category = $item->main_category_id;
                $Category->sub_category = $id;
                $arr = explode("_", $category_circle, 2);
                $Category->procedure_type = $arr[0];
                $Category->circle_id = substr($category_circle, strpos($category_circle, "_") + 1);
                $Category->save();
            }
        }
        session::flash('msg', 's:تمت عميلة التعديل بنجاح');
        return redirect('/account/category');
    }

    public function destroy($id)
    {
        $item = auth()->user()->account->circle->category->find($id);
        if ($item->form->first()) {
            Session::flash("msg", "e:لا يمكن حذف فئة عليها شكاوي");
            return redirect("/account/category");
        }
        $circlcat = DB::table('circle_categorie')->whereIn('category_id', [$item->id])->pluck('id');
        if (count($circlcat) > 0)
            DB::table('circle_categorie')->whereIn('id', $circlcat)->delete();

        $item->delete();
        Session::flash("msg", "تم حذف فئة بنجاح");
        return redirect("/account/category");


    }

    public function get_categories($is_complaint)
    {
        $Categories = MainCategory::select('id', 'name')->where('is_complaint', '=', $is_complaint)->get();
        return response()->json($Categories);
    }

}
