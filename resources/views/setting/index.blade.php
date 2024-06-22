<x-master-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center p-3">
                            <h5 class="font-weight-bold px-2 settings-page-title">{{ $pageTitle ?? __('message.list') }}</h5>
                            <svg class="svg-icon mr-0 text-primary" id="h-03-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            @if(in_array( $page,['profile_form','password_form']))
                                <li class="nav-item">
                                    <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=profile_form" data-target=".paste_here" class="nav-link {{$page=='profile_form'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.profile')}} </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=password_form" data-target=".paste_here" class="nav-link {{$page=='password_form'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.change_password') }} </a>
                                </li>
                            @else
                                @hasanyrole('admin|demo_admin')
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=general-setting" data-target=".paste_here" class="nav-link {{$page=='general-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.general_settings') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=mobile-config" data-target=".paste_here" class="nav-link {{$page=='mobile-config'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.mobile_config') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=wallet-setting" data-target=".paste_here" class="nav-link {{$page=='wallet-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.wallet_setting') }}</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=ride-setting" data-target=".paste_here" class="nav-link {{$page=='ride-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.ride_setting') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=mail-setting" data-target=".paste_here" class="nav-link {{$page=='mail-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.mail_settings') }}</a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=language-setting" data-target=".paste_here" class="nav-link {{$page=='language-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.language_settings') }}</a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=notification-setting" data-target=".paste_here" class="nav-link {{$page=='notification-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.notification_settings') }}</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('layout_page') }}?page=payment-setting" data-target=".paste_here" class="nav-link {{$page=='payment-setting'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> {{ __('message.payment_settings') }}</a>
                                    </li>
                                @endhasanyrole
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="paste_here"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('bottom_script')
        <script>
            $(document).ready(function(event)
            {
                var $this = $('.nav-item').find('a.active');
                loadurl = "{{route('layout_page')}}?page={{$page}}";

                targ = $this.attr('data-target');

                id = this.id || '';

                $.post(loadurl,{ '_token': $('meta[name=csrf-token]').attr('content') } ,function(data) {
                    $(targ).html(data);
                });

                $this.tab('show');
                return false;
            });
        </script>
    @endsection
</x-master-layout>
