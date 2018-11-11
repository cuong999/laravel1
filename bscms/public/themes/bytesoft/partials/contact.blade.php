    <div class="form">
           {!! Form::open(['route '=> 'public.send.contact', 'method' => 'POST']) !!}
            @if(session()->has('success_msg') || session()->has('error_msg') || isset($errors))
                @if (session()->has('success_msg'))
                    <div class="alert alert-success">
                        <p>{{ session('success_msg') }}</p>
                    </div>
                @endif
                @if (session()->has('error_msg'))
                    <div class="alert alert-danger">
                        <p>{{ session('error_msg') }}</p>
                    </div>
                @endif
                @if (isset($errors) && count($errors))
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            @endif
            <div class="bs-row row-md-15">
                <div class="bs-col md-100-15">
                    <input type="text" placeholder="{{ trans('plugins.contact::contact.form_subject') }}"
                           value="{{ old('subject') }}" data-aos="fade-down" data-aos-delay="200">
                </div>
                <div class="bs-col md-100-15">
                    <input type="text" placeholder="{{ trans('plugins.contact::contact.form_name') }}"
                           value="{{ old('name') }}" data-aos="fade-left" data-aos-delay="400">
                </div>
                <div class="bs-col md-100-15">
                    <input type="text" placeholder="{{ trans('plugins.contact::contact.form_email') }}"
                           value="{{ old('email') }}" data-aos="fade-right" data-aos-delay="400">
                </div>
                <div class="bs-col md-100-15">
                    <textarea name="" id="" cols="30" rows="10"
                              placeholder="{{ trans('plugins.contact::contact.form_content') }}"
                              value="{{ old('content') }}" data-aos="fade-up" data-aos-delay="600"></textarea>
                </div>
                @if (setting('enable_captcha'))
                    <div class=" bs-col md-100-15">
                        <div class="form-group">
                            <label for="contact_robot"
                                   class="control-label required">{{ trans('plugins.contact::contact.confirm_not_robot') }}</label>
                            {!! Captcha::display('captcha') !!}
                            {!! Captcha::script() !!}
                        </div>
                    </div>

                @endif
                <div class="bs-col md-100-15">
                    <button type="submit" data-aos="fade-up"
                            data-aos-delay="800">{{ trans('plugins.contact::contact.send_btn') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
