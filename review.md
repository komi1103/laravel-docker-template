# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
todosテーブルのレコードを全件取得する
⇒SELECT文

### Todoモデルのallメソッドの返り値は何か
Illuminate\Database\Eloquent\Collectionクラスのインスタンス
Illuminate\Database\Eloquent\Collection {#257 ▼
  #items: array:2 [▼
    0 => App\Todo {#258 ▶}
    1 => App\Todo {#259 ▶}
  ]
}

### 配列の代わりにCollectionクラスを使用するメリットは
Collectionクラス：配列操作に特化したクラスで5つのTodoインスタンスが格納されている
⇒Todoインスタンスはtodosテーブルのレコード一つずつに対応しているため、
  レコード情報をTodoインスタンスという形で取得できる。

### view関数の第1・第2引数の指定と何をしているか
第一引数：画面に表示したいbladeファイルを指定。
第二引数：渡したいデータを連想配列の形で渡す。[blade内での変数名 => 代入したい値]

### index.blade.phpの$todos・$todoに代入されているものは何か
$todos：
Illuminate\Database\Eloquent\Collection {#257 ▼
  #items: array:2 [▼
    0 => App\Todo {#258 ▶}
    1 => App\Todo {#259 ▶}
]
}
$todo：
Todoクラス


## Todo作成機能

### Requestクラスのallメソッドは何をしているか
送信された全データを配列で取得する

### fillメソッドは何をしているか
連想配列で取得した値をTodoインスタンスの各プロパティに一括で代入
 $todo->{連想配列のkey} = {連想配列のvalue}を配列の全ての要素に対して行う

### $fillableは何のために設定しているか
->fill()によってModelに代入可能なプロパティを記述する

### saveメソッドで実行しているSQLは何か
オブジェクトの状態をDBに保存する
⇒INSERT文

### redirect()->route()は何をしているか
リダイレクトさせることができる
「名前付きルート」を使って、ユーザーを別のページへ転送する

## その他

### テーブル構成をマイグレーションファイルで管理するメリット
マイグレーションファイル：upメソッドに記載されているテーブル情報をもとにテーブルを作成する。
すでにテーブルの形が出来ているため作成しやすい。

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
up：データベースに新しいテーブル、カラム、またはインデックスを追加するために使用する。
down：upメソッドによって実行する操作と逆の操作を実装し、以前の状態へ戻す必要がある。

### Seederクラスの役割は何か
シーダーファイルをgit管理することで、テストデータを開発者間で共有できる。
SQLを直接書かずPHPコードで表現できるため可読性が高い

### route関数の引数・返り値・使用するメリット
引数：ルート名
返り値：URL route('todo.create') を実行した時の返り値は http://localhost:8080/todo/create という文字列
メリット：web.php の定義を1箇所変えるだけで、サイト内の全リンクが自動で更新される。可読性が上がる。

### @extends・@section・@yieldの関係性とbladeを分割するメリット
@yield：親ブレイド
@extends：継承する親Bladeを指定する。
@sectionと@endsectionで囲われた部分：継承先の子Blade

@extends('Bladeファイルのパス')を使用することで他のBladeファイルを継承することができる。
@section('任意の文字列') ~ @endsectionで囲った部分を継承したBladeファイルの@yield('任意の文字列')の箇所に挿入される。

メリット：複数のBladeを組み合わせて1枚のHTMLを生成することが可能になる。
重複するコードを共通化して再利用できるようになるため、保守性が向上する。

### @csrfは何のための記述か
フォーム内に@csrfを追記するだけでCSRF対策が完了する
CSRF：不特定多数の人に対して意図しないリクエスト送信をさせる攻撃

### {{ }}とは何の省略系か
PHPの処理として認識される
⇒<?php  ?>