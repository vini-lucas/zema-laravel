<div>
    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p><br>
    @endif

    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p><br>
    @endif
</div>
