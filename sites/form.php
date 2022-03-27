<form
    enctype="multipart/form-data"
    action="<?php echo $_SERVER['PHP_SELF']; ?>"
    method="post"
    class="form"
>
    <input type="hidden" name="MAX_FILE_SIZE" value="32768" />
    <!-- 32 kilobajty (32768 bajtów) -->
    <div class="form-control">
        <label>
            <input type="file" id="foto" name="foto" multiple="multiple" />
        </label>
    </div>

    <div class="form-control">
        <label>
            <button type="submit" name="submit">Dodaj</button>
        </label>
    </div>
</form>