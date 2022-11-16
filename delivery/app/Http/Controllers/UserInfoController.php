<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;


class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('UserInfo\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loggedUserId = 1;
        try{
            $userInfos = new UserInfo();
            $userInfos->Users_id = 1;
            $userInfos->status = 'A';
            $userInfos->profileImg = $request->profileImg;
            $userInfos->dataNasc = $request->dataNasc;
            $userInfos->genero = $request->genero;
            $userInfos->save();
        }catch(\Throwable $th){
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
        $userInfo = UserInfo::where('Users_id', $loggedUserId)->first();
        return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["Informação cadastrada com sucesso", "success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $userInfo = UserInfo::where('Users_id', $id)->first();
            if(isset($userInfo)){
                // print_r($userInfo[0]);
                return view("Userinfo/show") -> with ("userInfo", $userInfo);
            }
            return view("UserInfo/create")->with("message", ["Informação não encontrada", "warning"]);
        } catch(\Throwable $th){
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $userInfo = UserInfo::find($id);
            if( isset($userInfo) ){
                return view("UserInfo/edit")->with("userInfo", $userInfo);
            }
            return view("UserInfo/create")->with("message", ["Informação não encontrada", "warning"]);
        } catch(\Throwable $th){
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $loggedUserId = 1;
            $userInfo = UserInfo::where('Users_id', $id)->first();
            if( isset($userInfo) ){
                $userInfo->Users_id = $loggedUserId;
                $userInfo->status = 'A';
                $userInfo->profileImg = $request->profileImg;
                $userInfo->dataNasc = $request->dataNasc;
                $userInfo->genero = $request->genero;
                $userInfo->update();
            }
            $userInfo = UserInfo::where('Users_id', $loggedUserId)->first();
            return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["Informação atualizada com sucesso", "success"]);            
        }catch(\Throwable $th){
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $userInfo = UserInfo::where('Users_id', $id)->first();
            if( isset($userInfo) ){
                $userInfo->delete();
                return view("UserInfo/create")->with("message", ["Informação removida com sucesso", "success"]);
            }
            return view("UserInfo/create")->with("message", ["Informação não encontrada", "warning"]);
        } catch (\Throwable $th){
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
    }
}
