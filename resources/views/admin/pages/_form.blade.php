<div class="col-md-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Page</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">@lang('admin.label.title')</label>
                <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"  name="title" type="text" id="title" value="{{ old('title') ?? isset($post) ? $post->title : null }}" required>

                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="subtitle">@lang('admin.label.subtitle')</label>
                <textarea class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}"  name="subtitle" type="text" id="subtitle" required>{{ old('subtitle') ?? isset($post) ? $post->subtitle : null }}</textarea>

                @error('subtitle')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">@lang('admin.label.content')</label>
                <textarea class="form-control editor {{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" name="content" rows="5" required>{{ old('content') ?? isset($post) ? $post->content : null }}</textarea>

                @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        </div>
    </div>
</div>

@push('styles')

@endpush
@push('scripts')
@endpush





