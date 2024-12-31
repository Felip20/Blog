<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center">Register Player</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}">
                            <x-error name="name"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('username')}}">
                            <x-error name="username"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                            <x-error name="email"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                            <x-error name="password"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
