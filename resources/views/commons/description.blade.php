@extends('layouts.app')

@section('content')
<style>
    h2 {
        color: gray;
    }
    ul li {
  padding-top:10px;
  padding-bottom:10px;
}
.box2 {
    padding: 0.5em 1em;
    margin: 2em 0;
    font-weight: bold;
    color: #6091d3;/*文字色*/
    background: #FFF;
    border: solid 3px #6091d3;/*線*/
    border-radius: 10px;/*角の丸み*/
}
.box2 p {
    margin: 0; 
    padding: 0;
}
</style>
<head>
    <h2><p>このサイトはプログラミング初学者が作成したポートフォリオ作成サイトになります。<br/>
        以下の機能を実装してあります。</p>
    </h2>
    <h3>
        <div class="box2">
        <ul>
            <li>ユーザーのログイン機能</li>
            <li>タスクを作成するとカレンダー上にイベントが表示されます<br/>また、イベントをクリックすると詳細画面へ飛びます</li>
            <li>他ユーザーのフォロー機能<br/>（現在はフォローしたユーザーを一覧表示できる機能しかありません）</li>
            <li>他ユーザーのスケジュールイベントの閲覧と共有設定</br>（共有すると自分のスケジュール画面にイベントが反映されます)</li>
            <li>共有しているタスクの一覧表示</li>
            <li>ユーザーの登録削除機能</li>
        </ul>
        </div>
    </h3>
</head>
<a>GitHub公開→</a><a href="https://github.com/yuji1291/connect.git" target="_blank">リンク</a>
@endsection


