@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                最終確認
            </div>

            <div class="panel-body">
                本当にあなたのアカウントを削除してもよろしいでしょうか？<br>
                削除してしまうとユーザ情報及び紐づくタスクなども消えてしまい、復旧することができなります。

                <div class="row">
                    <div class="col-md-12" style="margin-top:3em;">
                        <form action="{{ route('account.close') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-block btn-danger">
                                こんなサービス辞めてやる！！
                            </button>
                        </form>
                    </div>

                    <div class="col-md-12" style="margin-top:1em;">
                        <a href="{{ route('home') }}" class="btn btn-block btn-default">
                            まだ続ける
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endsection 