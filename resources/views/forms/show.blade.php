<x-app-layout>
    <x-page-title :title="__('messages.forms.page_title')" :subtitle="$form->name" />


    <!-- start section -->
    <section>
        <div class="container"
            data-anime='{"el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 800, "delay": 500, "staggervalue": 150, "easing": "easeOutQuad" }'>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="bg-white p-8 lg-p-6 border-radius-6px box-shadow-double-large">

                        <!-- Başarı mesajı -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-30px" role="alert">
                                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Form başlığı -->
                        <div class="row mb-40px">
                            <div class="col-12">
                                <h3 class="alt-font text-dark-gray fw-700 ls-minus-2px mb-20px">{{ $form->name }}</h3>
                                @if ($form->description)
                                    <p class="mb-0">{{ $form->description }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Form -->
                        <form action="{{ localized_route('form.submit', $form->slug) }}" method="post"
                            enctype="multipart/form-data" class="row contact-form-style-02">
                            @csrf

                            @foreach ($form->fields as $field)
                                @php
                                    $colClass = in_array($field->type, ['textarea']) ? 'col-12' : 'col-md-6';
                                    $inputClass = 'form-control' . ($field->is_required ? ' required' : '');
                                    $hasError = $errors->has($field->name);
                                @endphp

                                <div class="{{ $colClass }} mb-30px">
                                    <label for="{{ $field->name }}" class="form-label text-dark-gray fw-600 mb-10px">
                                        {{ $field->label }}
                                        @if ($field->is_required)
                                            <span class="text-red">*</span>
                                        @endif
                                    </label>

                                    @switch($field->type)
                                        @case('textarea')
                                            <textarea id="{{ $field->name }}" name="{{ $field->name }}"
                                                class="{{ $inputClass }} {{ $hasError ? 'is-invalid' : '' }}" rows="5"
                                                placeholder="{{ $field->placeholder }}" {{ $field->is_required ? 'required' : '' }}>{{ old($field->name) }}</textarea>
                                        @break

                                        @case('select')
                                            <select id="{{ $field->name }}" name="{{ $field->name }}"
                                                class="{{ $inputClass }} {{ $hasError ? 'is-invalid' : '' }}"
                                                {{ $field->is_required ? 'required' : '' }}>
                                                <option value="">Seçiniz...</option>
                                                @if ($field->options)
                                                    @foreach ($field->options as $option)
                                                        <option value="{{ $option }}"
                                                            {{ old($field->name) == $option ? 'selected' : '' }}>
                                                            {{ $option }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        @break

                                        @case('radio')
                                            <div class="row row-cols-1 row-cols-sm-auto align-items-center">
                                                @if ($field->options)
                                                    @foreach ($field->options as $index => $option)
                                                        <div class="col mb-10px">
                                                            <div class="d-flex align-items-center">
                                                                <input type="radio"
                                                                    id="{{ $field->name }}_{{ $index }}"
                                                                    name="{{ $field->name }}" value="{{ $option }}"
                                                                    class="me-10px {{ $hasError ? 'is-invalid' : '' }}"
                                                                    style="width: 18px; height: 18px; cursor: pointer;"
                                                                    {{ old($field->name) == $option ? 'checked' : '' }}
                                                                    {{ $field->is_required ? 'required' : '' }}>
                                                                <label class="mb-0 cursor-pointer"
                                                                    for="{{ $field->name }}_{{ $index }}"
                                                                    style="cursor: pointer;">
                                                                    {{ $option }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @break

                                        @case('checkbox')
                                            <div class="row row-cols-1 row-cols-sm-auto align-items-center">
                                                @if ($field->options)
                                                    @foreach ($field->options as $index => $option)
                                                        <div class="col mb-10px">
                                                            <div class="d-flex align-items-center">
                                                                <input type="checkbox"
                                                                    id="{{ $field->name }}_{{ $index }}"
                                                                    name="{{ $field->name }}[]" value="{{ $option }}"
                                                                    class="me-10px {{ $hasError ? 'is-invalid' : '' }}"
                                                                    style="width: 18px; height: 18px; cursor: pointer;"
                                                                    {{ is_array(old($field->name)) && in_array($option, old($field->name)) ? 'checked' : '' }}>
                                                                <label class="mb-0 cursor-pointer"
                                                                    for="{{ $field->name }}_{{ $index }}"
                                                                    style="cursor: pointer;">
                                                                    {{ $option }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @break

                                        @case('file')
                                            <input type="file" id="{{ $field->name }}" name="{{ $field->name }}"
                                                class="{{ $inputClass }} {{ $hasError ? 'is-invalid' : '' }}"
                                                {{ $field->is_required ? 'required' : '' }}>
                                        @break

                                        @default
                                            <input type="{{ $field->type }}" id="{{ $field->name }}"
                                                name="{{ $field->name }}"
                                                class="{{ $inputClass }} {{ $hasError ? 'is-invalid' : '' }}"
                                                placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}"
                                                {{ $field->is_required ? 'required' : '' }}>
                                    @endswitch

                                    @if ($field->help_text)
                                        <small
                                            class="form-text text-muted d-block mt-2">{{ $field->help_text }}</small>
                                    @endif

                                    @error($field->name)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="col-12 text-center mt-30px">
                                <button class="btn btn-base-color btn-large btn-rounded btn-box-shadow submit"
                                    type="submit">
                                    <i class="bi bi-send me-2"></i>{{ $form->submit_button_text }}
                                </button>
                            </div>

                            <div class="col-12">
                                <div class="form-results mt-20px d-none"></div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
