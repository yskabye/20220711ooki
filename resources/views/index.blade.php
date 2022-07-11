@extends('layouts.default')
<style>
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

    .content__area-tle{
        font-size: 25px ;
        font-weight: bold ;
        text-align: left;
    }

    .content__area-flex{
        margin-top: -10px;
        display: flex;
        justify-content: space-between ;
    }

    .content__area-flex-inp{
        font-size: 16px;
        border: 2px #dcdcdc solid;
        border-radius: 7px ;
        width: 80%;
        height: 40px;
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
        width: 95%;
        margin: 25px 5% 5%;
    }

    .content__area-tbl tr{
        height: 45px;
        vertical-align: middle ;
    }

    .content__area-tbl th:nth-child(1) {
        text-align:center;
        font-weight: bold ;
        width: 32%;
    }

    .content__area-tbl th:nth-child(2) {
        text-align:center;
        font-weight: bold ;
        width: 40%;
    }

    .content__area-tbl th:nth-child(3) {
        text-align:center;
        font-weight: bold ;
    }

    .content__area-tbl th:nth-child(4) {
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
        height: 25px ;
        width: 85%;
    }

    .content__area-tbl-detail-btn1{
        background: white ;
        border: 2px #f6837d solid;
        border-radius: 5px;
        text-align: center;
        color: #f6837d;
        font-size: 12px;
        font-weight: bold ;
        padding: 7px 15px;
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
        padding: 7px 15px;
    }

    .content__area-tbl-detail-btn2:hover{
        background: #64fcd4;
        color: white;
    }
</style>
@section('title', 'COACHTECH')

@section('content')
<div class="content">
    <div class="content__area">
        <h1 class="content__area-tle">Todo List</h1>
        <form class="content__area-flex" action="./add" method="post">
            @csrf
            <input name="todo_memo" class="content__area-flex-inp" maxlenght="20">
            <button type="submit" class="content__area-flex-btn">追加</button>
        </form>

        <table class="content__area-tbl">
            <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
            </tr>
            @foreach ($todolists as $todolist)
            <tr>
                <form class="content__area-table-detail" method="post" >
                    <td>
                        {{$todolist->created_at}}
                        <input type="hidden" name="id" value="{{$todolist->id}}">
                        @csrf
                    </td>
                    <td>
                        <input type="text" name="todo_memo" value="{{$todolist->todo_memo}}" maxlength="20">
                    </td>
                    <td>
                        <button type="submit" formaction="./update"  class="content__area-tbl-detail-btn1">更新</button>
                    </td>
                    <td>
                        <button type="submit" formaction="./remove" class="content__area-tbl-detail-btn2" >削除</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
