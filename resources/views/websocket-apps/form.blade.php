@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @method($method)
                        <div class="card-header">{{ $method == 'POST' ? __('Create App') : __('Update App') }}</div>
                        <div class="card-body">
                            <a href="{{ route('websocket-apps.index') }}" class="btn btn-sm btn-success mb-2">Back</a>
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" value="{{ old('name', $data->name ?? '') }}"
                                    name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="key" class="form-label">Key</label>
                                <div class="input-group">
                                    <input type="text" id="key" value="{{ old('key', $data->key ?? '') }}"
                                        name="key" class="form-control @error('key') is-invalid @enderror">
                                    <button type="button" class="btn btn-sm btn-info" onclick="generate('key')">
                                        Generate
                                    </button>
                                </div>
                                @error('key')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="secret" class="form-label">Secret</label>
                                <div class="input-group">
                                    <input type="text" id="secret" value="{{ old('secret', $data->secret ?? '') }}"
                                        name="secret" class="form-control @error('secret') is-invalid @enderror">
                                    <button type="button" class="btn btn-sm btn-info" onclick="generate('secret')">
                                        Generate
                                    </button>
                                </div>
                                @error('secret')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-primary w-100 mt-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function makeid(length) {
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < length) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return result;
        }

        function generate(el) {
            const input = document.querySelector('#' + el);
            input.value = makeid(10);
        }
    </script>
@endsection
