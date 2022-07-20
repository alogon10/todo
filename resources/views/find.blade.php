<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/style2.css')}}">
  <title>COACHTECH</title>
</head>
<body>
  <div class="content">
    <div class="title">
      <h1>タスク検索</h1>
      <div class="login">
      <p>「{{ Auth::user()->name }}」でログイン中</p>
        @auth
        <div class="pb-1 border-t border-gray-200">
            <div class="mt-2 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                      this.closest('form').submit();">
                      <div class="logout">
                        {{ __('ログアウト') }}
                      </div>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
      </div>
        @endauth
    </div>

  <form action="/todo/search" method="POST">
    @csrf
    <input class="input" type="text" name="input" >
      <select name="tag" id="">
            <option value="家事">家事</option>
            <option value="勉強">勉強</option>
            <option value="運動">運動</option>
            <option value="食事">食事</option>
            <option value="移動">移動</option>
      </select>
    <input class="button" type="submit" value="検索" >
<!-- ユーザーIDを送信 -->
    <input type="hidden" name="user" value="54">
  </form>
  <table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>タグ</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
@if (isset($items))
@foreach ($items as $item)
    <tr>
      <td>
        {{$item->created_at}}
      </td>
      <form action="/todo/update" method="POST">
        @csrf
        <td>
          <input class="textbox" name="updatetext" type="text" value={{$item->content}}>
        </td>
        <td>
          <select name="tag">
            <option value={{$item->tag}}>
              {{$item->tag}}
            </option>
          </select>
        </td>
        <td>
        <input class="update" type="submit" value="更新" name="ipdate">
        <input type="hidden" name="id" value={{$item->id}}>
        </td>
      </form>
      <td>
      <form action="/todo/delete" method="POST">
        @csrf
        <input class="delete" type="submit" value="削除" name="delete">
        <input type="hidden" name="id" value={{$item->id}}>
      </form>
      </td>
    </tr>
@endforeach
@endif
  </table>
  <div style="text-align:left;"><a href="/" class="back">戻る</a></div>
</div>
</body>

</html>