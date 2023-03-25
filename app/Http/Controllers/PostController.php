<?php

namespace App\Http\Controllers;

use view;
use Storage;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //show data to user
    public function create() {
        $posts = Post::when(request('searchKey'),function($query){
            $key = request('searchKey');
            $query->orWhere('title','like','%'.$key.'%')
            ->orWhere('description','like','%'.$key.'%')
            ->orWhere('name','like','%'.$key.'%');
        })->orderBy('created_at','desc')->paginate(3);
        return view('home',compact('posts'));
    }

    //create user's post
    public function postCreate(Request $request) {

        $this->validationCheck($request);

        $data = $this->getData($request);


        if ($request->hasFile('userImage')) {
            $imageName = uniqid().'_ucsy_img_'.$request->file('userImage')->getClientOriginalName();
            $request->file('userImage')->storeAs('public',$imageName);
            $data['image'] = $imageName;
        }

        Post::create($data);

        return back()->with(['postAlert'=>' တင်ခြင်း အောင်မြင်ပါသည်။']);
    }

    //viewing full information
    public function view($id) {
        $post = Post::where('id',$id)->first();
        return view('viewPage',compact('post'));
    }

    //delete post
    public function delete($id) {
        Post::where('id',$id)->delete();
        return back()->with(['deleteAlert'=>' ဖျက်ခြင်းအောင်မြင်ပါသည်။']);
    }

    //edit||update user's information
    public function update($id) {
        $post = Post::where('id',$id)->first();

        return view('update',compact('post'));
    }

    //update user's edited data
    public function updateData(Request $request,$id) {
        $this->validationCheck($request,$id);
        $updateData = $this->getData($request);
        if ($request->hasFile('userImage')) {
            $oldImageName = Post::select('image')->where('id',$id)->first()->toArray();
            $oldImageName =$oldImageName['image'];

            if($oldImageName != null) {
                Storage::delete('public/'.$oldImageName);
            }

            $imageName = uniqid().'_ucsy_img_'.$request->file('userImage')->getClientOriginalName();
            $request->file('userImage')->storeAs('public',$imageName);
            $updateData['image'] = $imageName;
        }
        Post::where('id',$id)->update($updateData);
        return redirect()->route('user#home')->with(['updateAlert'=>' ပြင်ဆင်ခြင်း အောင်မြင်ပါသည်။']);
    }

    //check data validate for post create and update

    private function validationCheck($request,$id=0) {
        $validationRule = [
            'userName' => 'required|max:30|min:3',
            'userTitle' => 'required|max:50|unique:posts,title,'.$id,
            'userImage' => 'mimes:jpg,jpeg,png',
            'userDescription' => 'required'
        ];

        $validationMessage = [
            'userName.required'=> 'အမည် ထည့်သွင်းရန် လိုအပ်ပါသည်။',
            'userName.min' => 'စာလုံးရေ လိုနေပါသည်။ အမည် အနည်းဆုံး ၃ လုံး ရှိရပါမည်။',
            'userName.max' => 'စာလုံးရေ ပိုနေပါသည်။အမည် အများဆုံး ၃၀ လုံး ဖြစ်ရပါမည်။',
            'userTitle.required' => 'ခေါင်းစဉ် ထည့်သွင်းရန် လိုအပ်ပါသည်။',
            'userTitle.max' => 'စာလုံးရေ ပိုနေပါသည်။အမည် အများဆုံး ၅၀ လုံး ဖြစ်ရပါမည်။',
            'userTitle.unique' => 'ခေါင်းစဉ် တူနေပါသည်။',
            'userImage.mimes' => 'ပုံသည် jpg, jpeg, png ဖြစ်ရပါမည်။',
            'userDescription.required' => 'အကြောင်းအရာ ထည့်သွင်းရန် လိုအပ်ပါသည်။'
        ];

        Validator::make($request->all(),$validationRule,$validationMessage)->validate();
    }

    //get data from input
    private function getData($request) {
        return [
            'name' => $request->userName,
            'title' => $request->userTitle,
            'description' => $request->userDescription
        ];
    }
}


