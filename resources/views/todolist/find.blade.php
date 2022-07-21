
@extends('layouts.default')
<style>
    /* 共通 */
    input, select{
        outline: none;
    }

    a{
        text-decoration: none;
    }

    /* 先頭の入力 */

    .content{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .content__area{
        background-color: #ffffff;
        border : 1px white solid ;
        border-radius: 10px;
        padding: 5px 25px ;
        width: 50%;
    }

    .content__area-head{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .content__area-head-tle{
        font-size: 25px ;
        font-weight: bold ;
        text-align: left;
    }

    .content__area-head-dsp{
        font-size: 16px;
        text-align: right;
        width: 62%;
        display: inline-block;
    }

    .content__area-head-btn{
        padding: 8px 12px;
        background-color: white;
        border: 2px red solid ;
        border-radius: 5px;
        color: red;
        margin-left: 1%;
    }

    .content__area-head-btn:hover{
        background: red;
        color: white;
    }

    .content__area-flex{
        margin-top: 2px;
        display: flex;
        justify-content: space-between ;
    }

    .content__area-flex-inp{
        font-size: 16px;
        border: 2px #dcdcdc solid;
        border-radius: 7px ;
        width: 77%;
        height: 40px;
    }

    .content__area-flex-select{
        font-size: 14px;
        border: 1px #d0d0d0 solid;
        border-radius: 5px ;
        width: 60px;
        height: 40px;
        text-align: center;
        vertical-align: middle;
        box-shadow: 1px 1px 0px 0px #f0f0f0 ;
        margin: 0 1% ;
    }

    .content__area-flex-btn{
        color: orchid ;
        font-size: 12px;
        font-weight: bold;
        background: #ffffff;
        padding: 7px 15px;
        border: 2px orchid solid ;
        border-radius: 5px;
    }

    .content__area-flex-btn:hover{
        color: white;
        background: orchid;
    }

    /* 一覧の表示1 */
    .content__area-tbl{
        width: 98%;
        margin: 25px auto;
    }

    .content__area-tbl tr{
        height: 45px;
        vertical-align: middle ;
    }

    .content__area-tbl th:nth-child(1) {
        text-align:center;
        font-weight: bold ;
        width: 30%;
    }

    .content__area-tbl th:nth-child(2) {
        text-align:center;
        font-weight: bold ;
        width: 35%;
    }

    .content__area-tbl th:nth-child(3) {
        text-align:center;
        font-weight: bold ;
        width: 12%;
    }

    .content__area-tbl th:nth-child(4) {
        text-align:center;
        font-weight: bold ;
        width: 12%;
    }
    .content__area-tbl th:nth-child(5) {
        text-align:center;
        font-weight: bold ;
    }

    .content__area-tbl td {
        text-align: center;
    }

    .content__area-tbl td input{
        border: 1px #d0d0d0 solid;
        border-radius: 3px;
        font-size: 14px;
        height: 30px ;
        width: 96%;
    }

    .content__area-tbl td select{
        font-size: 14px;
        border: 1px #d0d0d0 solid;
        border-radius: 5px ;
        width: 60px;
        height: 30px;
        text-align: center;
        vertical-align: middle;
        box-shadow: 1px 1px 0px 0px #f0f0f0 ;
        margin: 0 1% ;
    }

    .content__area-tbl-detail-btn1{
        background: white ;
        border: 2px #f6837d solid;
        border-radius: 5px;
        text-align: center;
        color: #f6837d;
        font-size: 12px;
        font-weight: bold ;
        padding: 9px 15px;
    }

    .content__area-tbl-detail-btn1:hover{
        background: #f6837d ;
        color: white;
    }

    .content__area-tbl-detail-btn2{
        background: white;
        border: 2px #64fcd4 solid;
        border-radius: 5px;
        text-align: center;
        color: #64fcd4;
        font-size: 12px;
        font-weight: bold ;
        padding: 9px 15px;
    }

    .content__area-tbl-detail-btn2:hover{
        background: #64fcd4;
        color: white;
    }

    .content__area-bkbtn {
        display: inline-block;
        margin-bottom: 20px;
    }

    .content__area-bkbtn a{
        background: white;
        border: 2px gray solid;
        border-radius: 5px;
        color: gray;
        font-size: 12px;
        font-weight: bold ;
        padding: 7px 15px;
    }

    .content__area-bkbtn a:hover{
        background: gray;
        color: white;
    }

</style>
@section('title', 'COACHTECH')

@section('content')
<div class="content">
    <div class="content__area">
        <form>
            <div class="content__area-head">
                <h1 class="content__area-head-tle">タスク検索</h1>
                <p class="content__area-head-dsp">「{{$user->name}}」でログイン中</p>
                <button type="submit" formaction="./logout" class="content__area-head-btn" formmethod="post">ログアウト</button>
            </div>
            @csrf
             <div class="content__area-flex">
               <input name="keyword" class="content__area-flex-inp" maxlenght="20">
                <select name="task_id" class="content__area-flex-select">
                    <option value="" selected></option>
                @foreach($tasks as $task)
                    <option value="{{$task->id}}">{{$task->name}}</option>
                @endforeach
                </select>
                <button type="submit" class="content__area-flex-btn" action="search" formmethod="get">検索</button>
            </div>
        </form>

        <table class="content__area-tbl">
            <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>タグ</th>
                <th>更新</th>
                <th>削除</th>
            </tr>
            @foreach ($todolists as $todolist)
            <tr>
                <form class="content__area-table-detail" method="post" >
                    <td>
                        {{$todolist->created_at}}
                        <input type="hidden" name="id" value="{{$todolist->id}}">
                        <input type="hidden" name="user_id" value="{{$todolist->user_id}}">
                        @csrf
                    </td>
                    <td>
                        <input type="text" name="todo_memo" value="{{$todolist->todo_memo}}" maxlength="20">
                    </td>
                    <td>
                        <select name="task_id">
                            @foreach($tasks as $task)
                                @if($task->id == $todolist->task_id)
                            <option value="{{$task->id}}" selected>{{$task->name}}</option>
                                @else
                            <option value="{{$task->id}}">{{$task->name}}</option>
                                @endif
                            @endforeach
                        </select>                             
                    </td>
                    <td>
                        <button type="submit" formaction="update"  class="content__area-tbl-detail-btn1">更新</button>
                    </td>
                    <td>
                        <button type="submit" formaction="remove" class="content__area-tbl-detail-btn2" >削除</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </table>

        <div class="content__area-bkbtn"><a href="/">戻る</a></div>
    </div>
</div>
@endsection
