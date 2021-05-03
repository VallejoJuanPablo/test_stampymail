<?php
if (isset($data_pages['urljs'])) {
    if (count($data_pages['urljs']) > 0) {
        echo "<!--Scripts for pages-->";
        for ($i = 0; $i < count($data_pages['urljs']); $i++) {
            ?>                    
            <script src="<?php echo $data_pages['urljs'][$i]; ?>"></script>
            <?php
        }
    }
}
?>
</body>
</html>