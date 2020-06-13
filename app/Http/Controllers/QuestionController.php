<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QuestionController extends Controller
{

    public function createMCQPost(Request $request,$id){

        $this->validate($request,
            [
                'title' => 'required',
                'mark' => 'required',
            ], [
                'mark.required' => 'هذا الحقل مطلوب',
                'title.required' => 'هذا الحقل مطلوب',
            ]);


        $question=new Question();

        $question->exam_id=$id;
        $question->question=$request->title;
        $question->mark=$request->mark;
        $question->type='MCQ';

        if ($question->save()){
            $request->session()->put('PopSuccess', "تم إنشاء السؤال بنجاج قم بأضافة عناصر السؤال");
            return redirect('/teacher/question/'.$question->id.'/edit/MCQ');
        }

    }


    public function editMCQ($id){
        $question=Question::find($id);
        return view('Teacher.EditMCQ',['question'=>$question]);
    }
    public function updateMCQ( Request $request,$id ){

        $this->validate($request,
            [
                'title' => 'required',
                'mark' => 'required',
            ], [
                'mark.required' => 'هذا الحقل مطلوب',
                'title.required' => 'هذا الحقل مطلوب',
            ]);


        $question=Question::find($id);

        $question->question=$request->title;
        $question->mark=$request->mark;
        $question->type='MCQ';

        if ($question->update()){
            $request->session()->put('PopSuccess', "تم تعديل السؤال بنجاج ");
            return redirect('/teacher/question/'.$question->id.'/edit/MCQ');
        }
    }



    public function AddItemMCQ(Request $request,$id){


        $this->validate($request,
            [
                'item_title' => 'required',
            ], [
                'item_title.required' => 'هذا الحقل مطلوب',
            ]);


        $item=new QuestionItem();

        $item->question_id=$id;
        $item->type='MCQ';
        $item->title=$request->item_title;

        if ($request->is_right){
            $item->right_answer='1';
        }else{
            $item->right_answer='0';
        }

        if ($item->save()){
            $request->session()->put('PopSuccess', "تم إنشاء العنصر بنجاج ");
            return back();
        }

    }
    public function deleteItemMCQ($id){
            $item=QuestionItem::find($id);
            if ($item->delete()) {
                session()->put('PopSuccess', "تم حذف العنصر بنجاح");

                return back();
            }
    }



    public function EditItemMCQ(Request $request,$id){


        $this->validate($request,
            [
                'item_title' => 'required',
            ], [
                'item_title.required' => 'هذا الحقل مطلوب',
            ]);


        $item=QuestionItem::find($id);

        $item->type='MCQ';
        $item->title=$request->item_title;

        if ($request->is_right){
            $item->right_answer='1';
        }else{
            $item->right_answer='0';
        }

        if ($item->update()){
            $request->session()->put('PopSuccess', "تم تعديل العنصر بنجاج ");
            return back();
        }

    }
    public function createLinkedPost(Request $request,$id){

        $this->validate($request,
            [
                'title' => 'required',
                'mark' => 'required',
                'image' => 'nullable|mimes:jpg,jpeg,png,gif,bmp',
            ], [
                'mark.required' => 'هذا الحقل مطلوب',
                'title.required' => 'هذا الحقل مطلوب',
                'title.mimes' => 'هذا الملف غير صالح',
            ]);


        $question=new Question();

        $question->exam_id=$id;
        $question->question=$request->title;
        $question->mark=$request->mark;
        $question->type='Link';

        if ($question->save()){


            if ($request->hasFile('image')) {
                $Img = md5($request['image']->getClientOriginalName()) . '.' . $request['image']->getClientOriginalExtension();
                $request['image']->move(base_path('storage/app/Images/Question/Images/' . $question->id . '/'), $Img);
            }

            if (isset($Img)) {
                $question->image = $Img;
                $question->update();
            }

            $request->session()->put('PopSuccess', "تم إنشاء السؤال بنجاج قم بأضافة عناصر السؤال");
            return redirect('/teacher/question/'.$question->id.'/edit/Linked');
        }

    }


    public function editLinked($id){
        $question=Question::find($id);
        return view('Teacher.EditLinked',['question'=>$question]);
    }



    public function AddItemLinked(Request $request,$id,$type){




        if ($type =='Link1') {
            $this->validate($request,
                [
                    'Link1_item' => 'required',
                ], [
                    'Link1_item.required' => 'هذا الحقل مطلوب',
                ]);
        }
        if ($type =='Link2') {
            $this->validate($request,
                [
                    'Link2_item' => 'required',
                    'right_item' => 'required',
                ], [
                    'Link2_item.required' => 'هذا الحقل مطلوب',
                    'right_item.required' => 'هذا الحقل مطلوب',
                ]);
        }


        $item=new QuestionItem();
        $item->type=$type;
        $item->question_id=$id;


        if ($type =='Link1') {
            $item->right_answer='#';
            $item->title=$request->Link1_item;
        }else{
            $item->right_answer=$request->right_item;
            $item->title=$request->Link2_item;

        }


        if ($item->save()){
            $request->session()->put('PopSuccess', "تم إنشاء العنصر بنجاج ");
            return back();
        }

    }
    public function deleteItemLinked($id){
            $item=QuestionItem::find($id);
            if ($item->delete()) {
                session()->put('PopSuccess', "تم حذف العنصر بنجاح برجاء مراجعة العناصر المتعلقة به");

                return back();
            }
    }



    public function EditItemLinked(Request $request,$id){


        $this->validate($request,
            [
                'Link2_item' => 'required',
                'right_item' => 'required',
            ], [
                'Link2_item.required' => 'هذا الحقل مطلوب',
                'right_item.required' => 'هذا الحقل مطلوب',
            ]);


        $item=QuestionItem::find($id);

        $item->type='Link2';
        $item->title=$request->Link2_item;


            $item->right_answer=$request->right_item;


        if ($item->update()){
            $request->session()->put('PopSuccess', "تم تعديل العنصر بنجاج ");
            return back();
        }

    }


    public function updateLinked (Request $request,$id){

        $this->validate($request,
            [
                'title' => 'required',
                'mark' => 'required',
                'image' => 'nullable|mimes:jpg,jpeg,png,gif,bmp',
            ], [
                'mark.required' => 'هذا الحقل مطلوب',
                'title.required' => 'هذا الحقل مطلوب',
                'title.mimes' => 'هذا الملف غير صالح',
            ]);


        $question=Question::find($id);

        $question->question=$request->title;
        $question->mark=$request->mark;
        $question->type='Link';

        if ($question->update()){


            if ($request->hasFile('image')) {
                $Img = md5($request['image']->getClientOriginalName()) . '.' . $request['image']->getClientOriginalExtension();
                $request['image']->move(base_path('storage/app/Images/Question/Images/' . $question->id . '/'), $Img);
            }

            if (isset($Img)) {
                File::delete(base_path('storage/app/Images/Question/Images/' . $question->id  ).'/'.$question->image);

                $question->image = $Img;
                $question->update();
            }

            $request->session()->put('PopSuccess', "تم تعدي السؤال بنجاح");
            return redirect('/teacher/question/'.$question->id.'/edit/Linked');
        }

    }


    public function createTFPost(Request $request,$id){

        $this->validate($request,
            [
                'title' => 'required',
                'mark' => 'required',
            ], [
                'mark.required' => 'هذا الحقل مطلوب',
                'title.required' => 'هذا الحقل مطلوب',
            ]);


        $question=new Question();

        $question->exam_id=$id;
        $question->question=$request->title;
        $question->mark=$request->mark;
        $question->right_answer=$request->right_answer;
        $question->type='TF';
        if ($question->save()){
            $request->session()->put('PopSuccess', "تم إنشاء السؤال بنجاج ");
            return redirect('/teacher/exam/'.$id.'/create/question');
        }

    }

    public function editTF($id){
        $question=Question::find($id);
        return view('Teacher.EditTF',['question'=>$question]);
    }

    public function updateTF(Request $request,$id){

        $this->validate($request,
            [
                'title' => 'required',
                'mark' => 'required',
            ], [
                'mark.required' => 'هذا الحقل مطلوب',
                'title.required' => 'هذا الحقل مطلوب',
            ]);


        $question=Question::find($id);

        $question->question=$request->title;
        $question->mark=$request->mark;
        $question->right_answer=$request->right_answer;
        if ($question->save()){
            $request->session()->put('PopSuccess', "تم تعديل السؤال بنجاج ");
            return redirect('/teacher/exam/'.$question->exam_id.'/create/question');
        }

    }
    public function delete($id){
        $question=Question::find($id);

        if ($question->delete()) {
            session()->put('PopSuccess', "تم حذف السؤال بنجاح");

            return back();
        }
    }


}
