<div>
    <section class="mb-8 h-100-vh">
        <!-- <div class="pt-5 pb-11 m-3 page-header align-items-start section-height-50 border-radius-lg" -->
        <!--     style="background-image: url('../assets/img/curved-images/curved14.jpg');"> -->
        <!--     <span class="mask bg-gradient-dark opacity-6"></span> -->
        <!--     <div class="container"> -->
        <!--         <div class="row justify-content-center"> -->
        <!--             <div class="mx-auto text-center col-lg-5"> -->
        <!--                 <h1 class="mt-5 mb-2 text-white">{{ __('Welcome!') }}</h1> -->
        <!--                 <p class="text-white text-lead"> -->
        <!--                     {{ __('Use these awesome forms to login or create new account in your --><!--                                                                                                       project for free.') }} -->
        <!--                 </p> -->
        <!--             </div> -->
        <!--         </div> -->
        <!--     </div> -->
        <!-- </div> -->
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">

                <div class="card-body">

                    <form wire:submit="register" action="#" method="POST" role="form text-left">
                        <div class="mb-3">
                            <div class="@error('name') border border-danger rounded-3  @enderror">
                                <input wire:model.live="name" type="text" class="form-control" placeholder="Name"
                                    aria-label="Name" aria-describedby="email-addon">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="@error('email') border border-danger rounded-3 @enderror">
                                <input wire:model.live="email" type="email" class="form-control" placeholder="Email"
                                    aria-label="Email" aria-describedby="email-addon">
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="@error('password') border border-danger rounded-3 @enderror">
                                <input wire:model.live="password" type="password" class="form-control"
                                    placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-left form-check form-check-info">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ __('I agree the') }} <a href="javascript:;"
                                    class="text-dark font-weight-bolder">{{ __('Terms
                                                                              and
                                                                              Conditions') }}</a>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="my-4 mb-2 btn bg-gradient-dark w-100">Sign up</button>
                        </div>
                        <p class="mt-3 mb-0 text-sm">{{ __('Already have an account? ') }}<a href="{{ route('login') }}"
                                class="text-dark font-weight-bolder">{{ __('Sign in') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
