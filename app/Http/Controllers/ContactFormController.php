<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormService;
use App\Http\Requests\StoreContactRequest;


class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = ContactForm::search($search);

        // $contacts = ContactForm::select('id', 'name', 'title', 'created_at')->get(); // 全件取得
        // ページネーション
        $contacts = $query->select('id', 'name', 'title', 'created_at')->paginate(20);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 新規登録
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 新規登録で入力された値をDBに保存する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        // dd($request, $request->contact);

        ContactForm::create([
            'name'    => $request->name,
            'title'   => $request->title,
            'email'   => $request->email,
            'url'     => $request->url,
            'gender'  => $request->gender,
            'age'     => $request->age,
            'contact' => $request->contact,
        ]);
        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * 詳細画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactForm::find($id);

        // 性別が返ってくる
        $gender = CheckFormService::checkGender($contact);

        // 年齢が返ってくる
        $age = CheckFormService::checkAge($contact);

        return view('contacts.show', compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 編集画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 登録内容を更新する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = ContactForm::find($id);

        $contact->name    = $request->name;
        $contact->title   = $request->title;
        $contact->email   = $request->email;
        $contact->url     = $request->url;
        $contact->gender  = $request->gender;
        $contact->age     = $request->age;
        $contact->contact = $request->contact;

        $contact->save();

        return to_route('contacts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * 投稿を削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();

        return to_route('contacts.index');
    }
}
