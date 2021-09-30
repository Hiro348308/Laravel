<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
public function add()
{ 
  return view('admin.profile.create');
}
public function edit()
{
    return view('admin.profile.edit');
}
public function create(Request $request)
{

  // 以下を追記
  // Varidationをおこなう
  $this->validate($request, Profile::$rules);

  $profile = new Profile;
  $form = $request->all();

  // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
  if (isset($form['image'])) {
    $path = $request->file('image')->store('public/image');
    $news->image_path = basename($path);
  } else
  public function add()
 {
          $profile->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
  }

}