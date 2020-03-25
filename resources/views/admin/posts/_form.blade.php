<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"  name="title" type="text" id="title" value="{{ old('title') ?? isset($post) ? $post->title : null }}" required>

    @error('title')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="subtitle">SubTitle</label>
    <input class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}"  name="subtitle" type="text" id="subtitle" value="{{ old('subtitle') ?? isset($post) ? $post->subtitle : null }}" required>

    @error('subtitle')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="user_id">{{ __('posts.attributes.author') }}</label>
        <select id="user_id" class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="category">
            @foreach ($users as $key => $value)
                <option value="{{ $key }}" {{ ( isset($post) ? $key == $post->user->id: null) ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>

        @error('user_id')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="published_at">{{ __('posts.attributes.published_at') }}</label>
        <input type="datetime-local" name="published_at" id="published_at" class="form-control {{ $errors->has('published_at') ? ' is-invalid' : '' }}" required value="{{ old('published_at') ?? isset($post) ? $post->published_at : null }}">
        @error('published_at')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>


<div class="form-group">
    <label for="category_id">{{ __('posts.attributes.category') }}</label>
    <select id="category_id" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category">
        @foreach ($categories as $key => $value)
            <option value="{{ $key }}" {{ ( isset($post) ? $key == $post->category->id: null) ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>

    @error('category')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="image">Product Image</label>
    <input name="image" type="file" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image">

    @error('content')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror

</div>


<div class="form-group">
    <label for="image">Product Image</label>
    <textarea class="form-control trumbowyg-form {{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" name="content" required>{{ old('content') ?? isset($post) ? $post->content : null }}</textarea>
    {!! Form::label('content', __('posts.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required']) !!}

    @error('content')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
