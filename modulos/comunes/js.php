<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->


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