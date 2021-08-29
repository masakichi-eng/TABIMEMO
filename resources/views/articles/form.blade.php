@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control"  value="{{ $article->title ?? old('title') }}">
</div>

<div class="form-group">
  <article-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
  >
  </article-tags-input>
</div>


{{-- 画像 --}}
<div>投稿画像 </div>
<div style=color:red;>(注)jpeg,png形式 サイズ:2MB未満</div>
<span class="article-image-form image-picker">
    <input type="file" name="article-image" class="d-none" accept="image/png,image/jpeg,image/gif" id="article-image" />
    <label for="article-image" class="d-inline-block" role="button">
        <img src="/images/item-image-default.png" style="object-fit: cover; width: 300px; height: 300px;">
    </label>
</span>
@error('article-image')
    <div style="color: #E4342E;" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@enderror


<div class="form-group">
  <label></label>
  <textarea name="body"  class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div>
