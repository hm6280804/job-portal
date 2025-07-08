@extends('front.layouts.app')

@section('main')
    <section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action="" name="registrationForm" id="registrationForm">
                        <div class="mb-3">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                            <p></p>
                        </div> 
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href="login.html">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
    <script>
        $("#registrationForm").submit(function(e){
            e.preventDefault();

            $.ajax({
                url: '{{ route('account.processRegistration') }}',
                type: 'post',
                data: $("#registrationForm").serializeArray(),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response){
                    if(response.status == false){
                        var errors = response.errors;
                        if(errors.name){
                            $("#name").siblings('p').addClass('text-danger').html(errors.name);
                        } else {
                            $("#name").siblings('p').removeClass('text-danger').html('');
                        }

                        if(errors.email){
                            $("#email").siblings('p').addClass('text-danger').html(errors.email);
                        } else {
                            $("#email").siblings('p').removeClass('text-danger').html('');
                        }

                        if(errors.password){
                            $("#password").siblings('p').addClass('text-danger').html(errors.password);
                        } else {
                            $("#nampassworde").siblings('p').removeClass('text-danger').html('');
                        }

                        if(errors.confirm_password){
                            $("#confirm_password").siblings('p').addClass('text-danger').html(errors.confirm_password);
                        } else {
                            $("#confirm_password").siblings('p').removeClass('text-danger').html('');
                        }
                    } else {
                            $("#name").siblings('p').removeClass('text-danger').html('');
                            $("#email").siblings('p').removeClass('text-danger').html('');
                            $("#password").siblings('p').removeClass('text-danger').html('');
                            $("#confirm_password").siblings('p').removeClass('text-danger').html('');
                            window.location.href = '{{ route('account.login') }}';
                    }
                }
            });
        });
    </script>
@endsection