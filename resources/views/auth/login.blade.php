@include('partials.head')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-secondary text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typeEmailX">Email</label>
                                    <input type="email" name="email" id="typeEmailX"
                                        class="form-control form-control-lg  @error('email') is-invalid  @enderror"
                                        placeholder="E-mail" value="{{ old('email') }}" />
                                    @error('email')
                                        <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" name="password" id="typePasswordX"
                                        class="form-control form-control-lg  @error('password') is-invalid  @enderror"
                                        placeholder="Senha" />
                                </div>

                                @error('password')
                                    <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
                                @enderror

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>


                            </div>
                            <x-alerts></x-alerts>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
