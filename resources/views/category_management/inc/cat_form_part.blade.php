<div class="col-12 col-md-6 float-left form-full-element-holder">
    <div class="form-label">Category Name<span class="required-form-star">
                                                <i class="fas fa-star-of-life"></i></span></div>
    <input type="text" id="catName" class="form-control"
           name="catName" placeholder="Category Name"
           value="{{isset($catData['name']) ? $catData['name'] : ((old('catName')) ? old('catName') : '')}}">
    <span class="text-danger">{{ $errors->first('catName') }}</span>
</div>
<div class="col-12 col-md-6 float-left form-full-element-holder">
    <div class="form-label">Applications<span class="required-form-star">
                                                <i class="fas fa-star-of-life"></i></span></div>
    <select class="form-control selectpicker" data-live-search="true"
            name="apps[]" id="catAppId" title="Select Application" multiple>
        @if(isset($apps))
            @foreach($apps as $app)
                <option value={{$app->id}} {{(((old('apps') && in_array($app->id,old('apps'))) || (isset($catData) && $catData && in_array($app->id, $catData->apps->pluck('id')->toArray()))) ? 'selected' : '')}} > {{$app->name}} </option>
            @endforeach
        @endif
    </select>
    <span class="text-danger">{{ $errors->first('apps') }}</span>
</div>
<div class="col-12 col-md-6 float-left form-full-element-holder">
    <div class="form-label">Category Status<span class="required-form-star">
                                                <i class="fas fa-star-of-life"></i></span></div>
    <select class="form-control selectpicker" title="Select Status"
            name="catStatus" id="catStatus">
        <option value='active' {{isset($catData['status']) ? (($catData['status'] == 'active') ? 'selected' : '') : ((old('catStatus') == 'active') ? 'selected' : 'selected')}}>
            Active
        </option>
        <option value='inactive' {{isset($catData['status']) ? (($catData['status'] == 'inactive') ? 'selected' : '') : ((old('catStatus') == 'inactive') ? 'selected' : '')}}>
            Inactive
        </option>
    </select>
    <span class="text-danger">{{ $errors->first('catStatus') }}</span>
</div>
<input type="hidden" id="catId" class="form-control"
       name="catId" value="{{isset($catData['id']) ? $catData['id'] : ((old('catId')) ? old('catId') : '')}}">
<div class="col-12 float-right form-full-element-holder">
    <ul class="float-right">
        <li class="list-inline-item">
            <button type="button" id="resetCatForm" class="btn btn-secondary">Clear</button>
        </li>
        <li class="list-inline-item">
            <button type="submit" id="submitCatForm" class="btn btn-primary">
                {{isset($catData['id']) ? 'Update' : 'Create'}}
            </button>
        </li>
    </ul>
</div>
