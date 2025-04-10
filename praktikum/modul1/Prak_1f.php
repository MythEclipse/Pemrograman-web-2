<HTML>

<body>
    <form name="form1" method="post" action="Prak_1f.php">
        <pre>
            NIM = <input type="text" name="nim" maxlength="11">
            <input type="submit" name="tampil" value="TAMPILKAN">
            <?php
            extract($_POST);
            if (isset($tampil)) {
                echo "NIM Anda adalah $nim";
            }
            ?>
        </pre>
    </form>
</body>

</HTML>