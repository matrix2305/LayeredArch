<form method="POST" action="">
    @csrf
    <label>
        Naslov:
    </label>
    <label>
        <input type="text" name="tittle">
    </label>
    <label>
        Tekst:
    </label>
    <label>
        <textarea name="text"></textarea>
    </label>
    <button>Posalji</button>
</form>
