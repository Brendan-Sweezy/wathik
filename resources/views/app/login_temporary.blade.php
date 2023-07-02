<h1>Login</h1>

<body>
    <form method='POST' action="{{ url('/authenticate')}}" encrypt='multipart/form-data'>
    {{ csrf_field()}}    
    <input type='string' id='username' name='username' value='Username'></input>
        <br>
        <input type='string' id='password' name='password', value='Password'></input>
        <br>
        <button type='Submit'>Submit</button>
    </form>
</body>