<x-login-layout>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Knowledge Management System</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Have an account?</h3>
                        <form method="POST" action="{{ route('register') }}" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" id="name"
                                    :value="old('name')" name="name" required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" id="email"
                                    :value="old('email')" name="email" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <input id="password" name="password" type="password" class="form-control"
                                    placeholder="Password" required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>


                            <div class="form-group">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control" placeholder="Password" required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>


                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3"> {{
                                    __('Register') }}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-login-layout>