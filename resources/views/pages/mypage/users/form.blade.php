@extends('common.layout')

@section('title', '사용자 수정' )

@php
    /**
     * @var \App\User $user
     * @var \App\Role[] $roles
     */
@endphp


@section('content')
    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-300 bg-img background-overlay"
         style="padding-top:75px;background-image: url(/img/accounting-analytics-apple-572056.jpg);">

        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 ">
                    <div class="single-blog-title text-center">
                        <h3>User</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ********** Hero Area End ********** -->

    <section class="contact-area section-padding-50">
        <div class="container">
            <div class="row">


                <div class="col-12 col-lg-8">
                    <div class="title mb-30">
                        <h2>Users</h2>
                    </div>


                    <div class="card">

                        <div class="card-body">
                            <h4>Update User Profile</h4>
                            <form method="POST" action="{{ route('mypage.users.update', [$user]) }}">
                                @method('put')
                                @csrf

                                <div class="form-group row">

                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                                    <div class="col-md-6">
                                        @if($user->avatar_url)
                                            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
                                        @else
                                            <div class="text-info">
                                                등록된 아바타가 없습니다.
                                                소셜 로그인을 하실 경우 해당 로그인에 등록된 아바타 이미지를 사용합니다.
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name', $user->name) }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ $user->email }}" required readonly>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif


                                        @if(!$user->email_verified_at)
                                            <span class="text-danger" role="alert">
                                                아직 이메일을 인증받지 않았습니다.
                                                <a href="{{ route('verification.resend') }}"
                                                   class="btn btn-warning btn-xs">
                                                    인증메일 전송
                                                </a>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">New {{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="github_url"
                                           class="col-md-4 col-form-label text-md-right">Github</label>

                                    <div class="col-md-6">
                                        <input id="github_url" type="url"
                                               class="form-control{{ $errors->has('github_url') ? ' is-invalid' : '' }}"
                                               value="{{ old('github_url',$user->github_url) }}"
                                               placeholder="url을 입력하세요"
                                               name="github_url">

                                        @if ($errors->has('github_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('github_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="facebook_url"
                                           class="col-md-4 col-form-label text-md-right">Facebook</label>

                                    <div class="col-md-6">
                                        <input id="facebook_url" type="url"
                                               class="form-control{{ $errors->has('facebook_url') ? ' is-invalid' : '' }}"
                                               value="{{ old('facebook_url',$user->facebook_url) }}"
                                               placeholder="url을 입력하세요"
                                               name="facebook_url">

                                        @if ($errors->has('facebook_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('facebook_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="twitter_url"
                                           class="col-md-4 col-form-label text-md-right">Twitter</label>

                                    <div class="col-md-6">
                                        <input id="twitter_url" type="url"
                                               class="form-control{{ $errors->has('twitter_url') ? ' is-invalid' : '' }}"
                                               value="{{ old('twitter_url',$user->twitter_url) }}"
                                               placeholder="url을 입력하세요"
                                               name="twitter_url">

                                        @if ($errors->has('twitter_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('twitter_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="homepage_url"
                                           class="col-md-4 col-form-label text-md-right">Homepage</label>

                                    <div class="col-md-6">
                                        <input id="homepage_url" type="url"
                                               class="form-control{{ $errors->has('homepage_url') ? ' is-invalid' : '' }}"
                                               value="{{ old('homepage_url',$user->homepage_url) }}"
                                               placeholder="url을 입력하세요"
                                               name="homepage_url">

                                        @if ($errors->has('homepage_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('homepage_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="comment"
                                           class="col-md-4 col-form-label text-md-right">자기소개</label>

                                    <div class="col-md-6">
                                        <textarea name="comment" id="comment"
                                                  class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                                        >{{ old('comment', $user->comment) }}</textarea>
                                        @if ($errors->has('comment'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="comment"
                                           class="col-md-4 col-form-label text-md-right">Role</label>

                                    <div class="col-md-6">

                                        @foreach($roles as $role)
                                            <label class=" form-check-inline">

                                                <input class="form-check-input" type="checkbox" name="roles[]"
                                                       value="{{ $role->name }}"
                                                    {{ $user->roles->contains($role) ? 'checked' : '' }}
                                                >
                                                {{ $role->name }}
                                            </label>
                                        @endforeach

                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">

                                    @foreach($user->oauth_identities as $oauthIdentity)

                                        <div class="btn btn-outline-secondary btn-block">
                                            <strong>
                                                <i class="fa fa-{{ $oauthIdentity->provider }} icon"></i> Connected with
                                                {{ ucfirst($oauthIdentity->provider) }}
                                            </strong>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                @include('pages.mypage.widget.lnb')


            </div>
        </div>
    </section>
@endsection



