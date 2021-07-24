<div class="col-12 col-md-6 float-left form-full-element-holder">
    <div class="form-label">Category<span class="required-form-star"><i class="fas fa-star-of-life"></i></span></div>
    <select class="form-control selectpicker" name="categoryIds[]" id="categoryId" title="Select Category" multiple>
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <option value='{{ $category->id }}' {{((old('categoryIds') && in_array($category->id, old('categoryIds'))) || ($content && in_array($category->id, $content->categories->pluck('id')->toArray()))) ? 'selected' : ''}} > {{ $category->name }} </option>
            @endforeach
        @endif
    </select>
    <span class="text-danger">{{ $errors->first('categoryIds') }}</span>
</div>
<div class="col-12 float-left form-full-element-holder">
    <div class="form-label">Content<span class="required-form-star"><i class="fas fa-star-of-life"></i></span></div>
    <textarea id="content" class="form-control" name="content"
              placeholder="Content Name">@if(old('content')) {{ old('content') }} @elseif($content && $content->content) {{ $content->content }} @endif</textarea>
    <span class="text-danger">{{ $errors->first('content') }}</span>
</div>
<div class="col-12 float-left form-full-element-holder">
    <div class="form-label">Featured <input class="form-control" name="feature" type="checkbox" @if(old('feature') == '1') checked @elseif($content && $content->feature) checked @endif></div>

    <span class="text-danger">{{ $errors->first('feature') }}</span>
</div>
<input type="hidden" id="contentId" class="form-control"
       name="contentId" value="{{$content ? $content->id : ((old('contentId')) ? old('contentId') : '')}}">
<div class="col-12 float-right form-full-element-holder">
    <ul class="float-right">
        <li class="list-inline-item">
            <button type="button" id="resetContentForm" class="btn btn-secondary">Clear</button>
        </li>
        <li class="list-inline-item">
            <button type="submit" id="submitContentForm" class="btn btn-primary">{{($content) ? 'Update' : 'Create'}}</button>
        </li>
    </ul>
</div>
