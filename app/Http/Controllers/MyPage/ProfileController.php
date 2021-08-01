<?php

namespace App\Http\Controllers\MyPage;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Mypage\Profile\EditRequest;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\PrimaryCategory;

class ProfileController extends Controller
{
    
    
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    public function showProfileEditForm()
     {
        $categories = PrimaryCategory::query()
             ->with([
                 'secondaryCategories' => function ($query) {
                     $query->orderBy('sort_no');
                 }
             ])
             ->orderBy('sort_no')
             ->get();

        return view('mypage.profile_edit_form')
             ->with('user', Auth::user())
             ->with('categories', $categories);
    }

     public function editProfile(EditRequest $request)
     {
         $user = Auth::user();
 
         $user->name = $request->input('name');

         if ($request->has('avatar')) {
            $fileName = $this->saveAvatar($request->file('avatar'));
            $user->avatar_file_name = $fileName;
        }


         $user->save();
 
         return redirect()->back()
             ->with('status', 'プロフィールを変更しました。');
     }


     public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }
    
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

     /**
      * アバター画像をリサイズして保存します
      *
      * @param UploadedFile $file アップロードされたアバター画像
      * @return string ファイル名
      */
      private function saveAvatar(UploadedFile $file): string
      {
          $tempPath = $this->makeTempPath();
  
          Image::make($file)->fit(200, 200)->save($tempPath);
  
          $filePath = Storage::disk('public')
              ->putFile('avatars', new File($tempPath));
  
          return basename($filePath);
      }

       /**
      * 一時的なファイルを生成してパスを返します。
      *
      * @return string ファイルパス
      */
     private function makeTempPath(): string
     {
         $tmp_fp = tmpfile();
         $meta   = stream_get_meta_data($tmp_fp);
         return $meta["uri"];
     }
}
