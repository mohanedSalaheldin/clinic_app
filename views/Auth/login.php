<?php $title = 'Login'; ?>


<div class="container mt-5">
    <form method="POST" action="/?route=login-post" class="w-50 mx-auto">
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
