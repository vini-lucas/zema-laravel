<div>
    @if (session('success'))
    <script>
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const el = document.getElementById('msgSuccessGreen');
                    const p = document.getElementById('pMsgSuccess');

                    p.textContent = @json(session('success'));

                    el.classList.remove('-translate-x-full');
                    el.classList.add('translate-x-0');
                }, 50);
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const el = document.getElementById('msgErrorRed');
                    const p = document.getElementById('pMsgError');

                    p.textContent = @json(session('error'));

                    el.classList.remove('translate-x-full');
                    el.classList.add('translate-x-0');
                }, 50);
            });
        </script>
    @endif



    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                window.addEventListener('load', () => {
                    setTimeout(() => {
                        const el = document.getElementById('msgErrorRed');
                        const p = document.getElementById('pMsgError');

                        p.textContent = @json($error);

                        el.classList.remove('translate-x-full');
                        el.classList.add('translate-x-0');
                    }, 50);
                });
            </script>
        @break
    @endforeach
@endif
</div>
